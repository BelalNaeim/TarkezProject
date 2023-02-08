<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProject extends FormRequest {
    /**
    * Determine if the user is authorized to make this request.
    *
    * @return bool
    */

    public function authorize() {
        return false;
    }

    /**
    * Get the validation rules that apply to the request.
    *
    * @return array
    */

    public function rules() {
        return [
            //
            'title_ar' =>'required|string',
            'title_en' =>'required|string',
            'desc_ar' =>'required|text',
            'desc_en' =>'required|text',
            'image' =>'required|mimes:jpg,jpeg,png',

        ];
    }
}
