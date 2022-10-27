<?php

namespace App\Http\Controllers\Client\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);


//        $remember_me = $request->has('remember_me') ? true : false;
//        if (Auth::attempt($credentials)) {
//            if (\auth()->user()->level === 0) {
//                $request->session()->regenerate();
//                return redirect()->intended('/');
//            } else {
//                Session::flash('error', 'Ban k dang nhap dc');
//            }
//        }
        $check = User::query()->where([
            'email' => $credentials['email'],
            'level' => 0
        ])->exists();

        if (!$check) {
            return redirect()->intended('client/login');
        }
        $dataAttemptClient = [
            'email' => $credentials['email'],
            'password' => $credentials['password'],
            'level' => 0
        ];
        if (Auth::attempt($dataAttemptClient)) {
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Email hoặc Password không tìm thấy',
        ])->onlyInput('email');
    }

    public function store(Request $request)
    {
        try {
            $credentials = $request->validate([
                'name' => ['required', 'min:3'],
                'email' => ['required', 'email'],
                'password' => ['required'],

            ]);
            $user = User::create($credentials);
            return redirect('/');
        } catch (\Throwable $e) {
            return back()->withErrors([
                'errors' => $e,
            ]);
            Log::error("Message: {$e->getMessage()}. Line: {$e->getLine()}");
        }
    }

    public function login()
    {
        return view('client.auth.login');
    }

    public function register()
    {
        return view('client.auth.register');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/client/login');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
