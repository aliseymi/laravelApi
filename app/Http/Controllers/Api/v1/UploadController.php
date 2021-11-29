<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function image(Request $request, Filesystem $filesystem)
    {
        $this->validate($request,[
            'image' => 'required|image|mimes:jpg,jpeg,png,bmp|max:1024'
        ]);

        $file = $request->file('image');

        $year = jdate()->getYear();
        $month = jdate()->getMonth();
        $day = jdate()->getDay();

        $destinationPath = "/images/{$year}/{$month}/{$day}";
        $fileName = $file->getClientOriginalName();

        if($filesystem->exists(public_path("{$destinationPath}/{$fileName}"))){
            $fileName = now()->timestamp . "-{$fileName}";
        }

        $file->move(public_path($destinationPath),$fileName);

        return response([
            'data' => [
                'imageUrl' => url("{$destinationPath}/{$fileName}")
            ],
            'status' => 'success'
        ]);
    }

    public function file(Request $request)
    {

    }
}
