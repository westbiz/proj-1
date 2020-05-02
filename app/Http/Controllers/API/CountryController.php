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
        // $page = $request->get('page');
        $per_page = $request->get('per_page');
        // $countries = new CountryCollection(Country::paginate($per_page, ['id','cname','name']));
        $countries= Country::paginate($per_page);
        return new CountryCollection($countries);
        // return new CountryCollection(Country::all());
        // return $countries->withPath(url('api/v1/countries?per_page='.$per_page));


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
    public function show(Country $country)
    {
        //
        return new CountryResource($country);
        // $countries= Country::find($id);
        // // return new CountryResource($countries);
        // return new CountryResource($countries);
        
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
        $cities = City::where('country_id','=',$id)->get();
        return new CityCollection($cities);
    }
    

    public function search(Request $request)
    {
        //
        $s = $request->get('s');
        // dd($s);
        $countries= Country::where('cname','like','%'.$s.'%')->get();
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
