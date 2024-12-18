<?php

namespace App\Services\File;

use Illuminate\Support\Facades\Storage;

class FileRemove
{
    public static function deleteFile(string $fileName, string $destinationPath): bool
    {
        if (!Storage::disk('public')->exists($destinationPath . "/$fileName")) {
            return false;
        }
        if (Storage::disk('public')->delete($destinationPath . "/$fileName")) {
            return true;
        }

        return false;
    }
}
