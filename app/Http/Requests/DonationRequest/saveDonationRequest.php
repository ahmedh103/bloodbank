<?php

namespace App\Http\Requests\DonationRequest;

use Illuminate\Foundation\Http\FormRequest;

class saveDonationRequest extends FormRequest
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
            'patient_name'=>'required',
            'patient_phone'=>'required',
            'city_id'=>'required|exists:cities,id',
            'hospital_name'=>'required',
            'blood_type_id'=>'required|exists:blood_types,id',
            'patient_age'=>'required',
            'bags_num'=>'required',
            'hospital_address'=>'required',
            'details'=>'required',
            'latitude'=>'required',
            'longitude'=>'required',
            'client_id'=>'required|exists:clients,id',


        ];
    }
}
