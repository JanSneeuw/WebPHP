<?php

namespace App\Http\Requests;

use App\Models\PickUp;
use Illuminate\Foundation\Http\FormRequest;

class StorePickUpRequest extends FormRequest
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
        $currentDate = now();
        //check if current date is before 15:00, if so add one day else add two days
        $date = $currentDate->hour < 15 ? $currentDate->addDay() : $currentDate->addDays(2);

        return [
            'date' => 'required|date|afterorequal:'.$date,
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'date.afterorequal' => 'The date must at least be one day in advance if is currently before 15:00, or two days in advance if it is currently after 15:00.',
        ];
    }
}
