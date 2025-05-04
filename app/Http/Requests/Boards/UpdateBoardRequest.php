<?php

namespace App\Http\Requests\Boards;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBoardRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'sometimes|string|min:3|max:255',
            'timer_started_at' => 'sometimes|nullable|date',
            'timer_duration' => 'sometimes|integer',
            'timer_duration_remaining' => 'sometimes|integer',
        ];
    }
}
