<?php

namespace App\Http\Controllers;

use App\Models\Hashtag;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserController extends Controller
{
    public function register()
    {   
        if(Auth::check()){
            return redirect('/');
        }
        return view('auth.register');
    }

    public function singinWithFacebook(){
        return redirect()->back()->with('warning','Chức năng chưa hoạt động');
    }

    public function singinWithGoogle(){
        return redirect()->back()->with('warning','Chức năng chưa hoạt động');
    }

    public function submitRegister(Request $request)
    {

        if ($request['password'] != $request['con-password']) {
            return redirect()->route('register')->with('error', 'Nhập lại mật khẩu không đúng');
        }

        $existingUser = User::where('username', $request['username'])->first();
        if($existingUser){
            return redirect()->route('register')->with('error', 'Tên đăng nhập đã tồn tại');
        }

        try {
            $requestValidate = $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'username' => 'required',
                'password' => 'required|min:3',
                'phonenumber' => 'required',
                'gender' => 'required',
                'birthday' => 'required',
            ]);

            $user = User::create([
                'name' => $requestValidate['name'],
                'email' => $requestValidate['email'],
                'username' => $requestValidate['username'],
                'password' => $requestValidate['password'],
                'phonenumber' => $requestValidate['phonenumber'],
                'gender' => (int)$requestValidate['gender'],
                'birthday' => $requestValidate['birthday'],
                'isadmin' => 0,
                'point' => 0,
            ]);
        } catch (Exception $e) {
            
            return redirect()->back()->with('error', 'Đăng ký thất bại');
        }


        // toastr()->success('This is a warning toast', 'Success', ['timeOut' => 5000]);
        return redirect('/')->with('success', 'Đăng ký thành công');
    }

    public function login(Request $request)
    {

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->back()->with('success', 'Đăng nhập thành công');
        }
        return redirect()->back()->with('error', 'Tên đăng nhập hoặc mật khẩu không đúng');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function myInfo()
    {
        try{
            $user = Auth::user();
            $hashtags = Hashtag::all();

            return view('user.myInfo', compact('user', 'hashtags'));
        }catch(Exception $e){
            return redirect()->back();
        }
    }

    public function userInfo($user_id){
        $user = User::find($user_id);
        $hashtags = Hashtag::all();

        return view('user.userInfo', compact('user', 'hashtags'));
    }

    public function editMyInfo(Request $request)
    {

        try {
            $user = Auth::user();

            $requestValidate = $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'phonenumber' => 'required',
                'gender' => 'required',
                'birthday' => 'required',
            ]);

            if(!Auth::attempt(['username' => Auth::user()->username,'password' => $request->password])){
                return redirect()->back()->with('error', 'Mật khẩu không đúng');
            }


            // dd((int)$requestValidate['gender']);
            
            $user->update([
                'name' => $requestValidate['name'],
                'email' => $requestValidate['email'],
                'password' => Hash::make($requestValidate['password']),
                'phonenumber' => $requestValidate['phonenumber'],
                'gender' => (int)$requestValidate['gender'],
                'birthday' => $requestValidate['birthday'],
            ]);

            return redirect()->back()->with('success', 'Cập nhật thành công');

        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Vui lòng nhập đầy đủ thông tin');

        }

    }
}
