<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function getAll(){
        $arrayUsers = DB::table("users")->get();
        return view("user.index")->with("arrayUsers", $arrayUsers);
    }

    public function getCreate(){
        return view("user.create");
    }

    public function postCreate(Request $request){
        $p = new User();
        $p->name = $request->name;
        $p->email = $request->email;
        $p->password = bcrypt($request->password);
        $p->save();
        return redirect()->action("App\Http\Controllers\UserController@getAll");
    }

    public function getEdit($id){
        $user = User::find($id);
        return view("user.edit")->with("user", $user);
    }

    public function postEdit(Request $request, $id){
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        return redirect()->action("App\Http\Controllers\UserController@getAll");
    }

    public function delete($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->action("App\Http\Controllers\UserController@getAll");
    }



}
