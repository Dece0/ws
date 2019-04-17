<?php

use Illuminate\Database\Seeder;
use App\Measurement;
use App\Physical_quantity;
use App\Sensor;
use App\WeatherStation;
use App\Configuration;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $today = date('Y-m-d H:i:s');

        for ($i=0; $i < 30; $i++) { 
            $new_measurement = new Measurement;
            $new_measurement->time = $today;
            $new_measurement->value = rand(0, 100);
            $new_measurement->sensor_id = 1;
            $new_measurement->physical_quantity_id = 1;
            $new_measurement->save();

            $new_measurement = new Measurement;
            $new_measurement->time = $today;
            $new_measurement->value = rand(0, 100);
            $new_measurement->sensor_id = 1;
            $new_measurement->physical_quantity_id = 2;
            $new_measurement->save();

            $new_measurement = new Measurement;
            $new_measurement->time = $today;
            $new_measurement->value = rand(0, 100);
            $new_measurement->sensor_id = 1;
            $new_measurement->physical_quantity_id = 3;
            $new_measurement->save();

            $repeat = strtotime("+4 hours", strtotime($today));
            $today = date('Y-m-d H:i:s', $repeat);
        }
        
        $new_sensor = new Sensor;
        $new_sensor->name = "Bosh";
        $new_sensor->model = "MH330";
        $new_sensor->save();

        $new_ws = new WeatherStation();
        $new_ws->name = 'My weather station';
        $new_ws->save();

        $conf = new Configuration();
        $conf->type = "Timer for sensor";
        $conf->value = "3:00:00";
        $conf->weather_station_id = 1;
        $conf->save();

        $new_quantity = new Physical_quantity;
        $new_quantity->quantity_name = "Temperature";
        $new_quantity->unit_name = "Degree";
        $new_quantity->unit_symbol = "°C";
        $new_quantity->sensor_id = "1";
        $new_quantity->save();

        $new_quantity = new Physical_quantity;
        $new_quantity->quantity_name = "Pressure";
        $new_quantity->unit_name = "Pascal";
        $new_quantity->unit_symbol = "Pa";
        $new_quantity->sensor_id = "1";
        $new_quantity->save();

        $new_quantity = new Physical_quantity;
        $new_quantity->quantity_name = "Humidity";
        $new_quantity->unit_name = "Percentage";
        $new_quantity->unit_symbol = "%";
        $new_quantity->sensor_id = "1";
        $new_quantity->save();

        // $this->call(UsersTableSeeder::class);
        //factory(App\measurement::class, 30)->create();
        //factory(App\Physical_quantity::class, 1)->create();
    }
}
