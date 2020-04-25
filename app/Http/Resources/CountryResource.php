<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CountryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'continent_id' => $this->continent_id, 
            'name' => $this->name, 
            'lower_name' => $this->lower_name,
            'country_code' => $this->country_code, 
            'full_name' => $this->full_name, 
            'cname' => $this->cname,
            'full_cname' => $this->full_cname, 
            'remark' => $this->remark,
        ];
    }
}
