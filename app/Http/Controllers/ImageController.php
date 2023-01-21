<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class ImageController extends Controller
{
    public function generate(Request $request){
        
        $request->validate([
            'desc' => 'required|string|max:1000',
            'size' => Rule::in(['sm', 'md', 'lg'])
        ]);
    }
}
