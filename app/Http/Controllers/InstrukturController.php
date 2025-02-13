<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Material;
use Illuminate\Support\Facades\DB;

class InstrukturController extends Controller
{
    public function index()
    {
        return view('mentor.index', [
            'title' => 'dashboard',
            'courses' => Course::where('instructor_id', auth()->user()->id)->get()
        ]);
    }

    public function show($slug)
    {

        $materials = DB::table('courses')
        ->join('materials', 'course_id', '=', 'courses.id')
        ->where('slug', $slug)
        ->get();


        return view('mentor.material', [
            'materials' => $materials,
            'course' => Course::where('slug', $slug)->first(),
            'i' => 1
        ]);
    }

    public function tambahmateri($slug)
    {

        $course = Course::where('slug', $slug)->first();

        return view('mentor.creatematerial', [
            
            'course_id' => $course->id,
            'slug' => $slug,
            'i' => 1
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'about' => 'required',
            'course_id' => '',
            'video' => ''

        ]);

        $course = Course::where('slug', $request->course_id)->first();
           //upload video
            $video = $request->file('video');
            // $video->storeAs('public/mentor', $video->hashName());
            $vid = $video->hashName();
            $video->move(public_path('assets/video'), $vid);

    

        Material::create([
            'title' => $request->title,
            'about' => $request->about,
            'course_id' => $course->id,
            'video' => $vid
        ]);

        return view('mentor.index');
        
    }

    public function materi($slug, $id)
    {
        return view('murid.materi',[
            'material' => Material::where('id',$id)->first(),
            'slug' => $slug
        ]);
    }

}
