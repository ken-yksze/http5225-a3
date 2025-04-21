<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AllocationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'class_id' => 'required|exists:classes,class_id',
        ];
    }
}
