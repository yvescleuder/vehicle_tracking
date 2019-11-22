<?php

namespace App\Http\Controllers;

use App\Vehicle;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('vehicle.index')->with(['vehicles' => $vehicles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehicle.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return false|string
     * @throws \Exception
     */
    public function store(Request $request)
    {
        try {
            $vehicle = new Vehicle();
            $vehicle->board = $request->board;
            $vehicle->model = $request->model;
            $vehicle->number_module = $request->number_module;
            $vehicle->save();

            return redirect()->route('vehicle.index')->with('success', 'Veículo cadastrado com sucesso!');
        } catch (\Exception $exception) {
            return redirect()->back()->withInput($request->all())->with('error', 'Erro ao cadastrar o veículo!');
        }
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexDay()
    {
        $vehicles = Vehicle::all();
        return view('location.day')->with(['vehicles' => $vehicles]);
    }

    /**
     * Retorna todas as posições do veiculo em um determinado dia
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function getDay(Request $request) {
        try {
            $vehicle = Vehicle::findOrFail($request->number_module);
            $positions = $vehicle->maps()->where('created_at', 'like', "%$request->date%")->get();
            $frist = array_key_first($positions->toArray());
            $last = array_key_last($positions->toArray());
            $distance = $positions[$last]['odometer'] - $positions[$frist]['odometer'];

            $request = "https://maps.googleapis.com/maps/api/geocode/json?latlng={$positions[$last]['lat']},{$positions[$last]['lng']}&key=AIzaSyBV4P6EsMZwzaznHJdAGQcRBfpsFaZQGaY";
            $file_contents = json_decode(file_get_contents($request));
            $address_components = $file_contents->results[0]->address_components;
            $lastAddress = $address_components[1]->short_name.', '.$address_components[2]->short_name.', '.$address_components[3]->short_name.' - '.$address_components[4]->short_name;

            $data = [];

            foreach ($positions as $key => $position) {
                $data[$key]['lat'] = $position->lat;
                $data[$key]['lng'] = $position->lng;
                $data[$key]['kilometers'] = $position->kilometers;
                $data[$key]['key'] = $position->key;
                $data[$key]['odometer'] = $position->odometer;
            }

            $positions = $vehicle->toArray();
            $positions['distance'] = $distance;
            $positions['lastAddress'] = $lastAddress;
            $positions['maps'] = $data;

            $vehicles = Vehicle::all();
            return view('location.day', ['vehicles' => $vehicles, 'positions' => $positions]);
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Não existem dados para este veículo.');
        }
    }
}
