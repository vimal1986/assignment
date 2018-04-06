<?php

namespace App\Http\Controllers;

use App\Models\Regions;
use App\Models\ServiceRequest;
use App\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use function PHPSTORM_META\type;

class AdminController extends Controller
{
//
//    public function forgotPassword(){
//        // TODO : Change from Hardcoded to Relationship based
//        $admin  = User::find(1);
//
//        // Getting Values from table
//
//        $username = $admin->name;
//        $password = Crypt::encryptString('admin123');
//        dd($password);
//    }

    public function show($filter_status = null)
    {

        $serviceRequest = new ServiceRequest();
        $serviceRequest->init();
        $status = $serviceRequest->getModelObject();
        $requests = $serviceRequest->queryRequestByStatus($filter_status);


        // Get Regions
        $regions = new Regions();
        $active_region = $regions->getActiveRegions();


        // Get statuses Enum
        $statuses = ServiceRequest::getStatuses();

        return view('index', [
            'statuses' => $statuses,
            'regions' => $active_region,
            'requests' => $requests,
            'active_count' => count($status->services_active),
            'open_count' => count($status->open),
            'closed_count' => count($status->closed),
            'in_progress_count' => count($status->inProgress),
            'current_status' => $filter_status
        ]);
    }

    public function updateStatus()
    {

        $res = [];
        $res['success'] = false;

        // Get ID and Status
        $id = Input::get('service_request_id');
        $val = Input::get('status');


        // Update Service Status
        $service_request = ServiceRequest::find($id);
        if ($service_request) {
//
            $prev_val = ServiceRequest::clean($service_request->status);
            $curr_val = ServiceRequest::clean($val);


            if (!($prev_val === 'inprogress' && $curr_val === "open")
                && $prev_val !== $curr_val
                && $prev_val !== 'closed'
            ) {
                $service_request->status = $val;
                $res['success'] = $service_request->save();
            }
        }

        // Update function to static queries
        $res["counts"] = (new ServiceRequest())->getRequestsCountByStatus();

        return response()->json($res);
    }
}
