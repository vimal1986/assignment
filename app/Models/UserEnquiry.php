<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Image;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class UserEnquiry extends Model
{
    use SoftDeletes;
    public $active;
    protected $table = 'user_enquiries';
    protected $fillable = ['email',
        'product_id',
        'rating'
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
   
    public static function getReview($product_id){

        $sum_rating = self::selectRaw('product_id, sum(rating) as sum')
        ->where('product_id', $product_id)
        ->groupBy('product_id')
        ->pluck('sum');

        $count_rating = self::selectRaw('product_id, count(rating) as sum')
        ->where('product_id', $product_id)
        ->groupBy('product_id')
        ->pluck('sum');
        
        return ['sum_rating'=>$sum_rating,'count_rating'=>$count_rating];

    }
   
}
