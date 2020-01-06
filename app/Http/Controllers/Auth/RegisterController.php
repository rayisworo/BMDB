<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
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
    protected $redirectTo = '/';

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
            'fullname' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'image' => ['required'],
            'gender' => ['required'],
            'address' => ['required'],
            'dob ' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        try {
            $user =  User::create([
                'fullname' => $data['fullname'],
                'role' => 'member',
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'gender' => $data['gender'],
                'address' => $data['address'],
                'dob' => $data['dob'],
            ]);
    
            $extension = $data['image']->file('profile_picture')->getClientOriginalExtension();
            $file_name = $user->fullname.$user->user_id . '.' . $extension;
            $data['image']->file('profilePicture')->move('img/profile/', $file_name);
            $user->profile_picture = $file_name;
            $user->save();
            return $user;
            //code...
        } catch (Exception $e) {
            //throw $th;
            report($e);
            return false;
        }
    }
}
