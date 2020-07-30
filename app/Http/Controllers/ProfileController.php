<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;

class ProfileController extends Controller
{
    public function updatePassword(Request $request, $id)
    {
      $password = $request->password;
      $passwordConfirm = $request->password_confirmation;
      if($password == $passwordConfirm){
        $user = User::find($id);
        $user->password = bcrypt($passwordConfirm);
        $user->save();

        if($user) {
          return response()->json([
            'status' => '1'
          ]);
        } else {
          return response()->json([
            'status' => '0'
          ]);
        }

      } else {
        return response()->json([
          'status' => 'invalid_password'
        ]);
      }

    }
}
