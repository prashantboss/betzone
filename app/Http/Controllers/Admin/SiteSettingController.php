<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteSetting;

class SiteSettingController extends Controller
{
    public function editSiteSetting()
    {
        $id = 1272;
        $siteSetting = SiteSetting::findOrFail($id);
        return view('vendor.multiauth.admin.site_setting.edit')
                            ->with('siteSetting', $siteSetting)
                            ->with('title', "Edit Site Setting");
    }

    public function updatesiteSetting(){
        
    }
}
