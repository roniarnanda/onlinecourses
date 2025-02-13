<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function murid()
    {
        return view('admin.murid', [
            'users' => User::where('role', 'Murid')->get(),
            'i' => 1
        ]);
    }

    public function instruktur()
    {
        return view('admin.instruktur', [
            'users' => User::where('role', 'Instruktur')->get(),
            'i' => 1
        ]);
    }

    public function transaksi()
    {

        $tr = DB::table('students')
        ->join('users', 'user_id', '=', 'users.id')
        ->join('courses', 'course_id', '=', 'courses.id')
        ->get();

        return view('admin.transaksi', [
            'transactions' => $tr,
            'i' => 1
        ]);
    }

    public function konfirmasi($id)
    {
        DB::table('students')
              ->where('id', $id)
              ->update(['is_paid' => 1]);

              $tr = DB::table('students')
              ->join('users', 'user_id', '=', 'users.id')
              ->join('courses', 'course_id', '=', 'courses.id')
              ->get();
      
              return view('admin.transaksi', [
                  'transactions' => $tr,
                  'i' => 1
              ]);
    }

    public function tolak($id)
    {
        DB::table('students')
              ->where('id', $id)
              ->update(['is_paid' => 0]);

              $tr = DB::table('students')
              ->join('users', 'user_id', '=', 'users.id')
              ->join('courses', 'course_id', '=', 'courses.id')
              ->get();
      
              return view('admin.transaksi', [
                  'transactions' => $tr,
                  'i' => 1
              ]);
    }
}
