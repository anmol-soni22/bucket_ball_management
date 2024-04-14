<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBallRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    protected $errorBag = 'createBallForm';

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
            'name' => ['required', 'string', 'unique:balls', 'max:255'],
            'size' => ['required', 'numeric'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Ball Name is required',
            'name.string' => 'Ball Name must be a string',
            'name.unique' => 'Ball Name already exists',
            'name.max' => 'Ball Name must be less than 255 characters',
            'size.required' => 'Ball Size is required',
        ];
    }
}
