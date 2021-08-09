<?php

namespace App\Http\Controllers\Admin;

use App\Models\Settings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:admin.settings.index',['only' => ['index','store']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard.settings');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  public function store(Request $request ,Settings $setting)
    {

        $rules = 
        [
            'name'             => 'nullable|string', 
            'logo'             => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'icon'             => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
        ];

        $names = 
        [
            'name'             =>'Name', 
            'logo'             =>'Logo',
            'icon'             =>'Icon', 
        ];

           $this->validate(request(),$rules , [] ,$names);

           $setting->put('name' , request('name'));



           if(request('phone') != null)
           {
                $setting->put('phone' , request('phone'));
           }

            if(request('logo') != null)
            {

                if(settings('logo') != null)
                {
                    File::delete(settings('logo')); // delete previous image from folder   
                }

                $setting->put('logo' , storeImage($request ,'logo' , 'storage/app/settings_photos/', Str::random(30), 'settings'));
            }


            if(request('icon') != null)
            {
                if(settings('icon') != null)
                {
                    File::delete(settings('icon')); // delete previous image from folder   
                }

                $setting->put('icon' , storeImage($request ,'icon' , 'storage/app/settings_photos/', Str::random(30), 'settings'));

            }

            Session::flash('success','Site Settings has been updated');
            return back();
            
    }

    
}
