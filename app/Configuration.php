<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    //
    protected $primaryKey = 'id';
    public $timestamps = false;

    // ManyToOne relationship between Configuration and Weather station
    public function weather_station()
    {
        return $this->belongsTo(WeatherStation::class, 'weather_station_id');
    }
}
