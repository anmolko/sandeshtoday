<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Exception;

class SocialLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function dashboard()
    {
        $user_id = Auth::user()->id;
        $user    = User::with('comments.replies','likes')->find($user_id);
//        dd($user->toArray());
        return view('frontend.pages.user.dashboard',compact('user'));
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
        //
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
        //
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

    public function handleGoogleRedirect()
    {
        Session::put('url.intended', url()->previous());
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user           = Socialite::driver('google')->user();
            //if the user already has a profile with same email as facebook, it will use the same credentials here
            $facebook       = User::where('email',$user->getEmail())->where('oauth_type','facebook')->first();
            if($facebook){
                Auth::login($facebook);
                Session::flash('success','You are logged in as news '.Auth::user()->user_type.' You can add comments to posts now!');
                return redirect()->intended();
            }

            $userExisted    = User::where('oauth_id',$user->id)->where('oauth_type','google')->first();
            if($userExisted){
                Auth::login($userExisted);
//                return redirect()->intended('/user-dashboard');
                Session::flash('success','You are logged in as news '.Auth::user()->user_type.' You can add comments to posts now!');

                return redirect()->intended();
            }else{
                $password = $user->getId().$user->getEmail();
                $newuser = User::create([
                    'name'          => $user->getName(),
                    'slug'          => str_replace(' ','-',$user->getName()),
                    'address'       => str_replace(' ','-',$user->getName()),
                    'email'         => $user->getEmail(),
                    'image'         => $user->getAvatar(),
                    'oauth_id'      => $user->getId(),
                    'oauth_type'    => 'google',
                    'user_type'     => 'viewer',
                    'status'        =>1,
                    'password'=>Hash::make($password),
                ]);
                Auth::login($newuser);
                Session::flash('success','You are logged in as news '.Auth::user()->user_type.' You can add comments to posts now!');
                return redirect()->intended();
            }

        }catch (Exception $exc){
            dd($exc);
        }
    }

    public function handleFacebookRedirect()
    {
        Session::put('url.intended', url()->previous());
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {

        try {
            $user           = Socialite::driver('facebook')->user();
            //if the user already has a profile with same email as google, it will use the same credentials here
            $google         = User::where('email',$user->getEmail())->where('oauth_type','google')->first();
            if($google){
                Auth::login($google);
                return redirect()->intended();
            }

            $userExisted    = User::where('oauth_id',$user->id)->where('oauth_type','facebook')->first();
            if($userExisted){
                $usersRole = $userExisted->user_type;
                if($usersRole !== 'viewer'){
                    Session::flash('warning','You cannot login as '.Auth::user()->user_type.' Please create an account first.');
                    return back();
                }
                Auth::login($userExisted);
                Session::flash('success','You are now logged as '.Auth::user()->user_type.' You can add comments to posts now!');

                return redirect()->intended();
            }else{
                $password = $user->getId().$user->getEmail();

                $newuser = User::create([
                    'name'          => $user->getName(),
                    'slug'          => str_replace(' ','-',$user->getName()),
                    'address'       => str_replace(' ','-',$user->getName()),
                    'email'         => $user->getEmail(),
                    'image'         => $user->getAvatar(),
                    'oauth_id'      => $user->getId(),
                    'oauth_type'    => 'facebook',
                    'user_type'     => 'viewer',
                    'status'=>1,
                    'password'=>Hash::make($password),
                ]);
                Auth::login($newuser);
                Session::flash('success','You are now logged in as '.Auth::user()->user_type.' You can add comments to posts now!');
                return redirect()->intended();
            }

        }catch (Exception $exc){
            dd($exc);
        }
    }

}
