<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RestaurantFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name_restaurant' => ['required','max:50'],
            'img' => ['required','max:255'],
            'phone' => ['required','max:255'],
            'address' => ['required','max:255'],
            'VAT' => ['required','max:255'],
       ];

    }
}
