<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CountryCollection extends ResourceCollection
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

            'data' => $this->collection->map(function($query){
                return $query->only(['id','cname','name']);
            }),
            'continent'=>$this->collection->first()->continent->only(['id','cn_name']),
            
            

        ];
    }

    // 该方法只有在资源是最外层被渲染数据的情况下才会返回一个被包含到资源响应中的元数据数组：
    public function with($request)
    {
         return [
                // 'meta' => [
                //     'key' => 'value',
                // ],
                'links' => [
                    'nav' => url('api/v1/countries?per_page='.$request->get('per_page').'&page=2'),
                ],

            ];
    }
}
