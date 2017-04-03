<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;

use App\User;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
    public function userIndex()
    {
        $id= Auth::id();
        $items = DB::select("SELECT *, users.name as user, users.id as user_id FROM users,items WHERE users.id=items.user_id AND users.id=$id");
        return view('admin.index',compact('items'));
    }

    public function editProfile($id){
        $users=User::find($id);
        return view('editProfile',compact('users'));
    }

    public function updateProfile(Request $request,$id){
        $this->validate(request() ,[
            'name' => 'required|max:100',
            'email'=> 'required|email',
            'location' => 'required|max:140',
        ]);
        $name= $request->get('name');
        $email= $request->get('email');
        $location= $request->get('location');
        $users = User::find($id);
        $users->name = $name;
        $users->email = $email;
        $users->location = $location;
        $users->save();
        return redirect("admin");
    }
}
