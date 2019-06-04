<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->route('home');
//        $users = User::all();
//        return view('users.index',['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $user = User::findOrFail($id);

       return view('users.edit', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('users.edit', ['user' => $user]);
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
        $user = User::findOrFail($id);
        $data = $request->all();
        //below checking a change password




        if (trim(Input::get('password')) == '') {
            $request->offsetUnset('password');
            $request->offsetUnset('password_confirmation');
            $user->fill($request->all());


        } else {

            if(!Hash::check($data['old_password'], $user->password)){

                return back()->withErrors('Please enter old password');
            }

            if (trim(Input::get('password')) == trim(Input::get('password_confirmation' ))) {
                $user->password = Hash::make(trim(Input::get('password')));
                $user->save();

            } else {
                return redirect()->back()->withErrors('Please confirm password');
            }
        }


        if (!$user->save()) {
            return redirect()->back()->withErrors('Update error');
        }

        return redirect()->back()->withSuccess('Changes were successfully made.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if (!$user->delete()) {
            return redirect()->back()->withErrors('Delete error');
        }

        return redirect()->back();
    }
}
