<?php

namespace App\Traits;

use Storage;

trait ImageTrait
{
    /**
     * Storage image of categories, deliveryman or user.
     * @param $image Image
     * @param $path Directory to save image
     * @param $lastFile name of file
     * @return array
     */
    public function uploadImage($image, $path, $lastFile = null)
    {
        if ($lastFile) {
            $pathLastFile = 'public/'.$path.'/'.$lastFile;
            Storage::delete($pathLastFile);
        }

        $filename = now()->timestamp . '.' . $image->getClientOriginalExtension();
        $path = $path . '/' . $filename;
        Storage::put('public/' . $path, file_get_contents($image));

        return [
            "name" => $filename,
            "url"  => 'storage/' . $path//. '?data=' . now()->timestamp)
        ];
    }
}
