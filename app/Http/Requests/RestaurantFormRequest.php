<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;


class RestaurantFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
        // return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name_restaurant' => ['required','max:50','min:3'],
            'img' => ['image','max:12040'],
            'phone' => ['required','max:255','min:5'],
            'address' => ['required','max:255','min:3'] ,
            'VAT' => ['required','max:255','min:11'],
            'category' => ['array','min:1','required']
       ];
    }
}
