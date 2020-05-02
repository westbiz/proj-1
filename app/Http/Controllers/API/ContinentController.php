<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Continent;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Resources\ContinentCollection;
use App\Http\Resources\CountryCollection;
use App\Http\Resources\ContinentResource;
use App\Http\Resources\CountryResource;

class ContinentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $per_page = $request->get('per_page');
        // dd($request->route()->uri);
        $continents =Continent::paginate($per_page);
        return new ContinentCollection($continents);
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
        return Continent::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Continent $continent)
    {
        //with('countries','cities') 资源类中避免 N+1 查询
        // $continents= Continent::with('countries','cities')->findOrFail($continent);
        
        return new ContinentResource($continent);
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
        $continent = Continent::findOrFail($id);
        $continent->update($request->all());

        return $continent;
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
        $continent = Continent::findOrFail($id);
        $continent->delete();
        //204: No content，操作执行成功，但是没有返回任何内容
        return 204;
    }

    public function getCountries($id)
    {
        //
        $continents = Country::where('continent_id','=',$id)->get();
        return new CountryCollection($continents);
    }
    

}
