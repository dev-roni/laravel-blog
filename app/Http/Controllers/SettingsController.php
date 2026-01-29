<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class SettingsController extends Controller
{
    public function settings(){
        
        $settings_data=Setting::first();
        if(!$settings_data){
            $settings_data = new Setting();

        }
        return view('admin.settings',compact('settings_data'),['title' => 'settings']);
    }
    
    public function updateTitle(Request $request, $title_id){
        
        $settings_data =  Setting::find($title_id);
        $settings_data->site_title = $request->site_title;
        $settings_data->update();
        return redirect()->back()->with('success', 'title update successfully');
        
    }

    public function updateslug(Request $request, $slug_id){
        $settings_data =  Setting::find($slug_id);
        $settings_data->site_slug = $request->site_slug;
        if ($settings_data->update()) {
            return redirect()->back()->with('success', 'slug update successfully');
        } 
    }
    public function updatedescription(Request $request, $description_id){
        $settings_data =  Setting::find($description_id);
        $settings_data->site_description = $request->site_description;
        if ($settings_data->update()) {
            return redirect()->back()->with('success', 'description update successfully');
        } 
    }
    public function updateLogo(Request $request, $logo_id){
        $settings_data =  Setting::find($logo_id);
        $settings_data->site_logo_url = $request->site_logo;
        if ($settings_data->update()) {
            return redirect()->route('settings',$logo_id)->with('success', 'logo update successfully');
        } 
    }
    public function updateFavicon(Request $request, $fav_id){
        $settings_data =  Setting::find($fav_id);
        $settings_data->favicon_url = $request->site_favicon;
        if ($settings_data->update()) {
            return redirect()->route('settings',$fav_id)->with('success', 'favicon update successfully');
        } 
    }
    public function updatemedia(Request $request, $media_id){
        $settings_data =  Setting::find($media_id);
        $settings_data->facebook_url = $request->facebook_url;
        $settings_data->x_url = $request->x_url;
        $settings_data->insta_url = $request->insta_url;
        $settings_data->linkedin_url = $request->linkedin_url;
        $settings_data->youtube_url = $request->youtube_url;
        if ($settings_data->update()) {
            return redirect()->back()->with('success', 'social media url update successfully');
        } 
    }
}