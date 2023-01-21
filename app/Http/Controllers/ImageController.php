<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Orhanerday\OpenAi\OpenAi;
// use OpenAi; 

class ImageController extends Controller
{
    public function generate(Request $request){
        
        $request->validate([
            'desc' => 'required|string|max:1000',
            'size' => Rule::in(['sm', 'md', 'lg'])
        ]);

        $description = $request->desc; 

        switch ($request->size){
            case 'lg':
                $size='1024x1024';
                break;
            case 'md':
                $size='512x512';
                break;
            default:
                $size='256x256';                  
        }
       
        
        $open_ai_key = getenv('OPEN_AI_KEY');
        $open_ai = new OpenAi($open_ai_key);


        
        $complete = $open_ai->image([
            "prompt" => $description,
            "n" => 2,
            "size" => $size,
            "response_format" => "url",
        ]);

        // echo gettype($complete);

        $var = json_decode($complete, TRUE);        
        $image1 = $var['data'][0]['url'];
        $image2 = $var['data'][1]['url'];

        return view('show', compact('image1','image2','description'));
        
   
    }
}
