<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCustomerRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:1', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('customers', 'email')->ignore($this->customer->id)],
            'phone' => ['required', 'string', 'min:1', 'max:255', Rule::unique('customers', 'phone')->ignore($this->customer->id)],
            'sms' => ['required', 'string', 'min:1', 'max:255'],
            'whatsapp' => ['required', 'string', 'min:1', 'max:255'],
            'language_id' => ['required', 'integer', 'exists:languages,id'],
            'currency_id' => ['required', 'integer', 'exists:currencies,id'],
        ];
    }

    /*
     * Return a customized error messages
     */
    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $notification = array(
            'text' => $validator->errors()->first(),
            'title' => 'فشل',
            'status' => 'error'
        );

        $response = response()->json(['errors' => $notification]);
        throw new \Illuminate\Validation\ValidationException($validator, $response);
    }
}
