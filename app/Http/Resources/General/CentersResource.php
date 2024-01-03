<?php

namespace App\Http\Resources\General;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class CentersResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'region'               => $this->region,
            'country'              => $this->country,
            'state'                => $this->state,
            'name'                 => $this->name,
            'logo'                 => $this->logo,
            'email'                => $this->email,
            'address'              => $this->address,
            'url'                  => $this->url,
            'status'               => $this->status(),
            'create_date'          => $this->created_at->format('d-m-Y h:i a'),

        ];
    }
}
