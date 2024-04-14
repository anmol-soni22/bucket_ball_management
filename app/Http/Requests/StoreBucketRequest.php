<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBucketRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    protected $errorBag = 'createBucketForm';

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
            'name' => ['required', 'string', 'unique:buckets', 'max:255'],
            'capacity' => ['required', 'numeric'],
        ];
    }
}
