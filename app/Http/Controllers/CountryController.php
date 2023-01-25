<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use App\City;

class CountryController extends Controller
{
    public function index()
    {
        $countries= Country::all();
        return view('countries.index',['countries'=> $countries]);

    }
    public function getCountries()
    {
        $countries = Country::get(['id','name']);
        return $countries;
    }
//    public function getCities(Country $country)
//    {
//        return $country-> cities()->get(['id','name']);
//    }

}
