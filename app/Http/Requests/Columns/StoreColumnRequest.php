<?php

namespace App\Http\Requests\Columns;

use Illuminate\Foundation\Http\FormRequest;

class StoreColumnRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required'
        ];
    }
}
