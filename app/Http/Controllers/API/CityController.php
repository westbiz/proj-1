<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Resources\CityResource;
use App\Http\Resources\CityCollection;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //请求页码数
        // $per_page = $request->get('per_page');
        // $cities = City::paginate($per_page);
        $cities = City::all();
        return response()->json([
            'success' => true,
            'data' => $cities
        ]);   
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
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        // $city = City::find($id);
        // return new CityResource($city);

        $data = City::find($id);
        $city = new CityResource($data);
        if (!$city->resource) {
            return response()->json([
                'success' => false,
                'message' => 'City ' .$id. ' not be found!'
            ], 400);
        }
        return response()->json([
            'success' => true,
            'data' => $city
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy($city)
    {
        //
    }
}
