<?php

namespace App\Http\Controllers\Auth\Student;

use App\User;
use App\Http\Controllers\Controller;
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


    public function showRegistrationForm()
    {
        return view(theme('auth.register'));
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
            'username' => 'required|string|max:25|unique:users',
            'name' => 'required|string|max:255',
            'email' => 'unique:users',
            'korean_name' => 'required', 
            'contact_number' => 'required',
            'dob' => 'required|date',
            'gender' => 'required',
            'password' => 'required|string|min:6|confirmed',
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
       return User::create([
            'username' => $data['username'],
            'name' => $data['name'],
            'korean_name' => $data['korean_name'],
            'contact_number' => $data['contact_number'],
            'contact_number1' => $data['contact_number1'],
            'dob' => $data['dob'],
            'gender' => $data['gender'],
            'is_leveltest' => $data['leveltest'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
       
    }
}