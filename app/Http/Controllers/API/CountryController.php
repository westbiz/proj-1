<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\City;
use App\Http\Resources\CountryCollection;
use App\Http\Resources\CountryResource;
use App\Http\Resources\CityResource;
use App\Http\Resources\CityCollection;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $count = $request->get('count');
        $countries = Country::paginate($count);
        return new CountryCollection($countries);
        // return (new CountryCollection($countries))
        // ->withPath(url($request->route()->uri.'?count='.$count));


        // $data = CountryResource::collection($countries);
        //             // dd($data->items);
        // return response()->json([
        //     'message'=>'OK',
        //     'status'=> 200,
        //     'data'=> $data,

            // 'links'=>$data->resource,
        // ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $countries= Country::find($id);
        // return new CountryResource($countries);
        return new CountryResource($countries);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $country = Country::findOrFail($id);
        $country->update($request->all());

        return $country;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $country = Country::findOrFail($id);
        $country->delete();

        return 204;
    }

    public function getCities($id)
    {
        //
        $cities = City::where('country_id','=',$id)->paginate(null);
        return new CityCollection($cities);
    }
    

    public function search(Request $request)
    {
        //
        $s = $request->get('s');
        // dd($s);
        $countries= Country::where('cname','like','%'.$s.'%')->paginate(1);
        // dd($countries->items()==null);
        if ($countries->items()==null) {
            return response()->json([
                'message'=>'错误。请输入正确的关键字！',
                'status' => 500,
            ]);
        }
        return new CountryCollection($countries);
    }

}
