<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Map extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'number_module';
    public $incrementing = false;

    protected $fillable = [
        'lat',
        'lng',
        'kilometers',
        'key',
        'number_module',
        'odometer'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function vehicle() {
        return $this->belongsTo(Vehicle::class, 'number_module');
    }
}
