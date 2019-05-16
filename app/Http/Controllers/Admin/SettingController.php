<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Setting;
use Artisan; 
use Lang;

class SettingController extends Controller
{
    function general(){
        return view('admin.setting.general.index');
    }

    public function index()
    {
        return view('admin.setting.system.sample');
    }

    public function store(Request $request)
    {
        $rules = Setting::getValidationRules($request->file);
        $data = $this->validate($request, $rules);

        $validSettings = array_keys($rules);

        foreach ($request->all() as $key => $val) {
            if (in_array($key, $validSettings)) {
                Setting::add($key, $val, Setting::getDataType($key));
            }
        }

        return redirect()->back()->with('status', Lang::get('label.saved'));
    }


     function notification()
    {
        return view('admin.setting.notification.index');
    }

    function video()
    {
    	return view('admin.setting.video.index');
    }

    function system()
    {
        return view('admin.setting.system.index');
    }

    function payment()
    {
        return view('admin.setting.payment.index');
    }


    function queuing()
    {
        return view('admin.setting.queuing.index');
    }

    function queuingstart(){
        return Artisan::call('queue:work', []);
    }
   
}
