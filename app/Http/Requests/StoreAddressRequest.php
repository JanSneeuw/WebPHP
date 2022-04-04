<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAddressRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'string|max:255',
            'provider' => 'string|max:255',
            'receiver_name' => 'string|max:255',
            'weight' => 'numeric',
            'measurements' => 'string|regex:/\d+x\d+x\d+/',
        ];
    }
}
