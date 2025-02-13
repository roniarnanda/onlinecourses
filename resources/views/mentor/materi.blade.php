@extends('layouts.main')

@section('container')
    p
    <h2 class="mt-4">{{ $material->title }}</h2>
    <div class="row">
        <video " controls><source src="{{ asset("assets/video/$material->video") }}" width="85%" type="video/mp4"><source src="movie.ogg" type="video/ogg">our browser does not support the video tag.</video>
                        </div>
                            <a href="/instruktur/{{ $slug }}" class="btn btn-primary mt-3">Selesai</a>
@endsection
