<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(User::with(['role'])->get());
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
        $data = $request->toArray();
        $validator = Validator::make($data, [
            'name' => 'required|between:3,255|string',
            'surname' => 'required|between:3,255|string',
            'patronymic' => 'max:255|string',
            'login' => 'required|between:5,255|unique:users',
            'email' => 'required|unique:users|email|string|max:255',
            'password' => 'required|string|min:8|confirmed'
        ]);
        if ($validator->fails()) {
            dd($validator->messages());
        }
        $data['password'] = Hash::make($data['password']);
        User::create($data);
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = $request->toArray();
        unset($data['role']);
        unset($data['created_at']);
        unset($data['updated_at']);

        User::where('id', $request->id)->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userId = (int)$id;

        $user = User::findOrFail($userId);
        $user->delete();
    }
}
