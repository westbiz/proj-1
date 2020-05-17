<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CityResource extends JsonResource
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
            'id'  => $this->id,
            'country' => $this->country->cn_name, 
            // 'parent_id' => $this->parent_id,
            'cn_name' => $this->cn_name, 
            'en_name' => $this->en_name, 
            'cn_state' => $this->cn_state, 
            'en_state' => $this->en_state, 
            'lower_name' => $this->lower_name, 
            'state_code' => $this->state_code, 
            'city_code' => $this->city_code, 
            'remark' => $this->remark,
            'created_at'=> (string)$this->created_at,
            'updated_at'=> (string)$this->updated_at,

        ];
    }

     //with方法，可以获取数据库记录以外的其他相关数据
    public function with($request) {
        return [
            'status'=> 200,
            'message'=>'OK!',

            'links' => [
                'self' => url('api/v1/cities/'. $this->id),
            ],
        ];
    }
}
