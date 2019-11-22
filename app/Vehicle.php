<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'number_module';
    public $incrementing = false;

    protected $fillable = [
        'board',
        'model',
        'number_module',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function maps() {
        return $this->hasMany(Map::class, 'number_module', 'number_module');
    }
}
