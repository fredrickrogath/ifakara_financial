<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SubAccountResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        return [
            "id" => $this->id,
            "Account code" => $this->account_code,
            "Account name" => $this->account_name,
            "Purposes" => \App\Http\Resources\PurposeResource::collection($this->whenLoaded('purposes'))
        ];
    }
}
