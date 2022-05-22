<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;


    public $email;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->middleware('web');
    }

    public function customLogin(Request $request)
    {
        $email=$request->email;
        if (Auth::attempt(['email' => $email, 'password' => $request->password])) {
            return redirect()->intended('home')
                ->withSuccess('You are successfully signed in');
        } else {
            return back()->with('error','Login details are not valid')->with('email', $email);
        }
    }
    public function index(Request $request){

               $this->email=$request->email;
        return view('auth.password', ['email'=>$request->email]);
    }

}
