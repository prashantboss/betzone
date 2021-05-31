<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteSetting;
use Artisan;

class SiteSettingController extends Controller
{
    public function editSiteSetting()
    {
        $id = 1;
        $siteSetting = SiteSetting::findOrFail($id);
        return view('vendor.multiauth.admin.site_setting.edit')
                            ->with('siteSetting', $siteSetting)
                            ->with('title', "Edit Site Setting");
    }

    public function updatesiteSetting(){
        
    }

    public function artisan_down(){
        Artisan::call('down');
        dd('Your website down successfully');
    }

    public function artisan_up(){
        Artisan::call('up');
        dd('Your website up successfully');
    }
}
