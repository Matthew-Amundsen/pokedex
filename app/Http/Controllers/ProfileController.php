<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{

    function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $attempts = DB::select('SELECT users.*, mission_id 
            AS mission_id, status as status, title as mission_title 
            FROM users 
            INNER JOIN attempts ON users.id = user_id 
            INNER JOIN missions ON missions.id = mission_id 
            WHERE users.id = :user_id', ['user_id' => $user->id]);

            return view('profile.show', compact('user', 'attempts', 'mission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit()
    {
        $user = Auth::user();

        return view('profile.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(UpdateProfileRequest $request)
    {
        $user = Auth::user();
        $user->fill($request->all());
        $user->password = bcrypt($request->input('password'));
        $user->save();

        return redirect()->route('home')->with('status.success', "Your profile has been updated.");
    }
}