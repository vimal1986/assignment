<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class ProductController extends Controller
{
    public function index(){        
        $product = Product::getProductList();
        //dd($product);
        return view('SA.product.index',compact('product'));
    }
    public function add(){
        $is_edit = false;
        return view('SA.product.add',compact('is_edit'));
    }

    public function create(Request $request){
        $rules = Product::getRules();

        $validator=  Validator::make($request->all(),$rules);

        if ($validator->fails()) {
//            dd($validator);
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $result = Product::createOrUpdateProduct($request);
        if ($result) {
            return redirect('admin/')
                ->with(['messages' => 'Product created Successfully']);
        }

        return redirect()->back()->withErrors(['errors' => 'Not Created!'])->withInput();
    }

    public function view($id){
        $view = true;
        $productDetail = Product::getProductDetail($id);
        $product = Product::getProductList();
        return view('SA.product.index',compact('product','view','productDetail'));
    }
    public function edit($id){
        $is_edit = true;
        $product = Product::where([['id','=',$id]])->first();
        return view('SA.product.add',compact('is_edit','product'));

    }

    

    public function delete($id){
        $result = Product::deleteById($id);
        if ($result) {
            return redirect('/admin')
                ->with(['messages' => 'Banner Deleted']);
        }

        return redirect('admin/')
            ->with(['messages' => 'Something went wrong!']);
    }

    

  
}
