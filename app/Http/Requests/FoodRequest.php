<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;


class FoodRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
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
            'img' => ['mimetypes:image/jpeg, image/png, image/jpg','max:12400'],
            'price' => ['required','max:10'],
            'ingredients' => ['required','max:255'] ,
            'is_visible' => ['required','boolean'],
        ];
    }
}
