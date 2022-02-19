<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public $store;

    public function __construct(User $user)
    {
        # code...
        $this->store = $user;
    }

    public function index()
    {
        //
        return $this->store->paginate(12);

    }


    public function store(Request $request)
    {
        //
        $user = new User();
        $user->name = $request->input("name");
        $user->email = $request->input("email");
        $user->password = Hash::make($request->input("password"));
        if($user->save())
        {
            return $user;
        }
    }


    public function show($id)
    {
        //
        $user = $this->store->findOrFail($id);
        return $user;
    }


    public function update(Request $request, $id)
    {
        //
        $user = $this->store->findOrFail($id);
        $user->name = $request->input("name");
        $user->email = $request->input("email");
        $user->password = $request->input("password");
        if($user->update())
        {
            return $user;
        }
    }


    public function destroy($id)
    {
        //
        $user = $this->store->findOrFail($id);
        if($user->delete())
        {
            return $user;
        }
    }
}
