<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PackageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'provider' => $this->provider,
            'receiver_address' => $this->receiver_address,
            'receiver_name' => $this->receiver_name,
            'weight' => $this->weight,
            'measurements' => $this->measurements,
            'status' => $this->status,
        ];
    }
}
