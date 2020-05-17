<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ContinentCollection extends ResourceCollection
{

    // 会尝试映射给定用户实例到  资源，如果要自定义这一行为，可以覆盖资源集合的 $collects 属性：
    // public $collects = 'App\Http\Resources\Continent';

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
        // return [
        //     // 'status'=> 200,
        //     // 'message'=>'OK!',
            
        //     // 将映射到'App\Http\Resources\Continent';
        //     'data' => $this->collection,
            
        // ];
    }

    // 该方法只有在资源是最外层被渲染数据的情况下才会返回一个被包含到资源响应中的元数据数组：
    public function with($request)
    {
         return [
                // 'meta' => [
                //     'key' => 'value',
                // ],
                'links' => [
                    'self' => url('api/v1/continents?per_page='.$request->get('per_page').'&page=1'),
                ],
            ];
    }
}
