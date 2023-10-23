<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AccountResource extends JsonResource
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
            "Account_code" => $this->account_code,
            "Account_name" => $this->account_name,
            "Sub_accounts" => \App\Http\Resources\SubAccountResource::collection($this->whenLoaded('subAccounts'))
        ];
    }
}
