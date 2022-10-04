<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait StorageImageTrait
{
    public function storageTraitUpload(Request $request, $fieldName, $directoryName)
    {
        if ($request->hasFile($fieldName)) {
            $file = $request->file($fieldName); //
            $fileNameOrigin = $file->getClientOriginalName();
            $fileNameHash = Str::random(20) . "." . $file->getClientOriginalExtension();
            $filePath = $file->storeAs("public/$directoryName/" . auth()->id(), $fileNameHash);
            return [
                'file_name' => $fileNameOrigin,
                'file_path' => Storage::url($filePath)
            ];
        }
        return null;
    }
    public function storageTraitUploadMultiple($file, $directoryName)
    {
            $fileNameOrigin = $file->getClientOriginalName();
            $fileNameHash = Str::random(20) . "." . $file->getClientOriginalExtension();
            $filePath = $file->storeAs("public/$directoryName/" . auth()->id(), $fileNameHash);
            return [
                'file_name' => $fileNameOrigin,
                'file_path' => Storage::url($filePath)
            ];
    }
}
