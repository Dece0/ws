<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Physical_quantity extends Model
{
    //
    protected $primaryKey = 'physical_quantity_id';
    public $timestamps = false;

    // OneToMany relationship between Physical quantity and Measurement
    public function measurements()
    {
        return $this->hasMany(Measurement::class, 'physical_quantity_id');
    }

    // ManyToOne relationship between Physical quantity and Sensor
    public function sensor()
    {
        return $this->belongsTo(Sensor::class, 'sensor_id');
    }
}
