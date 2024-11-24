<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\RegisterUser;
use Illuminate\Http\Request;
use App\Models\DetailVisitor;
use App\Models\PersonalRegister;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{

    public function index(){
        return view('login');
    }

    public function login(Request $request){

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Email harus berformat email yang valid.',
            'password.required' => 'Password wajib diisi.',
        ]);

        $user = User::where('email', $request->email)->first();

        if(!$user){
            Alert::error('Login gagal','Email atau password salah!!');
            return redirect()->route('login');
        }

        if( Hash::check($request->password,$user->password) ){

            auth()->login($user);
            Alert::success('Login Berhasil', 'User berhasil login!');

            if($user->role == 'admin'){
                return redirect()->route('admin.home.index');
            }
            if($user->role == 'supervisor'){
                return redirect()->route('supervisor.home.index');
            }
            if($user->role == 'manajer'){
                return redirect()->route('manager.home.index');
            }
            if($user->role == 'petugas'){
                return redirect()->route('security.home.index');
            }

        }else{
            
            Alert::error('Login gagal','Email atau password salah!!');
            return redirect()->route('login');

        }
    }

    public function logout(Request $request){

        auth()->logout();

        Alert::success('Logout Berhasil', 'User berhasil logout!');
        return redirect()->route('login');
    }

    public function qrcode($uuid){
        $register = RegisterUser::where('uuid', $uuid)->first();
        $data['register'] = $register;

        if(!$register){
            abort(404);
        }

        if($register->rangking != 3){
            abort(404);
        }
        $data['details'] = DetailVisitor::where('register_user_id', $register->id)->get();
        $data['personal'] = PersonalRegister::where('register_user_id', $data['register']->id)->first();
        return view('qrcode',$data);
    }
}
