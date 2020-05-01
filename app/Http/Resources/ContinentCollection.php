<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ContinentCollection extends ResourceCollection
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
                return $result->only(['id','cn_name','en_name']);
            }),
            // 'links' => [
            //     'self' => 'link-value',
            // ],
        ];
    }
}
