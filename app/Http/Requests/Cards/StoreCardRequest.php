<?php

namespace App\Http\Requests\Cards;

use Illuminate\Foundation\Http\FormRequest;

class StoreCardRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'text' => 'required|string|min:3|max:255',
        ];
    }
}
