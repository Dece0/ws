<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WeatherStation extends Model
{
    //
    protected $primaryKey = 'weather_station_id';

    // OneToMany relationship between Weather Station and Configuration
    public function configurations()
    {
        return $this->hasMany(Configuration::class, 'weather_station_id');
    }

}
