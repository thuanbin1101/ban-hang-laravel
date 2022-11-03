<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use function Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    // Authentication Admin
    public function login()
    {
        return view('auth.login');
    }

    public function handleLogin(Request $request)
    {
        $data = $request->all();
        $dataAttemptAdmin = [
            'email' => $data['email'],
            'password' => $data['password'],
            'level' => ['Admin', 'Staff'],
        ];
        if (Auth::attempt($dataAttemptAdmin)) {
            return redirect()->route('home');
        }
        return redirect()->route('login')->with(['error' => 'Email hoặc mật khẩu không chính xác']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function handleRegister(Request $request)
    {
        $rules = [
            'email' => 'required|unique:users,email|email',
            'name' => 'required',
            'password' => 'min:1|confirmed',
        ];
        $customMessages = [
            'required' => 'Vui lòng điền đầy đủ thông tin.',
            'min' => 'Mật khẩu tối thiểu 8 ký tự cả chữ và số !',
            'email.unique' => 'Email đã tồn tại',
            'email.email' => 'Email không đúng định dạng, vui lòng kiểm tra lại',
            'password.confirmed' => 'Xác nhận mật khẩu không khớp.'
        ];
        $validator = Validator::make($request->all(), $rules, $customMessages);
        if ($validator->fails()) {
            $messages = $validator->messages();
            $errors = $messages->all();
            return \redirect()->back()->withErrors(['errors' => $errors]);
        } else {
            $customer = new User([
                'email' => $request->get('email'),
                'password' => $request->get('password'),
                'name' => $request->get('name'),
                'level' => 'Staff',
            ]);
            $customer->save();
        }
        return \redirect()->route('login')->with(['success' => 'Đăng ký thành công']);
    }

    // Authentication Customer
    public function loginClient()
    {
        return view('client.auth.login');
    }

    public function handleLoginClient(Request $request)
    {
        try {
            $data = $request->all();
            $dataAttemptClient = [
                'email' => $data['email'],
                'password' => $data['password'],
                'level' => ['Customer', 'Admin', 'Staff'],
            ];
            if (Auth::attempt($dataAttemptClient)) {
                return redirect()->route('client.home');
            }
            return redirect()->route('client.login')->with(['error' => 'Tài khoản hoặc mật khẩu không chính xác']);
        } catch (\Exception $exception) {
            return back()->with(['error' => $exception->getMessage()]);
        }
    }

    public function logoutClient()
    {
        Auth::logout();
        return redirect()->route('client.home');
    }

    public function registerCLient()
    {
        return view('client.auth.register');
    }

    public function handleRegisterClient(Request $request)
    {
        $rules = [
            'email' => 'required|unique:users,email|email',
            'name' => 'required',
            'password' => 'min:1',
        ];
        $customMessages = [
            'required' => 'Vui lòng điền đầy đủ thông tin.',
            'min' => 'Mật khẩu tối thiểu 8 ký tự cả chữ và số !',
            'email.unique' => 'Email đã tồn tại',
            'email.email' => 'Email không đúng định dạng, vui lòng kiểm tra lại'
        ];
        $validator = Validator::make($request->all(), $rules, $customMessages);
        if ($validator->fails()) {
            $messages = $validator->messages();
            $errors = $messages->all();
            return \redirect()->back()->withErrors(['errors' => $errors]);
        } else {
            $customer = new User([
                'email' => $request->get('email'),
                'password' => $request->get('password'),
                'name' => $request->get('name'),
                'level' => 'Customer',
            ]);
            $customer->save();
        }
        return \redirect()->route('client.login')->with(['success' => 'Đăng ký thành công']);
    }


}
