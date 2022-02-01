<?php

namespace App\Http\Resources\Order;

use App\Http\Resources\ProductResource;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'qty' => $this->qty,
            'address' => new AddressResource($this->address),
            'product' => new ProductResource($this->product),
            'user' => new AddressUserREsource($this->user),
            'payment_status' => $this->payment_status,
            'delivery_status' => new OrderStatusResource($this->status),
        ];
    }
}
