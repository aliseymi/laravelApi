<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $validData = $this->validate($request,[
            'body' => 'required|min:3'
        ]);

        auth()->user()->comments()->create($validData);

        return response([
            'data' => 'نظر شما با موفقیت ثبت شد',
            'status' => 'success'
        ]);
    }
}
