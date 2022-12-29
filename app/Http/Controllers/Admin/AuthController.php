<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function login() {
        if (Auth::check()) {
            return redirect()->route('admin.woodblocks.index');
        }
        return view('admin.login.index');
    }

    public function checkLogin(Request $request) {
        $redirectTo = 'admin/woodblocks';
        // $data = $request->all();
        // if (empty($data['username']) || empty($data['pwd'])) {
        //     return redirect()->route('admin.auth.login');
        // }
        // session(['usr' => $data['username'], 'pwd' => $data['pwd']]);

        // return redirect()->route('admin.woodblocks.index');

        if (Auth::attempt(['username' => $request->username, 'password' => $request->pwd, 'state' => 1])) {
            // if (!empty(session('previousUri'))) {
            //     $redirectTo = session('previousUri');
            // }
            return redirect($redirectTo);
        }
        return redirect()->route('admin.auth.login');
    }

    public function username() {
        return 'username';
    }

    public function logout() {
        // session()->forget(['usr', 'pwd']);
        Auth::logout();
        session()->forget('previousUri');
        return redirect()->route('admin.auth.login');
    }

    public function changePassword(Request $request) {
        // dd($request->all());
        $data = $request->all();
        // dd($data['old-password']);
        // dd(Auth::user()->password);
        if (Hash::check($data['old-password'], Auth::user()->password)) {
            if ($data['new-password'] == $data['repeat-new-password']) {
                // dd(Auth::user()->id);
                DB::table('users')->where('id', Auth::user()->id)->update(['password' => bcrypt($data['new-password']), 'modified' => time()]);
                return redirect()->route('admin.woodblocks.index');
            } else {
                return redirect()->route('admin.user.change-password.index')->with('msg', 'Mật khẩu mới không khớp!');
            }
        } else {
            return redirect()->route('admin.user.change-password.index')->with('msg', 'Nhập lại mật khẩu cũ!');
        }
    }
}
