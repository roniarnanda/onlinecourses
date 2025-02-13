<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Student;
use App\Models\Material;
use Illuminate\Support\Facades\DB;

class MuridController extends Controller
{

    public function index()
    {

        $courses = DB::table('students')
        ->join('users', 'user_id', '=', 'users.id')
        ->join('courses', 'course_id', '=', 'courses.id')
        ->where('is_paid', 1)
        ->where('user_id', auth()->user()->id)
        ->get();

        // dd($courses);

        return view('murid.index', [
            'title' => 'dashboard',
            'courses' => $courses
        ]);
    }



    public function beli($slug)
    {
        return view('murid.beli', [
            'course' => Course::where('slug', $slug)->first()
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'transaction'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'course_id'     => '',
            'user_id'   => '',
        ]);

        //upload image
        $transaction = $request->file('transaction');
        // $transaction->storeAs('public/mentor', $transaction->hashName());
        $img = $transaction->hashName();
        $transaction->move(public_path('assets/img'), $img);

        Student::create([
            'transaction'     => $img,
            'course_id'     => $request->id,
            'user_id'   => auth()->user()->id,
            'is_paid' => '2'
        ]);

        return redirect()->route('dashboard.index');
    }

    public function show($slug) 
    {
        
        $materials = DB::table('courses')
        ->join('materials', 'course_id', '=', 'courses.id')
        ->where('slug', $slug)
        ->get();


        return view('murid.show', [
            'materials' => $materials,
            'course' => Course::where('slug', $slug)->first(),
            'i' => 1
        ]);
    }

    public function materi($slug, $id)
    {
        // $materials = DB::table('materials')
        // ->join('courses', 'course_id', '=', 'courses.id')
        // ->where('materials.id', $id)
        // ->first();
        return view('murid.materi',[
            'material' => Material::where('id',$id)->first(),
            'slug' => $slug
        ]);
    }

}
