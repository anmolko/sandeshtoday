<?php

namespace App\Http\Controllers;


use App\Models\Award;
use App\Models\Faq;
use App\Models\HomePage;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index()
    {
        $settings       = Setting::first();
        $homesettings   = HomePage::first();
        return view('backend.setting.index',compact('settings','homesettings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=[
            'website_name'                  => $request->input('website_name'),
            'website_description'           => $request->input('website_description'),
            'phone'                         => $request->input('phone'),
            'mobile'                        => $request->input('mobile'),
            'whatsapp'                      => $request->input('whatsapp'),
            'viber'                         => $request->input('viber'),
            'facebook'                      => $request->input('facebook'),
            'linkedin'                      => $request->input('linkedin'),
            'youtube'                       => $request->input('youtube'),
            'instagram'                     => $request->input('instagram'),
            'ticktock'                      => $request->input('ticktock'),
            'address'                       => $request->input('address'),
            'broadcasting_registration'     => $request->input('broadcasting_registration'),
            'company_registration'          => $request->input('company_registration'),
            'chairman'                      => $request->input('chairman'),
            'operator'                      => $request->input('operator'),
            'editor'                        => $request->input('editor'),
            'news_email'                    => $request->input('news_email'),
            'ad_email'                      => $request->input('ad_email'),
            'ad_number'                     => $request->input('ad_number'),
            'email'                         => $request->input('email'),
            'meta_title'                    => $request->input('meta_title'),
            'meta_tags'                     => $request->input('meta_tags'),
            'meta_description'              => $request->input('meta_description'),
            'google_analytics'              => $request->input('google_analytics'),
            'google_map'                    => $request->input('google_map'),
            'meta_pixel'                    => $request->input('meta_pixel'),
            'created_by'                    => Auth::user()->id,
        ];

        if (!empty($request->file('logo'))){
            $path    = base_path().'/public/images/settings/';
            $image   = $request->file('logo');
            $name1   = uniqid().'_main_logo_'.$image->getClientOriginalName();
            if ($image->move($path,$name1)){
                $data['logo']= $name1;
            }
        }

        if (!empty($request->file('logo_white'))){
            $path  = base_path().'/public/images/settings/';
            $image = $request->file('logo_white');
            $name2 = uniqid().'_white_logo_'.$image->getClientOriginalName();
            if ($image->move($path,$name2)){
                $data['logo_white'] = $name2;
            }

        }

        if (!empty($request->file('favicon'))){
            $path  = base_path().'/public/images/settings/';
            $image = $request->file('favicon');
            $name1 = uniqid().'_favicon_'.$image->getClientOriginalName();
            if ($image->move($path,$name1)){
                $data['favicon']= $name1;
            }
        }

        $theme = Setting::create($data);
        if($theme){
            Session::flash('success','Dashboard Settings Saved!');
        }
        else{
            Session::flash('error','Dashboard Settings could not be saved at the moment !');
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update_theme                               =  Setting::find($id);
        $update_theme->website_name                 =  $request->input('website_name');
        $update_theme->website_description          =  $request->input('website_description');
        $update_theme->phone                        =  $request->input('phone');
        $update_theme->mobile                       =  $request->input('mobile');
        $update_theme->whatsapp                     =  $request->input('whatsapp');
        $update_theme->viber                        =  $request->input('viber');
        $update_theme->facebook                     =  $request->input('facebook');
        $update_theme->linkedin                     =  $request->input('linkedin');
        $update_theme->youtube                      =  $request->input('youtube');
        $update_theme->instagram                    =  $request->input('instagram');
        $update_theme->ticktock                     =  $request->input('ticktock');
        $update_theme->address                      =  $request->input('address');
        $update_theme->email                        =  $request->input('email');
        $update_theme->broadcasting_registration    =  $request->input('broadcasting_registration');
        $update_theme->company_registration         =  $request->input('company_registration');
        $update_theme->chairman                     =  $request->input('chairman');
        $update_theme->operator                     =  $request->input('operator');
        $update_theme->editor                       =  $request->input('editor');
        $update_theme->news_email                   =  $request->input('news_email');
        $update_theme->ad_email                     =  $request->input('ad_email');
        $update_theme->ad_number                    =  $request->input('ad_number');
        $update_theme->meta_title                   =  $request->input('meta_title');
        $update_theme->meta_tags                    =  $request->input('meta_tags');
        $update_theme->meta_description             =  $request->input('meta_description');
        $update_theme->google_analytics             =  $request->input('google_analytics');
        $update_theme->google_map                   =  $request->input('google_map');
        $update_theme->meta_pixel                   =  $request->input('meta_pixel');
        $update_theme->updated_by                   =  Auth::user()->id;
        $oldimage_logo                              = $update_theme->logo;
        $oldimage_logo_white                        = $update_theme->logo_white;
        $oldimage_favicon                           = $update_theme->favicon;

        if (!empty($request->file('logo'))){
            $path  = base_path().'/public/images/settings/';
            $image = $request->file('logo');
            $name1 = uniqid().'_main_logo_'.$image->getClientOriginalName();
            if ($image->move($path,$name1)){
                $update_theme->logo= $name1;
                if (!empty($oldimage_logo) && file_exists(public_path().'/images/settings/'.$oldimage_logo)){
                    @unlink(public_path().'/images/settings/'.$oldimage_logo);
                }
            }

        }

        if (!empty($request->file('logo_white'))){
            $path = base_path().'/public/images/settings/';
            $image =$request->file('logo_white');
            $name1 = uniqid().'_white_logo_'.$image->getClientOriginalName();
            if ($image->move($path,$name1)){
                $update_theme->logo_white= $name1;
                if (!empty($oldimage_logo_white) && file_exists(public_path().'/images/settings/'.$oldimage_logo_white)){
                    @unlink(public_path().'/images/settings/'.$oldimage_logo_white);
                }
            }

        }

        if (!empty($request->file('favicon'))){
            $path = base_path().'/public/images/settings/';
            $image =$request->file('favicon');
            $name1 = uniqid().'_favicon_'.$image->getClientOriginalName();
            if ($image->move($path,$name1)){
                $update_theme->favicon= $name1;
                if (!empty($oldimage_favicon) && file_exists(public_path().'/images/settings/'.$oldimage_favicon)){
                    @unlink(public_path().'/images/settings/'.$oldimage_favicon);
                }
            }

        }

        $status=$update_theme->update();

        if($status){
            Session::flash('success','Settings Updated Successfully');
        }
        else{
            Session::flash('error','Something Went Wrong. Settings could not be Updated');
        }
        return redirect()->back();
    }




    public function imageupdate(Request $request, $id)
    {
        $update_theme                           =  Setting::find($id);
        $oldimage_logo                          = $update_theme->logo;
        $oldimage_logo_white                    = $update_theme->logo_white;
        $oldimage_favicon                       = $update_theme->favicon;

        if (!empty($request->file('logo'))){
            $path = base_path().'/public/images/uploads/settings';
            $image =$request->file('logo');
            $name1 = uniqid().'_'.$image->getClientOriginalName();
            if ($image->move($path,$name1)){
                $update_theme->logo= $name1;
                if (!empty($oldimage_logo) && file_exists(public_path().'/images/uploads/settings/'.$oldimage_logo)){
                    @unlink(public_path().'/images/uploads/settings/'.$oldimage_logo);
                }
            }

        }

        if (!empty($request->file('logo_white'))){
            $path = base_path().'/public/images/uploads/settings/';
            $image =$request->file('logo_white');
            $name1 = uniqid().'_'.$image->getClientOriginalName();
            if ($image->move($path,$name1)){
                $update_theme->logo_white= $name1;
                if (!empty($oldimage_logo_white) && file_exists(public_path().'/images/uploads/settings/'.$oldimage_logo_white)){
                    @unlink(public_path().'/images/uploads/settings/'.$oldimage_logo_white);
                }
            }

        }

        if (!empty($request->file('favicon'))){
            $path = base_path().'/public/images/uploads/settings/';
            $image =$request->file('favicon');
            $name1 = uniqid().'_'.$image->getClientOriginalName();
            if ($image->move($path,$name1)){
                $update_theme->favicon= $name1;
                if (!empty($oldimage_favicon) && file_exists(public_path().'/images/uploads/settings/'.$oldimage_favicon)){
                    @unlink(public_path().'/images/uploads/settings/'.$oldimage_favicon);
                }
            }

        }
        $status=$update_theme->update();

        if($status){
            Session::flash('success','Your Logo Images is Updated Successfully');
        }
        else{
            Session::flash('error','Something Went Wrong. Your Logo Images could not be Updated');
        }
        return redirect()->back();
    }


    public function themeMode(Request $request)
    {
        $id                  = $request->input('setting_id');
        $theme               = Setting::find($id);
        $theme->theme_mode   = $request->input('mode');
        $status              = $theme->update();
        return response()->json(['status'=>'success','mode'=>$theme->theme_mode]);

    }

    public function privacyPolicy(Request $request, $id)
    {
        $privacy                    = Setting::find($id);
        $privacy->privacy_policy    = $request->input('privacy_policy');
        $status                     = $privacy->update();
        if($status){
            Session::flash('success','Privacy Policy has been updated successfully');
        }
        else{
            Session::flash('error','Something Went Wrong. Privacy Policy could not be updated');
        }
        return redirect()->back();
    }

    public function termsConditions(Request $request, $id)
    {
        $privacy                      = Setting::find($id);
        $privacy->terms_conditions    = $request->input('terms_conditions');
        $status                       = $privacy->update();
        if($status){
            Session::flash('success','Terms and Conditions has been updated successfully');
        }
        else{
            Session::flash('error','Something Went Wrong. Terms and Conditions could not be updated');
        }
        return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
