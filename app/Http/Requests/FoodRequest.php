<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FoodRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name_food' => ['required','max:50'],
            'img' => ['mimetypes:image/jpeg,image/png','max:1024'],
            'price' => ['required','max:10'],
            'ingredients' => ['required','max:255'] ,
            'is_visible' => ['required','boolean'],
        ];
    }
}
