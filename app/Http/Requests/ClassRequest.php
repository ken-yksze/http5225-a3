<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check(); // Only authenticated users
    }

    public function rules(): array
    {
        return [
            'class_name' => 'required|string|max:255',
            'class_time' => 'required|date',
            'video_id' => 'nullable|string|max:255',
        ];
    }
}
