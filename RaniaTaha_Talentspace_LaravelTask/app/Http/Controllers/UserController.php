<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\DataTables\UserDataTable;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index(UserDataTable $dataTable)
    {
        return $dataTable->render('Dashboard.Users.index');
    }

    public function create()
    {
        return view('Dashboard.Users.create');
    }

   

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'max:50'],
            'last_name' => ['required', 'max:50'],
            'email' => ['required', 'email'],
            'phone' => ['required'],
            'role' => ['required', 'numeric', 'in:0,1'],
            'password' => ['required', 'max:18'],
        ]);

        $user = new User();

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->role = $request->role;
        $user->password = Hash::make('password');
        $user->save();

        $notification = array(
            'message' => 'User Created Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->route('users.index')->with($notification);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('Dashboard.Users.edit', compact('user'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => ['required', 'max:50'],
            'last_name' => ['required', 'max:50'],
            'email' => ['required', 'email'],
            'phone' => ['required'],
            'role' => ['required', 'numeric', 'in:0,1'],
        ]);

        $user = User::findOrFail($id);

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->role = $request->role;
        $user->save();

        $notification = array(
            'message' => 'User Updated Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->route('users.index')->with($notification);
    }




    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        $notification = array(
            'message' => 'User Deleted Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->route('users.index')->with($notification);
    }

}
