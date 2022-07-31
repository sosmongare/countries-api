<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;

class CountryController extends Controller
{
    //display all countries
    public function index()
    {
        $countries = Country::all();
        return response()->json($countries);
    }

    //store a newly created country
    public function store(Request $request)
    {
        $country=new Country;
        $country->name = $request->name;
        $country->iso3 = $request->iso3;
        $country->numeric_code = $request->numeric_code;
        $country->iso2 = $request->iso2;
        $country->phonecode = $request->phonecode;
        $country->capital = $request->capital;
        $country->currency = $request->currency;
        $country->save();
        if($country->save()){
          return response()->json([
                "message" => "Country added successfully"
                ], 201);
            }else{
                return response()->json([
                    "message" => "Country not added."
                ], 404);
            }
    }

    //Display specific country
    public function show($id)
    {
        $country = Country::find($id);
        if (!empty($country)) {
            return response()->json($country);
        }
        else
        {
            return response()->json([
                "message" => "Country not found"
            ], 404);
        }
    }

    //Update the country
    public function update(Request $request, $id)
    {
        if (Country::where('id', $id)->exists()) {
            $country = Country::find($id);
            // $country->name = is_null($request->name) ? $country->name : $request->name;
            $country->name = is_null($request->name) ? $country->name : $request->name;
            $country->iso3 = is_null($request->iso3) ? $country->iso3 : $request->iso3;
            $country->numeric_code = is_null($request->numeric_code) ? $country->numeric_code : $request->numeric_code;
            $country->iso2 = is_null($request->iso2) ? $country->iso2 : $request->iso2;
            $country->phonecode = is_null($request->phonecode) ? $country->phonecode : $request->phonecode;
            $country->capital = is_null($request->capital) ? $country->capital : $request->capital;
            $country->currency = is_null($request->currency) ? $country->currency : $request->currency;
            $country->save();
            return response()->json([
                "message" => "Country Updated."
                ], 201);
            }else{
                return response()->json([
                    "message" => "Country Not Found."
                ], 404);
            }
    }

    //Remove the country
    public function destroy($id)
    {
        if(Country::where('id', $id)->exists()) {
            $Country = Country::find($id);
            $Country->delete();

            return response()->json([
              "message" => "Country records deleted."
            ], 201);
        } else {
            return response()->json([
              "message" => "Country records not found."
            ], 404);
        }
    }


}
