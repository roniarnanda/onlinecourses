<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Instructor;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'register'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|unique:users|min:3|max:15',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:5|max:255',
            'role' => 'in:Instruktur,Murid'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        // if ($validatedData['role']=='Mentor') {
        //     Instructor::create($validatedData())
        // }

        
        User::create($validatedData);
        
        $request->session()->flash('success', 'Berhasil Registrasi!');
        return redirect('/login');

    }
}
