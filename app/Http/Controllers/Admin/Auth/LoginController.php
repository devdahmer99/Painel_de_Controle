<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
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
    protected string $redirectTo = '/painel';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index(): Factory|View|Application
    {
       return view('admin.login');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $data = $request->only([
           'email',
           'password'
        ]);
        $validate = $this->validator($data);
        $remember = $request->input('remember', false);
        if ($validate->fails()) {
            return redirect()->route('admin.login')->withErrors($validate)->withInput();
        }
        if(Auth::attempt($data, $remember)) {
            return redirect()->route('admin');
        } else {
            $validate->errors()->add('password', 'E-mail e/ou Senha Inválidos');
            return redirect()->route('admin.login')->withErrors($validate)->withInput();
        }
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }

    protected function validator(array $data): \Illuminate\Contracts\Validation\Validator
    {
        return Validator::make($data,[
            'email' => ['required', 'string', 'email', 'max:100'],
            'password' => ['required', 'string', 'min:8']
        ]);
    }
}
