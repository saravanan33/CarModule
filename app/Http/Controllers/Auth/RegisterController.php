<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    // public function __construct()
    // {
    //     $this->middleware('guest');
    // }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // dd('validate');
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'mobile'=>['required','numeric','min:6'],
            'mobile_code'=>['required'],
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
        // print_r($data);exit;
        // dd('create');
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'mobile_code'=> $data ['mobile_code'],
            'mobile'=>$data['mobile'],
            'is_admin'=>$data['is_admin'],
            'email_verified_at'=>now()      

        ]);
    }
    protected function admincreate(Request $datas)
    {   
       
        dd($datas);
        if(isset($datas)){
            $datas->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'mobile'=>['required','numeric','min:6'],
                'password_confirmation'=>['required', 'string', 'min:8', 'confirmed'],
            ]);
            $store=new User([
                'name' => $datas['name'],
                'email' => $datas['email'],
                'password' => Hash::make($datas['password']),
                'mobile_code'=> '91',
                'mobile'=>$datas['mobile'],
                'is_admin'=>$datas['is_admin'],
                   
    
            ]);
            $store->save();
        }
        return back()->with('success','register admin success');
        
    }
}
