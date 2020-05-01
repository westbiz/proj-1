<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CityCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        return [
            'status'=> 200,
            'message'=>'OK!',
            'data' => $this->collection->map(function($result){
                return $result->only(['id','cn_name','name']);
            }),
            'country'=>$this->collection->first()->country->only(['id','cname'])
            // 'links' => [
            //     'self' => 'link-value',
            // ],
        ];
    }
}
