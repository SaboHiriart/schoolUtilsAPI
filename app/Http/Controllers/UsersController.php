<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

class UsersController extends Controller{
    public function newUser(Request $request){
        $userData = new users;
        if($request -> hasFile('image_route')){
            $originalFileName = $request -> file('image_route') -> getClientOriginalName();
            $finalFileName = $request->username . ".jpg";
            $fileUri = "./upload/userImages/";
            $request -> file('image_route')->move($fileUri, $finalFileName);

            $userData->name = $request->name;
            $userData->username = $request->username;
            $userData->email = $request->email;
            $userData->password = $request->password;
            $userData->image_route = ltrim($fileUri, '.').$finalFileName;

            $userData->save();
        }
        return true;
    }

    public function userLogIn($username){
        $usersData = new users;
        $user =  $usersData->where('username', '=', $username)->get();
        return response()->json($user);
    }
}