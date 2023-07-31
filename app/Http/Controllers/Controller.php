<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function storeMedia($request, $dri, $inputName)
    {
        try {
            $fileName =  $request
                ->file($inputName)
                ->store($dri, 'public');
            return explode('/', $fileName)[1];
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function updateMedia($request, $fileName, $inputName, $dir)
    {
        if ($request->hasFile($inputName)) {
            $this->deleteMedia($fileName, $dir);
            try {
                $request
                    ->file($inputName)
                    ->storeAs($dir, $fileName, 'public');
            } catch (\Throwable $th) {
                throw $th;
            }
        }
    }

    public function deleteMedia($fileName, $dir)
    {
        try {
            Storage::delete('public/' . $dir . '/' . $fileName);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
