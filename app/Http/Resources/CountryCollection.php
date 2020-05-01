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
            // 'links' => [
            //     'self' => 'link-value',
            // ],



        ];
    }

    // 该方法只有在资源是最外层被渲染数据的情况下才会返回一个被包含到资源响应中的元数据数组：
    // public function with($request)
    // // {
    // //    return [
    // //         'msg' => [
    // //             'rel'   => 'collection http://proj.test:8000/api/v1/countries/{id}/cities',
    // //             'href'  => url('api/v1/countries'),
    // //             'title' => 'list of countries',
    // //             'type'  =>  'application/vnd.yourformat+json',
    // //             // 'message'=>'OK',
    // //             // 'status'=> 200,
    // //         ],
    // //     ];

    //      return [
    //             'meta' => [
    //                 'key' => 'value',
    //             ],
    //         ];
    // }
}
