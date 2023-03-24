<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'referral_code' =>['nullable','exists:users,referral_code']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        $referral_code = $data['referral_code'];
        $referral_id = null;
        $referrer = null;
        if(isset($referral_code) && !empty($referral_code)){

            $referral_id = User::where('referral_code',$referral_code)->value('id');
            $referrer = $referral_id;

            /*********************reward_points*******************************/
              $points=10;
              for($i=0;$i<=10;$i++){
                if(isset($referral_id) && !empty($referral_id)){

                    $current_points = User::where('id',$referral_id)->value('points');
                    $new_reward = $current_points + $points;
                    $rewards = User::where('id',$referral_id)->update(['points'=>$new_reward]);
                    $points = $points-1;



                }
                 $refered_id = User::where('id',$referral_id)->value('referral_id');
                 
                 if(isset($refered_id) && !empty($refered_id)){
                    $referral_id = User::where('id',$refered_id)->value('id');
                 }
                 else{
                    $referral_id = null;
                 }
                 
              }

            /******************************************************************/
        }
      
        $new_referral_code = $this->random_code(5);

        if(!isset($new_referral_code)){
           return redirect('login')->with('error','Something went wrong');
        }
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'referral_id' => $referrer,
            'referral_code' => $new_referral_code,
            'password' => Hash::make($data['password']),
        ]);
    }

public function random_code($limit)
{
    $code =  substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $limit);
    if(isset($code) && !empty($code)){
        return $code;
    }
   return $this->random_code(5);

}

}
