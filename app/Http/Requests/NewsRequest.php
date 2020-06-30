<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
{

    public function authorize(){
        return true ;
    }
    public function rules(){
        return [
            'sammary' => ['required'],
            'category_id' => ['required'] ,
            'details' => ['required'] ,
            'image' => ['required'] ,
        ];
    }
}
