<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

class UsersController extends Controller{
    private function checkUserExist($username){
        $userData = new users;
        $count = $userData ->where('username', '=', $username)->count();
        if($count > 0){
            return 0;
        }else {
            return 1;
        }
    }

    public function newUser(Request $request){
        if($this->checkUserExist($request->username) == 1){
            $userData = new users;
            $userData->name = $request->name;
            $userData->username = $request->username;
            $userData->email = $request->email;
            $userData->password = $request->password;
            $userData->save();
            return 1;
        }else{
            return 0;
        }
    }

    public function userLogIn($username){
        $usersData = new users;
        $user =  $usersData->where('username', '=', $username)->get();
        return response()->json(['username' => $user->pluck('username'), 'password' => $user->pluck('password')]);
    }
}