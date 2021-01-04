<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
    protected $redirectTo = '/admin/login';
    private $loginPath = '/admin/login';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('backend.auth.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);
        $admin = Admin::where('email', $request->email)->first();
        if (!$admin) {
            return view('backend.auth.login')->with('error_email','Email không tồn tại');
        }

        if (
            Hash::check($request->password, $admin->password) &&
            Auth::guard('admin')->attempt($request->only(['email','password']),$request->filled('remember'))
        ) {
            return redirect()->intended('/admin/home');
        }

        return view('backend.auth.login')
            ->with('error_check','Tài khoản mật khẩu không đúng');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect($this->loginPath);
    }
}
