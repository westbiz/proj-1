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
        return  [
            'id' => $this->id,
            'cname' => $this->cname,
            'continent' => $this->continent->cn_name, 
            'name' => $this->name, 
            'lower_name' => $this->lower_name,
            'country_code' => $this->country_code, 
            'full_name' => $this->full_name, 
            'full_cname' => $this->full_cname, 
            'remark' => $this->remark,
            'cities' => CityResource::collection($this->whenLoaded('cities')),
            // 'created_at'=> (string)$this->created_at,
            // 'updated_at'=> (string)$this->updated_at,
        ];
    }

    //with方法，可以获取数据库记录以外的其他相关数据
	public function with($request) {
        return [
            'status'=> 200,
            'message'=>'OK!',
        ];
	}

    // 该方法会在资源在响应中作为最外层数据返回时被调用
    public function withResponse($request, $response)
    {
        $response->header('X-Value', 'True');
    }

}
