<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UserRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\ProfileRequest;
use Auth;
use Validator;
use Hash;

class UserController extends Controller
{
    //

    public function index(){
    	$data['title'] = "Users";
    	$data['users'] = User::all();
    	return view("pages.user.index",$data);
    }

    public function create(){
    	$data['title'] = "Create User";
    	return view("pages.user.create",$data);
    }

    public function store(UserRequest $request){
    	$user = new User();
    	$user->email = $request->input("email");
    	$user->type = $request->input("type");
    	$user->status = $request->input("status");
    	$user->name = $request->input("name");
    	$user->password  = bcrypt($request->input("password"));
    	$user->save();

    	return redirect('users')->with(['success'=>'Berhasil tambah user.']);
    }

    public function edit($id){
        $data['title'] = "Edit User";
        $data['user'] = User::find($id);
        return view("pages.user.edit",$data);
    }

    public function update($id,UserRequest $request){
        $user = User::where("id",$id)
                   ->update($request->except(['_token','_method']));

        return redirect('users')->with(['success'=>'Berhasil ubah user.']);
    }

    public function delete($id){
    	$user = User::destroy($id);
    	return redirect('users')->with(['success'=>'Berhasil hapus user.']);
    }

    public function show($id){
    	$user = User::find($id);
    	return response()->json(['status'=>true,'user'=>$user]);
    }

    public function changePasswordForm($id){
    	$data['title'] = "Change Password User";
        $data['user'] = User::find($id);
        return view("pages.user.change_password",$data);
    }

    public function changePassword($id,ChangePasswordRequest $request){
    	$user = User::find($id);
    	$user->password = bcrypt($request->input("password"));
    	$user->save();
    	return redirect('users')->with(['success'=>'Berhasil ubah password user.']);
    }

    public function showProfile(){
        $data['title'] = "User Profile";
        $data['user'] = User::find(Auth::user()->id);
        return view("pages.profile",$data);
    }

    public function profile(Request $request){
        if($request->ajax()){
            $validator = Validator::make($request->except("_token"),[
                'name' => 'required'
            ],['name.required' => "Nama harus diisi."]);

            if($validator->fails()){
                return response()->json(['status'=>false,"error" => $validator->errors()]);
            }

            $user = User::find(Auth::user()->id);
            $user->name = $request->input("name");
            $user->save();

            return response()->json(['status'=>true]);

        }
        
    }

    public function profileChangePassword(Request $request){
        if($request->ajax()){
             $validator = Validator::make($request->except("_token"),[
               "old_password" => "required",
               "password" => 'required|min:6|confirmed',
               "password_confirmation" => "required"
            ],[
                 'password_confirmation.required' => 'Konfirmasi password harus diisi.',
                 'password.confirmed' => 'Password dan konfirmasi password harus sama.',
                 'password.min' => 'Password minimal :min karakter.',
                 'old_password.required' => 'Password Lama harus diisi.', 
            ]);

            if($validator->fails()){
                return response()->json(['status'=>false,"error" => $validator->errors()]);
            }


            if (Hash::check($request->input("old_password"), Auth::user()->password)) {
                 $user = User::find(Auth::user()->id);
                 $user->password = bcrypt($request->input("password"));
                 $user->save();
            }else{
                return response()->json(['status'=>false,'error'=>['old_password' => ['Password Lama Anda Salah.']]]);
            }
           

            return response()->json(['status'=>true]);
        }
    }
}
