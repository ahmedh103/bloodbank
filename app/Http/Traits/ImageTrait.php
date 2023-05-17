<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\File;

trait ImageTrait
{
    protected function uploadImage($newImag, $path, $oldImag = null)
    {

        if (isset($newImag)) {
            $this->removeImage($oldImag);
            $image_name = time() . '_' . $newImag->hashName();
            $newImag->move($path, $image_name);
            return  $image_name;
        }
        return $oldImag;
    }


    protected function removeImage($path): void
    {
        if (isset($path) && File::exists(public_path($path))) {
            File::delete(public_path($path));
        }
    }
}

