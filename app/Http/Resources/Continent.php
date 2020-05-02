<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Continent extends JsonResource
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
            'text' => $this->cn_name,
        ];
    }
}
