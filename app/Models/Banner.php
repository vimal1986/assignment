<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Image;

class Banner extends Model
{
    use SoftDeletes;
    public $active;
    protected $table = 'banners';
    protected $fillable = ['title',
        'image_path',
        'is_active'
    ];
    protected $with = [
    ];

    protected $dates = ['deleted_at'];

    public static $directory = '/banner';

    public static function dir()
    {
        return self::$directory;
    }

    public static function getRules()
    {
        $rules = [
            'title' => 'required|max:150',
            'image' => 'required',
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

    public static function getBannerList(){
        $result = \DB::select(" SELECT * , 
          CONCAT('". env('APP_URL') ."'  , image_path) as full_image_path
          FROM banners WHERE is_active=1");

        return $result;
    }

    public static function getBannerDetails($id){

        $blogDetails = self::where('is_active' , '=' , 1)
            ->where('id' , '=' , $id)
            ->first();

        $result =[];
        if($blogDetails){
            $result []=[
                'id'=>$blogDetails->id,
                'title'=>$blogDetails->title,
                'short_description'=>$blogDetails->short_description,
                'description'=>$blogDetails->description,
                'image_path'=>asset($blogDetails->image_path),
            ];
        }

        return $result[0];

    }

    public static function deleteById($id){
        $update = self::where('id',$id)->update(['is_active'=>0]);
        if($update) return true;
        else return false;
    }

    public static function createOrUpdateBanner(Request $request)
    {
        $res = [];
        $attributes = [
            'id'=>$request->get('banner_id',0),
            'title' => $request->get('title'),
            'is_active'=> 1
        ];
        /** Upload File and Get Path */
        $file_thumb = Input::file('image');
        if (!empty($file_thumb)) {
            $img = Image::make($file_thumb);
            $img->resize(1600, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $file_name = uniqid('img_thumb_') . '.' . $file_thumb->getClientOriginalExtension();
            $file_path = 'uploads' . self::dir();
            $attributes['image_path'] = $file_path . '/' . $file_name;
            $img->save(public_path($file_path . '/' . $file_name));


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
}
