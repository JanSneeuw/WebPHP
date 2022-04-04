<?php

namespace App\Http\Requests;

use App\Models\Package;
use App\Models\PickUp;
use Illuminate\Foundation\Http\FormRequest;

class CreatePickupRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('create', PickUp::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'packages' => 'required|array|min:1',
        ];
    }
}
