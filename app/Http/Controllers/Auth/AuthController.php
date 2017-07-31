<?php

namespace Colegio\Http\Controllers\Auth;

use Colegio\User;
use Validator;
use Colegio\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home'; //ver archivo routes.php

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
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
            'username' => 'required|max:8',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'role' => 'required|max:25',
            'status' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role' => $data['role'],
            'status' => $data['status'],
        ]);
    }

    public function showRegistrationForm()
    {
        return redirect('login'); //Para deshabilitar la opcion Registrar en la ventana de login
    }

    public function redirectPath()
    {
        if (auth()->user()->role == 'administrador') {
            return '/administrador';
        }
        else if (auth()->user()->role == 'alumno') {
            return '/alumno';
        }
        else if (auth()->user()->role == 'profesor') {
            return '/profesor';
        }
        else if (auth()->user()->role == 'padre') {
            return '/padre';
        }
    }
}
