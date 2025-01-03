<?php
namespace App\Traits;


use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
trait UploadTrait
{

    public function uploadImage(
         $request,
        $disk,
        $inputName,
        $folderName,
    ) {
        if ($request->hasFile($inputName)) {

            $photo = $request->file($inputName);
            $name = \Str::slug($request->input('name'));
            $filename = $name . '.' . $photo->getClientOriginalExtension();
            $path = $request->file($inputName)->storeAs($folderName, $filename, $disk);
        }
        return $path;
    }//end of uploadImage
    
}
