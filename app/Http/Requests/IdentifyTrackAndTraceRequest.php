<?php

namespace App\Http\Requests;

use App\Models\TrackAndTrace;
use Illuminate\Foundation\Http\FormRequest;

class IdentifyTrackAndTraceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $trackAndTrace = TrackAndTrace::find($this->route('id'));
        $package = $trackAndTrace->package;
        $address = $package->address;
        if($address->zip !== $this->postal_code) {
            return false;
        }
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'postal_code' => 'required|string|regex:/^[0-9]{4} ?[A-Z]{2}$/i',
        ];
    }
}
