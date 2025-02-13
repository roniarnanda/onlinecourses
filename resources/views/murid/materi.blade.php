@extends('layouts.main')

@section('container')
    <h2 class="mt-4">{{ $material->title }}</h2>
    <div class="row">
        <div class="col-md-10">
            <div class="alert alert-primary mt-4 col-md-9" role="alert">
                {{ $material->about }}
            </div>
            <video " controls><source src="{{ asset("assets/video/$material->video") }}" type="video/mp4"><source src="movie.ogg" type="video/ogg">our browser does not support the video tag.</video>
                                            </div>      </div>
                                                       <a href="/murid/{{ $slug }}" class="btn btn-primary mt-3">Selesai</a>
@endsection
