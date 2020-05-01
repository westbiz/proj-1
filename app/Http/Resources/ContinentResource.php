<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContinentResource extends JsonResource
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
            // 'parent_id'=> $this->parent_id,
            'id' => $this->id,
            'cn_name' => $this->cn_name,
            'en_name' => $this->en_name,
            'cities' => CityResource::collection($this->whenLoaded('cities')),
            'created_at'=> (string)$this->created_at,
            'updated_at'=> (string)$this->updated_at,
            'countries' => CountryResource::collection($this->whenLoaded('countries')),
        ];
    }

    //with方法，可以获取数据库记录以外的其他相关数据
    public function with($request) {
        return [
            'status'=> 200,
            'message'=>'OK!',
        ];
    }
}
