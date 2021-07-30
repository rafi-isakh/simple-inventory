<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
  public function index() {
    $users = User::all()->toArray();
    return array_reverse($users);
  }

  public function store(Request $request) {
    $user = new User([
      'username' => $request->input('username'),
      'password' => $request->input('password'),
      'name' => $request->input('name'),
      'role' => $request->input('role')
    ]);
    $user->save();

    return response()->json(null, 201);
  }
}
