<?php

namespace App\Http\Resources\Order;

use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
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
            'address' => $this->address,
            'city' => $this->city,
            'district' => $this->district,
            'state' => $this->state,
            'phone' => $this->phone,
            'alternate phone number' => $this->alternate_phone,
            'pincode' => $this->pincode,
            'user' => new AddressUserREsource($this->user),
        ];
    }
}
