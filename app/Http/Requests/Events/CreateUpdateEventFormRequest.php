<?php

namespace App\Http\Requests\Events;

use Illuminate\Foundation\Http\FormRequest;

class CreateUpdateEventFormRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'eventName' => 'required|string',
            'location' => 'required|string',
            'date' => 'required|date_format:Y-m-d'
        ];
    }
}
