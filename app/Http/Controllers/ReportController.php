<?php

namespace App\Http\Controllers;

use App\Vehicle;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function indexPoints() {
        $vehicles = Vehicle::all();
        return view('report.points')->with(['vehicles' => $vehicles]);
    }

    public function indexDisplacements() {
        $vehicles = Vehicle::all();
        return view('report.displacements')->with(['vehicles' => $vehicles]);
    }

    /**
     * Retorna todos os deslocamentos que o veículo fez em um determinado dia
     *
     * @param $number_module
     * @param $date
     * @return false|string
     * @throws \Exception
     */
    public function getDisplacements(Request $request) {
        try {
            $vehicle = Vehicle::find($request->number_module);
            $maps = $vehicle->maps()->where('created_at', 'like', "%$request->date%")->get();

            if($maps->isEmpty()) {
                return redirect()->back()->with('error', 'Não existem dados para este veículo.');
            }

            $positions = [];

            /**
             * Essa variável é para saber se já encontrou uma posição com o veiculo ligado.
             * Se já encontrou, preciso agora saber uma posição dele desligada.
             * Quando essa variável está == 1 é porque encontrou uma posição do veiculo ligado.
             * Quando está 0 é porque ainda não encontrou uma posição.
             */
            $started = 0;
            // Essa variável é somente para eu armazenar a informação do veículo desligado na mesma key do array para ficar em 1 linha.
            $keyGloblal = 0;
            foreach($maps as $key => $map) {
                if($map->key == 1 && $started == 0) {
                    $positions[$key]['board'] = $vehicle->board;
                    $positions[$key]['model'] = $vehicle->model;
                    $positions[$key]['startLat'] = $map->lat;
                    $positions[$key]['startLng'] = $map->lng;
                    $positions[$key]['startDate'] = $map->created_at->format('d/m/Y H:i:s');
                    $positions[$key]['startAddress'] = MapController::getAddressAPI($map->lat, $map->lng)->results[0]->formatted_address;
                    // Tive que por essas 3 variáveis aqui, pois pode acontecer que o carro esteja ligado e só desligou no outro dia;
                    // Então não vai encontrar key == 0, logo ele não tem ponto final naquela dia, somente no outro.
                    $positions[$key]['finalLat'] = null;
                    $positions[$key]['finalLng'] = null;
                    $positions[$key]['finalDate'] = null;
                    $positions[$key]['finalAddress'] = null;
                    $positions[$key]['distance'] = null;
                    $positions[$key]['time'] = null;
                    $started = 1;
                    $keyGloblal = $key;
                } else if ($map->key == 0 and $started == 1){
                    $positions[$keyGloblal]['finalLat'] = $map->lat;
                    $positions[$keyGloblal]['finalLng'] = $map->lng;
                    $positions[$keyGloblal]['finalDate'] = $map->created_at->format('d/m/Y H:i:s');
                    $positions[$keyGloblal]['finalAddress'] = MapController::getAddressAPI($map->lat, $map->lng)->results[0]->formatted_address;
                    $positions[$keyGloblal]['distance'] = $map->odometer - $maps[$keyGloblal]->odometer.' km';
                    $datePoint = Carbon::parse($map->created_at);
                    $positions[$keyGloblal]['time'] = $datePoint->diffInMinutes($maps[$keyGloblal]->created_at).' minutos';
                    $started = 0;
                }
            }
            // Reorganizando os indexes do array
            $positions = array_values($positions);
            $vehicles = Vehicle::all();
            return view('report.displacements', ['vehicles' => $vehicles, 'positions' => $positions]);

        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Erro ao buscar informações deste veículo.');
        }
    }

    public function getPoints(Request $request) {
        try {
            $vehicle = Vehicle::findOrFail($request->number_module);
            $positions = $vehicle->maps()->where('created_at', 'like', "%$request->date%")->get();
            $data = [];

            if($positions->isEmpty()) {
                return redirect()->back()->with('error', 'Não existem dados para este veículo.');
            }

            foreach ($positions as $key => $position) {
                $data[$key]['board'] = $vehicle->board;
                $data[$key]['model'] = $vehicle->model;
                $data[$key]['lat'] = $position->lat;
                $data[$key]['lng'] = $position->lng;
                $data[$key]['date'] = $position->created_at->format('d/m/Y H:i:s');
                $data[$key]['address'] = MapController::getAddressAPI($position->lat, $position->lng)->results[0]->formatted_address;
                $data[$key]['kilometers'] = $position->kilometers;
                $data[$key]['key'] = $position->key == 1 ? 'Ligada' : 'Desligada';
                $data[$key]['odometer'] = $position->odometer;
            }

            $vehicles = Vehicle::all();
            return view('report.points', ['vehicles' => $vehicles, 'positions' => $data]);
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Erro ao buscar informações deste veículo.');
        }
    }
}
