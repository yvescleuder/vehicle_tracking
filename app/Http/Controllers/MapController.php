<?php

namespace App\Http\Controllers;

use App\Map;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MapController extends Controller
{

    /**
     * Busca o endereço de uma latitude e longitude
     *
     * @param $lat
     * @param $lng
     * @return mixed
     */
    public static function getAddressAPI($lat, $lng) {
        $request = "https://maps.googleapis.com/maps/api/geocode/json?latlng={$lat},{$lng}&key=AIzaSyBV4P6EsMZwzaznHJdAGQcRBfpsFaZQGaY";
        return json_decode(file_get_contents($request));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    }
}
