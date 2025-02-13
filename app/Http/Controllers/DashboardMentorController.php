<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Material;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use \Illuminate\Support\Str;

class DashboardMentorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mentor.index', [
            'title' => 'dashboard',
            'courses' => Course::where('instructor_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mentor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'course_name' => 'required',
            'about' => 'required',
            'slug' => '',
            'price' => 'required|integer'
        ]);

        $validatedData['instructor_id'] = auth()->user()->id;
        $validatedData['thumbnail'] = '';

        Course::create($validatedData);

        return redirect('mentor')->with('success', 'Kursus Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('mentor.material', [
            'materials' => Material::where('course_id', $id)->get(),
            'course' => $id,
            'i' => 1
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->course_name);
        return response()->json(['slug'=> $slug]);
    }

    public function creatematerial() 
    {
        return view('mentor.creatematerial');
    }

    
}
