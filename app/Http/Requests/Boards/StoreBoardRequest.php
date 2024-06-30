<?php

namespace App\Http\Requests\Boards;

use Illuminate\Foundation\Http\FormRequest;

class StoreBoardRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required'
        ];
    }
}
