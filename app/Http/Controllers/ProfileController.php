<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use File;

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

    public function updateProfile(Request $request, $id)
    {
      if($request->hasFile('gambar')) {
        $fileName = time().'_'.$request->file('gambar')->getClientOriginalName();
        $filePath = $request->file('gambar')->move('img/profile', $fileName, 'public');
        File::delete('img/profile/'. auth()->user()->gambar);
        $user = User::find($id);
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->gambar = $fileName;
        $user->save();
        if($user) {
          return response()->json([
            'status' => '1',
          ]);
        }

      } else {
        $cek = $this->cekEmail($request->email);
        $cekNama = $this->cekNama($request->nama);
        if($cek==false && $cekNama==false) {
          $user = User::find($id);
          $user->name = $request->nama;
          $user->email = $request->email;
          $user->save();
          if($user) {
            return response()->json([
              'status' => '1',
            ]);
          }
        } else if($cekNama==false) {
          $user = User::find($id);
          $user->name = $request->nama;
          $user->save();
          if($user) {
            return response()->json([
              'status' => '1',
            ]);
          }
        } else if($cek==false) {
          $user = User::find($id);
          $user->email = $request->email;
          $user->save();
          if($user) {
            return response()->json([
              'status' => '1',
            ]);
          }
        } else if($cek==true) {
          return response()->json([
            'status' => 'email_sudah_ada',
          ]);
        }

      }

    }

    function cekEmail($email)
    {
      $cek = User::where('email', $email)->first();
      if(!$cek) {
        return false;
      }
      return true;
    }

    function cekNama($nama)
    {
      $cek = User::where('name', $nama)->first();
      if(!$cek) {
        return false;
      }
      return true;
    }
}