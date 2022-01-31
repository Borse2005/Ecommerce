<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'product' => $this->product,
            'thumbnail' => $this->thumbnail,
            'description' => $this->description,
            'price' => $this->price,
            'discount' => $this->discount,
            'stock' => $this->stock,
            'highlight' => $this->highlight,
            'specifications' => $this->specifications,
            'category' => new ProductCategoryResource($this->category),
            'subcategory' => new ProductSubcategoryResource($this->subcategory),
            'color' => new ProductColorResource($this->color),
        ];
    }
}
