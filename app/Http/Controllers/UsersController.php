<?php

namespace LaravelSocial\Http\Controllers;

use Illuminate\Http\Request;
use LaravelSocial\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        if(intval($id) !== Auth::id()){
            abort(403, 'Access denied.');
        }

        $user = Auth::user();

        return view('users.edit', compact('user'));
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
        if(intval($id) !== Auth::id()){
            abort(403, 'Access denied.');
        }

        $this->validate($request, [
            'firstName' => 'required|max:255',
            'lastName' => 'required|max:255',
            'sex' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($id),
            ]
        ]);

        $user = User::findOrFail($id);
        $user->firstName = $request->firstName;
        $user->lastName = $request->lastName;
        $user->sex = $request->sex;
        $user->email = $request->email;


        if ($request->file('avatar')) {
            $user_avatar_path = 'public/users/' . $id . '/avatars';
            $upload_path = $request->file('avatar')->store($user_avatar_path);
            $avatar_filename = str_replace($user_avatar_path . '/', '', $upload_path);
            $user->avatar = $avatar_filename;
        }

        $user->save();

        return back();
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
