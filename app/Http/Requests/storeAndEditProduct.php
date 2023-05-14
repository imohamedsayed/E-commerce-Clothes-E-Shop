<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeAndEditProduct extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title'=>'required|unique:products|min:10',
            'catID'=>'required',
            'supID'=>'required',
            'price'=>'required',
            'discount'=>'required',
            'img'=>'required',
            'sales'=>'required',
            'rate'=>'required|numeric',
            'origin'=>'required',
            'gender'=>'required',
            'ageGroup'=>'required',
        ];
    }
}
