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
            'name_food' => ['required','max:50','min:3'],
            'img' => ['mimes:jpeg, jpg','max:12040'],
            'price' => ['required','max:10','min:1'],
            'ingredients' => ['required','max:500','min:3'] ,
            'is_visible' => ['required','boolean'],
        ];
    }
}
