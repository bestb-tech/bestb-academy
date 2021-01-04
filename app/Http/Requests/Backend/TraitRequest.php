<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
abstract class TraitRequest extends FormRequest
{
    protected function failedValidation(Validator $validator)
    {
        $errors =  (new ValidationException($validator))->errors();
        throw new HttpResponseException(
            response()->json(['errors' => $errors],JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
        );
    }
}
