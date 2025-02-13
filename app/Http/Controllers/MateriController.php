<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Material;

class MateriController extends Controller
{
    public function index()
    {
        return view('materi.index');
    }

    public function tambahmateri($id)
    {
        return view('mentor.creatematerial', [
            
            'course_id' => $id,
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


        Material::create($validatedData);
    }
    
}
