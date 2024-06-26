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

    protected function prepareForValidation()
    {
        $communications = [];
        if (is_array($this->communication)) {
            foreach ($this->communication as $key => $value) {
                $communications[$key] = in_array($value, ['on', 1]) ? 1 : 0;
            }
        }

        $this->merge([
            'communications' => json_encode($communications)
        ]);
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
            'language_id' => ['required', 'integer', 'exists:languages,id'],
            'currency_id' => ['required', 'integer', 'exists:currencies,id'],
            'communication' => ['sometimes', 'array'],
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
