<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Image;
use Illuminate\Support\Facades\Auth;

class UserEnquiry extends Model
{
    use SoftDeletes;
    public $active;
    protected $table = 'user_enquiries';
    protected $fillable = ['email',
        'product_id'
    ];
    protected $with = [
    ];

    protected $dates = ['deleted_at'];

    public static $directory = '/products';

    public static function dir()
    {
        return self::$directory;
    }

    public function product()
    {
        return $this->belongsTo('App\Model\Product');
    }
   
   
}
