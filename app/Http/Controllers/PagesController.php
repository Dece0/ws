<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Validator;
use App\Measurement;
use App\Physical_quantity;
use Gmopx\LaravelOWM\LaravelOWM;

class PagesController extends Controller
{
    public function __construct() {
        $paths = [];

        foreach ( \Route::getRoutes() as $route ) {
            if( $route->methods()[0] !== 'GET') continue;
            if( $route->uri() === '/') {
                $path = $route->uri();
                $paths[null] = "Dashboard";
            }
            else {
                $path = $route->uri();
                $paths[$path] = ucfirst($path);
            }
            
        }

        $paths = array_unique( $paths ); 
        view()->share('nav_links', $paths); 
    }

    public function index() {
        //DB::select("SELECT name FROM sqlite_master WHERE type='table' ORDER BY name;")
        //DB::select('select * from sqlite_master where type="table"')

        //posledne meranie 4-roch velicin
        $number_of_quantity = DB::table('physical_quantities')->count();

        $lastMensuration = DB::table('measurements')
            ->join('physical_quantities', 'measurements.physical_quantity_id', '=', 'physical_quantities.physical_quantity_id')
            ->select('measurements.measurement_id', 'physical_quantities.quantity_name', 'measurements.value', 'physical_quantities.unit_symbol', 'measurements.time')
            ->orderBy('measurements.measurement_id', 'desc')
            ->take($number_of_quantity)
            ->get();



        $coords = (object) array('lat' => 48.158896, 'long' => 17.063712);
        $arr = [
            'lat' => 48.158896,
            'lon' => 17.063712
        ];

        $lowm = new LaravelOWM();

        $forecast = $lowm->getWeatherForecast($arr, '', '', 3);
        $forecastArray = [];
        
        foreach ($forecast as $weather) {
            array_push($forecastArray, $weather);
        }
        return view('pagesWS/index',[
            'coords' => $coords,
            'lastMensuration' => $lastMensuration,
            'forecastInfo' => $forecast,
            'forecastWeather' => $forecastArray
        ]);
    }

    public function test() {
        $result = [];

        foreach (Physical_quantity::where('quantity_name', 'Pressure')->first()->measurements as $measurement){
            $obj = new \stdClass();
            $obj->time = $measurement->time;
            $obj->value = $measurement->value;
            array_push($result, $obj);
        }

        dd($result);
    }

    public function temperature() {
        $result = [];

        foreach (Physical_quantity::where('quantity_name', 'Temperature')->first()->measurements as $measurement){
            $obj = new \stdClass();
            $obj->time = $measurement->time;
            $obj->value = $measurement->value;
            array_push($result, $obj);
        }

        return view('pagesWS/temperature', [
            'name' => 'Temperature',
            'dataset' => $result,
            'csrf_token' => csrf_token()
        ]);              
    }

    public function humidity() {
        $result = DB::table('measurements')
            ->select('measurements.value', 'measurements.time')
            ->where("measurements.physical_quantity_id", "=", 3)
            ->get();

        return view('pagesWS/humidity', [
            'name' => 'Humidity',
            'dataset' => $result,
            'csrf_token' => csrf_token()
        ]);
    }

    public function pressure() {
        $result = [];
        foreach (Measurement::where('physical_quantity_id', 2)->cursor() as $item) {
            $obj = new \stdClass();
            $obj->time = $item->time;
            $obj->value = $item->value;
            array_push($result, $obj);
        }

        return view('pagesWS/pressure', [
            'name' => 'Pressure',
            'dataset' => $result,
            'csrf_token' => csrf_token()
        ]);
    }

    public function air() {

        return view('pagesWS/air');
    }

    public function gas() {

        return view('pagesWS/gas');
    }

    public function uv() {
        
        return view('pagesWS/uv');
    }

    public function settings() {
        $stationName = 'Weather Station 2k18';
        $array = [
            'Temperature' => '04:00:00',
            'Humidity' => '05:00:00',
            'Pressure' => '03:00:00'
        ];

        return view('pagesWS/settings', [
            'stationName' => $stationName,
            'array' => $array,
        ]);
    }

    public function downloadSelectedRange(Request $request) {
        $validator = Validator::make( $request->all(), [
            'dateFrom' => 'required|date',
            'dateTo' => 'required|date',
            'quantityName' => 'required',
        ]);

        if ($validator->fails()) return back();
        
        switch ($request->input('quantityName')) {
            case 'Temperature':
                $quantityID = 1;
                break;

            case 'Pressure':
                $quantityID = 2;
                break;

            case 'Humidity':
                $quantityID = 3;
                break;
            
            default:
                $quantityID = 1;
                break;
        }

        $dateTo = date('Y-m-d', strtotime("+1 day", strtotime($request->input('dateTo'))));

        $output = fopen(storage_path(('app/output.txt')), 'w');
        foreach (Measurement::whereBetween("time", [$request->input('dateFrom'), $dateTo])->where('physical_quantity_id', $quantityID)->cursor() as $item) {
            fwrite($output, "$item->time \t $item->value \r\n");
        }

        fclose($output);
        return response()->download(storage_path('app/output.txt') );
    }

    public function downloadAll(Request $request) {
        $validator = Validator::make( $request->all(), [
            'quantityName' => 'required',
        ]);

        if ($validator->fails()) return back();

        switch ($request->input('quantityName')) {
            case 'Temperature':
                $quantityID = 1;
                break;

            case 'Pressure':
                $quantityID = 2;
                break;

            case 'Humidity':
                $quantityID = 3;
                break;
            
            default:
                $quantityID = 1;
                break;
        }

        $output = fopen(storage_path(('app/output.txt')), 'w');
        foreach (Measurement::where('physical_quantity_id', $quantityID)->cursor() as $item) {
            fwrite($output, "$item->time \t $item->value \r\n");
        }
        fclose($output);
        return response()->download(storage_path('app/output.txt') );
    }
}



