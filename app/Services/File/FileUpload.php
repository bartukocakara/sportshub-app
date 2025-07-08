<?php

namespace App\Services\File;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage; // Import Storage facade

class FileUpload
{
    /**
     * Uploads and optionally resizes an image file.
     *
     * @param string $id A unique ID, often used to generate a unique filename.
     * @param UploadedFile $file The uploaded file instance.
     * @param string $destinationPath The path within the public disk where the file should be stored (e.g., 'courts/images').
     * @return string The generated filename of the uploaded/resized image.
     * @throws \Exception If the image type is invalid, size exceeds limit, or resizing/saving fails.
     */
    public static function upload(string $id, UploadedFile $file, string $destinationPath): string
    {
        // Define allowed MIME types for images
        $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif']; // Added gif
        // Define maximum file size in bytes (e.g., 2MB = 2 * 1024 * 1024)
        $maxFileSize = 2 * 1024 * 1024; // Example: 2MB limit, set to null for no limit

        self::validateImageType($file, $allowedMimeTypes);
        self::validateFileSize($file, $maxFileSize);

        // Upload and resize the image, returning the filename
        return self::uploadAndResizeImage($id, $file, $destinationPath);
    }

    /**
     * Validates the MIME type of the uploaded file.
     *
     * @param UploadedFile $file The uploaded file instance.
     * @param array $allowedMimeTypes An array of allowed MIME types.
     * @throws \Exception If the MIME type is invalid.
     */
    protected static function validateImageType(UploadedFile $file, array $allowedMimeTypes): void
    {
        $mimeType = $file->getClientMimeType();
        if (!in_array($mimeType, $allowedMimeTypes)) {
            throw new \Exception('Invalid MIME type: ' . $mimeType . '. Allowed types are: ' . implode(', ', $allowedMimeTypes));
        }
    }

    /**
     * Validates the size of the uploaded file.
     *
     * @param UploadedFile $file The uploaded file instance.
     * @param int|null $maxFileSize The maximum allowed file size in bytes, or null for no limit.
     * @throws \Exception If the file size exceeds the limit.
     */
    protected static function validateFileSize(UploadedFile $file, ?int $maxFileSize): void
    {
        if ($maxFileSize !== null && $file->getSize() > $maxFileSize) {
            throw new \Exception('File size exceeds the maximum allowed limit (' . round($maxFileSize / 1024 / 1024, 2) . ' MB)');
        }
    }

