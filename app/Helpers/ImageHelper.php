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
        $path = $image->store($directory, $disk);
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
}
