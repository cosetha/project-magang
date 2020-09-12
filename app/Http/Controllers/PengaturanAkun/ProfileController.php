<?php

namespace App\Http\Controllers\PengaturanAkun;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\User;
use \App\Histori;
use Validator;
use File;
use Hash;

class ProfileController extends Controller
{

    public function EditProfile(){
        return view('admin/AdminProfile/editprofileAdmin');
      }

    public function EditPassword(){
        return view('admin/AdminProfile/editpasswordAdmin');
    }

    public function updatePassword(Request $request, $id)
    {
      $validator = Validator::make($request->all(),[
            'password' => 'required|string|min:8',
            'password_confirmation' => 'required|string|min:8'
          ]);
        if ($validator->fails()) {
            $error = $validator->errors()->first();
            return response()->json([
                'error' => $error,
              ]);
        }else{
            if(Hash::check($request->password_lama, auth()->user()->password)) {
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
            } else {
              return response()->json([
                'status' => 'salah'
              ]);
            }
        }


    }

    public function updateProfile(Request $request, $id)
    {
      if($request->hasFile('gambar')) {
        $fileName = time().'_'.$request->file('gambar')->getClientOriginalName();
        $filePath = $request->file('gambar')->move('img/profile', $fileName, 'public');
        File::delete('img/profile/'. auth()->user()->gambar);
        $user = User::find($id);
        $histori = Histori::where('nama',$user->name)->get();
          if($histori){
              DB::table('history')->where('nama','=',auth()->user()->name)->update(array('nama' => $request->nama));
          }
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
          $histori = Histori::where('nama',$user->name)->get();
          if($histori){
              DB::table('history')->where('nama','=',auth()->user()->name)->update(array('nama' => $request->nama));
          }
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
          $histori = Histori::where('nama',$user->name)->get();
          if($histori){
              DB::table('history')->where('nama','=',auth()->user()->name)->update(array('nama' => $request->nama));
          }
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

    public function CekUpdatePassword(){
        $user = User::find(auth()->user()->id);

        return response([
            'user' => $user
        ]);
    }
}
