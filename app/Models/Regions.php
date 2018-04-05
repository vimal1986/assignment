<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Regions extends Model
{

    public $active;
    public $filter_status;

    protected $table = 'regions';

    protected $with = [
        'requests'
    ];

    public function requests()
    {
        return $this->hasMany('App\Models\ServiceRequest', 'region')->where('status','Open');
    }

    public static function active()
    {
        return self::query()->where('is_active', 1);
    }


    public function getActiveRegions()
    {
        return self::active()->get();
    }
}
