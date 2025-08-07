<?php

namespace App\Http\Requests\Cards;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCardRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'column_id' => 'required|integer',
            'text' => 'required|string|min:3|max:140',
        ];
    }
}
