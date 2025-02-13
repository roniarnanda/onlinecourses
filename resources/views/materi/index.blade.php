@extends('layouts.main')

@section('container')
    <h2 class="mt-4">Materi Pemrograman</h2>
    <div class="row">
        <video " controls>
                <source src="{{ asset('assets/video/video.mp4') }}" width="85%" type="video/mp4">
                   <source src="movie.ogg" type="video/ogg">
                    Your browser does not support the video tag.
                  </video>
              </div>
@endsection
