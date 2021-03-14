<?php

namespace App\Http\Requests\Medals;

use Illuminate\Foundation\Http\FormRequest;

class CreateUpdateMedalFormRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'event_id' => 'required|int|exists:events,id',
            'category' => 'required|string',
            'image' => 'required|string',
        ];
    }
}
