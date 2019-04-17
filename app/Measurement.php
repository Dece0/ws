<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Measurement extends Model
{
    //
    protected $primaryKey = 'mensuration_id';
    public $timestamps = false;

    // ManyToOne relationship between Measurement and Physical quantity
    public function physical_quantity() 
    {
        return $this->belongsTo(Physical_quantity::class, 'physical_quantity_id');
    }

    // ManyToOne relationship between Measurement and Sensor
    public function sensor() 
    {
        return $this->belongsTo(Sensor::class, 'sensor_id');
    }
}
