<?php

namespace App\Helpers;

use Illuminate\Http\UploadedFile as HttpUploadedFile;
use Illuminate\Support\Facades\Storage;

class ImageHelper
{

    /**
     * 
     * Guarda una imagen y retonar su ruta
     * 
     * @param \Illuminate\Http\UploadedFile $image
     * @param string $directory
     * @param string $disk
     * @return string
     */

    public static function saveImage(HttpUploadedFile $image, $directory = "images", $disk = "public")
    {
        $originalName = $image->getClientOriginalName();
        $uniqueName = time() . "-" . $originalName;
        $path = $image->storeAs($directory, $uniqueName, $disk);
        return $path;
    }

    /**
     * 
     * Elimina una imagen
     * 
     * @param string $image
     * @param string $disk
     * @return bool
     */

    public static function deleteImage($image, $disk = "public")
    {
        return Storage::disk($disk)->delete($image);
    }

    /**
     * 
     * Elimina un directorio
     * 
     * @param string $directory
     * 
     */

    public static function deleteDirectory($directory)
    {
        $files = Storage::disk("public")->files($directory);
        Storage::disk("public")->delete($files);

        $directories = Storage::disk("public")->allDirectories($directory);
        Storage::disk("public")->deleteDirectory($directory);
    }
}