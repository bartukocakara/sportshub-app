<?php

namespace App\Services\File;

use Illuminate\Http\UploadedFile;

class FileUpload
{
    public static function upload(string $id, UploadedFile $file, string $destinationPath) : string
    {
        $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/jpg'];
        $maxFileSize = null;

        self::validateImageType($file, $allowedMimeTypes);
        self::validateFileSize($file, $maxFileSize);
        return self::uploadAndResizeImage($id, $file, $destinationPath);
    }

    protected static function validateImageType($file, $allowedMimeTypes) {
        // Get the image MIME type
        $mimeType = $file->getClientMimeType();

        // Check if the image is a valid MIME type
        if (!in_array($mimeType, $allowedMimeTypes)) {
            throw new \Exception('Invalid MIME type');
        }
    }

    protected static function validateFileSize($file, $maxFileSize) {
        // Check the file size
        if ($maxFileSize !== null && $file->getSize() > $maxFileSize) {
            throw new \Exception('File size exceeds the maximum allowed limit');
        }
    }

    protected static function uploadAndResizeImage($id, $file, $destinationPath) : string {
        // Get the image extension
        $extension = $file->getClientOriginalExtension();

        // Generate a unique filename for the image
        $fileName = md5($id . time()) . '.' . $extension;

        // Upload the image to the storage folder
        $file->storeAs($destinationPath, $fileName);

        // Resize the image to a small avatar size
        $path = storage_path('app/'.$destinationPath . $fileName);
        $img = null;
        $mimeType = $file->getClientMimeType();

        if ($mimeType === 'image/jpeg') {
            $img = imagecreatefromjpeg($path);
        } elseif ($mimeType === 'image/png') {
            $img = imagecreatefrompng($path);
        } elseif ($mimeType === 'image/gif') {
            $img = imagecreatefromgif($path);
        }

        $thumbWidth = 100;
        $thumbHeight = 100;

        $width = imagesx($img);
        $height = imagesy($img);

        $originalAspect = $width / $height;
        $thumbAspect = $thumbWidth / $thumbHeight;

        if ($originalAspect >= $thumbAspect) {
            // If image is wider than thumbnail (in aspect ratio sense)
            $newHeight = $thumbHeight;
            $newWidth = $width / ($height / $thumbHeight);
        } else {
            // If the thumbnail is wider than the image
            $newWidth = $thumbWidth;
            $newHeight = $height / ($width / $thumbWidth);
        }

        $thumb = imagecreatetruecolor($thumbWidth, $thumbHeight);

        imagecopyresampled($thumb,
                        $img,
                        0 - ($newWidth - $thumbWidth) / 2, // Center the image horizontally
                        0 - ($newHeight - $thumbHeight) / 2, // Center the image vertically
                        0, 0,
                        $newHeight, $newHeight,
                        $width, $height);
        return $fileName;

    }
}
