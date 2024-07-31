<?php

namespace App\Http\Requests\Columns;

use Illuminate\Foundation\Http\FormRequest;

class UpdateColumnRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|string|min:3|max:255'
        ];
    }
}