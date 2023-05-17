<?php

namespace App\Http\Requests\City;

use Illuminate\Foundation\Http\FormRequest;

class updateCityRequest extends FormRequest
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
            'name'=>'required',
            'governorate_id'=>'required|exists:governorates,id'
        ];
    }
}
