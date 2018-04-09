<?php

namespace App\Http\Controllers\Api\Version1;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Models\Product;
use App\User;
use App\Models\UserEnquiry;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $model = Product::getModel();
            $prices = Product::getPrice();
           // dd("dsf");
            $products=Product::getProductByImage();
            return response()->json(['status'=>true,
            'status_code'=>200,
            'data'=>[
               // 'model'=>$model,
               // 'price'=>$prices,
                'products'=>$products
            ]
            ]);
        }catch(\Exception $e){
            return response()->json(['status'=>false,
            'status_code'=>500,
            'message'=>"Server Error"
            ]);
        }
       
        
    }

    public function productDetail($product_id){  
        try{
            $productDetail = Product::getProductDetailAPI($product_id);
            $rating = UserEnquiry::getReview($product_id);
            //$model = Product::getModel();
            //$prices = Product::getPrice();
            return response()->json(['status'=>true,
            'status_code'=>200,
            'data'=>[
                //'model'=>$model,
                //'price'=>$prices,
                'rating'=>$rating['sum_rating'][0]?($rating['sum_rating'][0])/($rating['count_rating'][0]):0,
                'productDetail'=>$productDetail
            ]
            ]);
        }catch(\Exception $e){
            return response()->json(['status'=>false,
            'status_code'=>500,
            'message'=>"Server Error"
            ]);
        }      
        
       
    }

    

    public function createUser(Request $request){


        try{
            $rules = [
                'name' => 'required|max:150',
                'email' =>'required|email|unique:users,email',
                'password' => 'min:6',
                'password_confirmation' => 'required_with:password|same:password|min:6',
                'mobile'  => 'required|numeric',
                'address'  => 'sometimes|max:200'
            ];
    
            $validator=  Validator::make($request->all(),$rules);
    
            if ($validator->fails()) {
                return response()->json(['status'=>false,
                'status_code'=>200,
                'message'=> $validator->errors()->first()
                ]);
               
            }
            $result = User::updateOrCreate(
                [
                'id'   => $request->get('user_id',0),
                'name' => $request->get('name'),
                'email' =>$request->get('email'),
                'password' => bcrypt($request->get('password')),
                'mobile'  => $request->get('moblie'),
                'address'  =>$request->get('address')
                ]
            );
            if ($result) {
                return response()->json(['status'=>true,
                'status_code'=>200,
                'message'=> 'User created Successfully'
                ]);
                
            }
    
            return response()->json(['status'=>true,
            'status_code'=>200,
            'message'=> 'Not created'
            ]);
        }catch(\Exception $e){
            return response()->json(['status'=>false,
            'status_code'=>500,
            'message'=>"Server Error"
            ]);
        }      
        
    }

    public function siteSearch(Request $request){  
            
        try{
        $model = Product::getModel();
        $prices = Product::getPrice();
        $products=Product::getProductSearch($request);
            return response()->json(['status'=>true,
            'status_code'=>200,
            'data'=>[
                //'model'=>$model,
                //'price'=>$prices,
                'productDetail'=>$products
            ]
            ]);
        }catch(\Exception $e){
            return response()->json(['status'=>false,
            'status_code'=>500,
            'message'=>"Server Error"
            ]);
        }             
        
    }


    public function productEnquiry(Request $request){
        try{
            $rules = [
                'product_id' => 'required|numeric',
                'email' =>'required|email',
                'email' =>'sometimes|numeric'
            ];
    
            $validator=  Validator::make($request->all(),$rules);
    
            if ($validator->fails()) {
                return response()->json(['status'=>false,
                'status_code'=>200,
                'message'=> $validator->errors()->first()
                ]);
               
            }
            $result = UserEnquiry::updateOrCreate(
                [
                    'product_id' => $request->get('product_id'),
                    'email' =>$request->get('email')
                ]
            );
    
            if ($result) {
                return response()->json(['status'=>true,
                'status_code'=>200,
                'message'=> 'Sent Successfully'
                ]);
                
            }
    
            return response()->json(['status'=>false,
            'status_code'=>200,
            'message'=> 'Not Sent'
            ]);
        }catch(\Exception $e){
            return response()->json(['status'=>false,
            'status_code'=>500,
            'message'=>"Server Error"
            ]);
        }      
    } 


}
