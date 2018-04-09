<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Image;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{
    use SoftDeletes;
    public $active;
    protected $table = 'products';
    protected $fillable = ['user_id',
        'title',
        'year',
        'make',
        'model',
        'description',
        'price',
        'other_information',
        'image_path',
        'type',
        'is_active'
    ];
    protected $with = [
    ];

    protected $dates = ['deleted_at'];

    public static $directory = '/products';

    public static function dir()
    {
        return self::$directory;
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
   
    public function user_enquiries()
    {
        return $this->hasMany('App\Model\UserEnquiry');
    }
    public static function getRules()
    {
        $rules = [
            'title' => 'required|max:150',
            'year' =>'required|numeric|digits_between:1,5',
            'make'  => 'required|max:150',
            'model'  => 'required|max:150',
            'description'  => 'required|max:150',
            'price'  => 'required|numeric|digits_between:1,10',
            'other_information' => 'required|max:150',
            'image_path' => 'sometimes|mimes:jpeg,jpg,png,gif|max:10000',
            'type'=> 'required',
            'is_active'
        ];

        return $rules;
    }
    public static function getUpdateRules()
    {
        $rules = [
            'title' => 'required|max:150',
            'image' => 'required',
        ];

        return $rules;
    }   

    public static function createOrUpdateProduct(Request $request)
    {
        $res = [];
        $attributes = [
            'id'=>$request->get('product_id',0),
            'user_id'=>Auth::user()->id,
            'title'=>$request->get('title',''),
            'year'=>$request->get('year',0),
            'make'=>$request->get('make',''),
            'model'=>$request->get('model',''),
            'description'=>trim($request->get('description','')),
            'type'=>$request->get('type',''),
            'price'=>$request->get('price',0),
            'other_information'=>$request->get('other_information',''),
            'is_active'=>1
        ];
        /** Upload File and Get Path */
        $file_thumb = Input::file('image');
        if (!empty($file_thumb)) {
            // $img = Image::make($file_thumb);
            // $img->resize(1600, null, function ($constraint) {
            //     $constraint->aspectRatio();
            // });

            $file_name = uniqid('img_thumb_') . '.' . $file_thumb->getClientOriginalExtension();
            $file_path = 'uploads' . self::dir();
            $attributes['image_path'] = $file_path . '/' . $file_name;
            // $img->save(public_path($file_path . '/' . $file_name));

            $path = $file_thumb->move(
                               public_path($file_path),
                               $file_name
                           );


            if (empty($attributes['image_path'])) {
                unset($attributes['image_path']);
            }
        }

//        /** Upload File and Get Path */
//        $file_thumb = Input::file('image');
//        if (!empty($file_thumb)) {
//            $file_name = uniqid('img_thumb_') . '.' . $file_thumb->getClientOriginalExtension();
//            $file_path = 'uploads' . self::dir();
//
//            $path = $file_thumb->move(
//                public_path($file_path),
//                $file_name
//            );
//
//            $attributes['image_path'] = $file_path . '/' . $file_name;
//
//            if (empty($attributes['image_path'])) {
//                unset($attributes['image_path']);
//            }
//        }



        $res = self::updateOrCreate(
            ['id' => $attributes['id']],
            $attributes
        );



        return ($res->id ?? false) ? true : false;
    }

    public static function getProductList(){
        $user_id = Auth::user()->id;       
        $result = self::where('user_id',$user_id)->where('is_active',1)->get();
        return $result;
    }

    public static function getProductDetail($id){
        $result = self::where('id',$id)->first();
        return $result;
    }

    public static function deleteById($id){
        $result = self::where('id',$id)->update(['is_active'=>0]);
        return $result;
    }

    public static function getProducts(){
        $result = self::where('is_active',1);
        return $result->get()->toArray();
    }

    public static function getModel(){
        $data = self::select('model')->distinct()->where('is_active',1)->get();
        return $data;
    }

    public static function getPrice(){
        $data = self::select('price')->distinct()
        ->where('is_active',1)
        ->orderBy('price','asc')
        ->get();
        return $data;
    }

    public static function getProductSearch(Request $request){
        $result = self::where('is_active',1);
        if($request->get('model')) $result->where('model',trim($request->get('model')));
        if($request->get('type')) $result->where('type',trim($request->get('type')));
        if($request->get('price')) $result->where('price',trim($request->get('price')));
        return $result->get()->toArray();
    }
}
