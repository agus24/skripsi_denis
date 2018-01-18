<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(isset($_GET['search'])) {
            $search = $_GET['search'];
            $data = User::where('name', "like", "%".$search."%")
                        ->orWhere("username", "like", "%".$search."%")
                        ->orWhere("email", "like", "%".$search."%")
                        ->paginate(15);
        } else {
            $data = User::paginate(15);
        }
        return view('user.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "username" => "required|unique:users,username",
            "password" => "required|same:password_confirmation",
            "password_confirmation" => "required",
            "email" => "required|email|unique:users,email",
            "name" => "required",
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user->username = $request->username;
        $user->email = $request->email;
        $user->save();

        return redirect('admin/user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::find($id);
        return view('user.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "username" => "required",
            "password" => "required|same:password_confirmation",
            "password_confirmation" => "required",
            "email" => "required|email",
            "name" => "required",
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect('admin/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
