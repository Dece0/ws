<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    //
    protected $primaryKey = 'sensor_id';
    public $timestamps = false;

    // OneToMany relationship between Sensor and Measurement
    public function measurements()
    {
        return $this->hasMany(Measurement::class, 'sensor_id');
    }

    // OneToMany relationship between Sensor and Physical quantity
    public function physical_quantities()
    {
        return $this->hasMany(Physical_quantity::class, 'sensor_id');
    }
}