    /**
     * Uploads the image and resizes it to a 100x100 thumbnail (cover effect),
     * overwriting the original file with the thumbnail.
     *
     * @param string $id A unique ID, often used to generate a unique filename.
     * @param UploadedFile $file The uploaded file instance.
     * @param string $destinationPath The path within the public disk where the file should be stored.
     * @return string The generated filename.
     * @throws \Exception If image loading, resizing, or saving fails.
     */
    protected static function uploadAndResizeImage(string $id, UploadedFile $file, string $destinationPath): string
    {
        $extension = $file->getClientOriginalExtension();
        $fileName = md5($id . time() . uniqid()) . '.' . $extension; // Added uniqid for extra uniqueness
        $fullPath = $destinationPath . '/' . $fileName; // Path relative to the disk root

        // 1. Upload the original image to the 'public' disk
        // This will save the file to storage/app/public/{destinationPath}/{fileName}
        Storage::disk('public')->putFileAs($destinationPath, $file, $fileName);

        // 2. Get the absolute path to the stored file for GD processing
        $absoluteFilePath = Storage::disk('public')->path($fullPath);

        $img = null;
        $mimeType = $file->getClientMimeType();

        // Load image based on MIME type
        if ($mimeType === 'image/jpeg' || $mimeType === 'image/jpg') {
            $img = imagecreatefromjpeg($absoluteFilePath);
        } elseif ($mimeType === 'image/png') {
            $img = imagecreatefrompng($absoluteFilePath);
        } elseif ($mimeType === 'image/gif') {
            $img = imagecreatefromgif($absoluteFilePath);
        } else {
            // This case should ideally be caught by validateImageType, but as a fallback
            // if image cannot be processed by GD, return the original filename.
            // Or, throw an exception if all images must be resized.
            // For now, we'll return the original filename if GD can't handle it.
            // Consider throwing an exception if resizing is mandatory for all images.
            return $fileName;
        }

        if (!$img) {
            throw new \Exception('Failed to load image for resizing from: ' . $absoluteFilePath);
        }

        $thumbWidth = 100;
        $thumbHeight = 100;

        $originalWidth = imagesx($img);
        $originalHeight = imagesy($img);

        // Create a new true color image for the thumbnail
        $thumb = imagecreatetruecolor($thumbWidth, $thumbHeight);

        // Preserve transparency for PNG and GIF
        if ($mimeType === 'image/png') {
            imagealphablending($thumb, false); // Do not blend
            imagesavealpha($thumb, true); // Save alpha channel
            $transparent = imagecolorallocatealpha($thumb, 255, 255, 255, 127); // Transparent white
            imagefilledrectangle($thumb, 0, 0, $thumbWidth, $thumbHeight, $transparent); // Fill with transparent
        } elseif ($mimeType === 'image/gif') {
            $trnprt_idx = imagecolortransparent($img);
            if ($trnprt_idx >= 0) {
                // Get the transparent color from the original image
                $trnprt_color = imagecolorsforindex($img, $trnprt_idx);
                $transparent = imagecolorallocate($thumb, $trnprt_color['red'], $trnprt_color['green'], $trnprt_color['blue']);
                imagefill($thumb, 0, 0, $transparent);
                imagecolortransparent($thumb, $transparent);
            }
        } else {
            // For JPEG, fill with white background to prevent black background issues
            imagefill($thumb, 0, 0, imagecolorallocate($thumb, 255, 255, 255));
        }

        // Calculate source rectangle for cropping (cover effect: fill thumbnail, crop excess from original)
        $originalAspect = $originalWidth / $originalHeight;
        $thumbAspect = $thumbWidth / $thumbHeight;

        $srcX = 0;
        $srcY = 0;
        $srcW = $originalWidth;
        $srcH = $originalHeight;

        if ($originalAspect > $thumbAspect) {
            // Original image is wider than thumbnail aspect ratio, crop width
            $srcW = $originalHeight * $thumbAspect;
            $srcX = ($originalWidth - $srcW) / 2; // Center crop horizontally
        } else {
            // Original image is taller or same aspect ratio as thumbnail, crop height
            $srcH = $originalWidth / $thumbAspect;
            $srcY = ($originalHeight - $srcH) / 2; // Center crop vertically
        }

        // Resample the image to the thumbnail
        imagecopyresampled($thumb, $img,
                           0, 0, // Destination x, y (top-left of thumbnail)
                           $srcX, $srcY, // Source x, y (top-left of cropped area from original)
                           $thumbWidth, $thumbHeight, // Destination width, height (thumbnail dimensions)
                           $srcW, $srcH); // Source width, height (cropped area from original)

        // Save the resized image, overwriting the original file
        $success = false;
        if ($mimeType === 'image/jpeg' || $mimeType === 'image/jpg') {
            $success = imagejpeg($thumb, $absoluteFilePath, 90); // 90 quality for JPEG
        } elseif ($mimeType === 'image/png') {
            $success = imagepng($thumb, $absoluteFilePath);
        } elseif ($mimeType === 'image/gif') {
            $success = imagegif($thumb, $absoluteFilePath);
        }

        // Clean up memory used by image resources
        imagedestroy($img);
        imagedestroy($thumb);

        if (!$success) {
            throw new \Exception('Failed to save resized image to: ' . $absoluteFilePath);
        }

        return $fileName;
    }
}
