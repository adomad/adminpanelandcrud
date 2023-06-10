<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SpotBookingRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'date' => 'required|date',
            'num_tickets' => 'required|integer|min:1',
        ];
    }
}
