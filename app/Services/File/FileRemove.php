<?php

namespace App\Services\File;

use Illuminate\Support\Facades\Storage;

class FileRemove
{
    /**
     * Deletes a file from the public disk.
     *
     * @param string $fileName The name of the file to delete.
     * @param string $destinationPath The path within the public disk where the file is located (e.g., 'courts/images').
     * @return bool True if the file was deleted successfully, false otherwise.
     */
    public static function deleteFile(string $fileName, string $destinationPath): bool
    {
        // Construct the full path relative to the public disk root
        $fullPath = "$destinationPath/$fileName";

        // Check if the file exists on the 'public' disk
        if (!Storage::disk('public')->exists($fullPath)) {
            return false; // File does not exist
        }

        // Attempt to delete the file from the 'public' disk
        if (Storage::disk('public')->delete($fullPath)) {
            return true; // File deleted successfully
        }

        return false; // Failed to delete the file
    }
}
