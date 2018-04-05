<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Banner;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class BannerController extends Controller
{
    public function index(){
        $banner = Banner::getBannerList();
        return view('SA.banner.index',compact('banner'));
    }
    public function add(){
        $is_edit = false;
        return view('SA.banner.add',compact('is_edit'));
    }

    public function view($id){
        $view = true;
        $bannerDetails = Banner::getBannerDetails($id);
        $banner = Banner::getBannerList();
        return view('SA.banner.index',compact('banner','view','bannerDetails'));
    }
    public function edit($id){
        $is_edit = true;
        $banner = Banner::where([['id','=',$id]])->first();
        return view('SA.banner.add',compact('is_edit','banner'));

    }

    public function update(Request $request)
    {
        $rules = Banner::getUpdateRules();

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $result = Banner::createOrUpdateBanner($request);
        if($result){
            return redirect(config('eta.adminRoute').'/banner')->with(['messages'=>'Banner Updated Successfully']);
        }

        return redirect()->back()->withErrors(['errors'=>'Unable to Update Banner'])->withInput();
    }

    public function delete($id){
        $result = Banner::deleteById($id);
        if ($result) {
            return redirect(config('eta.adminRoute') . '/banner')
                ->with(['messages' => 'Banner Deleted']);
        }

        return redirect(config('eta.adminRoute') . '/banner')
            ->with(['messages' => 'Something went wrong!']);
    }

    public function creates(Request $request){
        $rules = Banner::getRules();

        $validator=  Validator::make($request->all(),$rules);

        if ($validator->fails()) {
//            dd($validator);
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $result = Banner::createOrUpdateBanner($request);
        if ($result) {
            return redirect(config('eta.adminRoute') . '/banner')
                ->with(['messages' => 'Banner created Successfully']);
        }

        return redirect()->back()->withErrors(['errors' => 'Not Created!'])->withInput();
    }

    public function getBanners(Request $request)
    {
        $result = Banner::getBannerList();
        if ($result) {
            return response()->json(['status' => true, 'banners' => $result]);
        }

        return response()->json(['status' => false, 'message' => 'Something went wrong!']);
    }
}
