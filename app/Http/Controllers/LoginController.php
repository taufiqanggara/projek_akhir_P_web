<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
// sudah bisa tampil di halaman selanjut nya 
class LoginController extends Controller
{
    // Metode untuk menampilkan halaman login
    public function showLoginForm()
    {
        return view('login2');
    }

    // Metode untuk menangani proses login
    public function login(Request $request)
    {
       

        $username = $_POST['username'];
        $password = $_POST['password'];

        $hardcoded_username = "admin";
        $hardcoded_password = "123"; 
            
        if ($username == $hardcoded_username && $password == $hardcoded_password) {
            // Login berhasil
            Session::flash('success', 'Login berhasil');
            return redirect()->route('mahasiswa.index'); 
        } else {
            // Login gagal
            Session::flash('error', 'Gagal login. Silakan coba lagi.');
            return redirect()->back();
        }
        
    }
}
