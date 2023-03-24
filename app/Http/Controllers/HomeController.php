<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

     public function adminHome(Request $request)
    {
        $pagination_limit=$request->pagination_limit ?? config('constant.PAGINATION_LIMIT');
        $users = User::select('name','email','referral_code','points')
                       ->where('role_id','!=',config('constant.ROLES.Admin'))
                       ->orderby('points','Desc')
                       ->paginate($pagination_limit);
        return view('adminhome', compact('users'));
    }

}
