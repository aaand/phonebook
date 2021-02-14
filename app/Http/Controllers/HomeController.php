<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct(Request $request)
//    {
//        /*print_r($request->user());
//        die();*/
//        //dd(Auth::user());
//        /*dd(Auth::guard('web')->user());
//        $this->middleware('auth');*/
//    }/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //dd(Auth::user());
        return view('home');
    }
}
