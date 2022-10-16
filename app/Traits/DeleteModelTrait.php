<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait DeleteModelTrait
{
    public function deleteModelTrait($id,$model)
    {
        try {
            $model::query()->find($id)->delete();
            return response()->json(['code' => 200, 'message' => "Success"]);
        } catch (\Exception $e) {
            Log::error("Message: {$e->getMessage()}. Line: {$e->getLine()}");
            return response()->json(['code' => 500, 'message' => "Fail"], 500);
        }
    }
}
