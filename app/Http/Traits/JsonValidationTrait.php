<?php

namespace App\Http\Traits;

use Illuminate\Contracts\Validation\Validator ;
use Illuminate\Http\Exceptions\HttpResponseException;

use Illuminate\Http\Response;

trait JsonValidationTrait
{
    protected function failedValidation(Validator $validator): void
    {

       

        if (\Request::wantsJson()) {
            $errors = $validator->errors();
            throw new HttpResponseException(response()->json([
                'status' => 422,
                'message' => __('The given data was invalid'),
                'errors' => $errors,
            ], Response::HTTP_UNPROCESSABLE_ENTITY));
        } else {
            Parent::failedValidation($validator);
        }
    }
}