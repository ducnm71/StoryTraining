<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;


class UserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email:rfc,dns',
            'password' => 'required|min:8'
        ];
    }

    public function messages()
    {
        return [
            'email' => 'Incorrect standard of email',
            'required' => 'Field :attribute is required',
            'min' => 'Field :attribute has at least :min character'
        ];
    }

     /**
     * Custom validation error response
     *
     * @return void
    */
    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();
        throw new HttpResponseException(response()->json(
            [
                'status' => 'fail',
                'error' => $errors,
            ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY), 422);
    }
}
