<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Models\Product;
use App\User;
use App\Models\UserEnquiry;

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
        $model = Product::getModel();
        $prices = Product::getPrice();
        $products=Product::getProducts();
        return view('site.index',compact('products','prices','model'));
    }

    public function productDetail($product_id){        
        $productDetail = Product::getProductDetail($product_id);
        return view('site.product_detail',compact('productDetail'));
    }

    public function register(){
        return view('auth.register');
    }

    public function createUser(Request $request){
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
//            dd($validator);
            return redirect()->back()->withErrors($validator)->withInput();
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
            return redirect('login')
                ->with(['messages' => 'User created Successfully']);
        }

        return redirect()->back()->withErrors(['errors' => 'Not Created!'])->withInput();
    }

    public function siteSearch(Request $request){

        $model = Product::getModel();
        $prices = Product::getPrice();
        $products=Product::getProductSearch($request);
        return view('site.index',compact('products','prices','model'));

    }


    public function productEnquiry(Request $request){
        $rules = [
            'product_id' => 'required|numeric',
            'email' =>'required|email'
        ];

        $validator=  Validator::make($request->all(),$rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $result = UserEnquiry::updateOrCreate(
            [
                'product_id' => $request->get('product_id'),
                'email' =>$request->get('email')
            ]
        );

        if ($result) {
            return redirect('site')
                ->with(['messages' => 'Sent Successfully']);
        }

        return redirect()->back()->withErrors(['errors' => 'Not Created!'])->withInput();
    }


}
