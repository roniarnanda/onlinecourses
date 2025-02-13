@extends('layouts.main')

@section('container')
    <h1 class="mt-4">Kursus Saya</h1>
    <a href="/mentor/create" class="btn btn-success mb-3">Buat Kursus Baru</a>
    <div class="row mt-3">
        @foreach ($courses as $course)
            <div class="col-xl-3 col-md-6">
                <div class="row mx-1">
                    <div class="card mr-2">
                        <div class="card-body">
                            <h5 class="card-title">{{ $course->course_name }}</h5>
                            <span class="badge text-bg-info">{{ $course->category }} </span>
                            <p class="card-text">{{ $course->about }}
                            </p>
                            <a href="/instruktur/{{ $course->slug }}" class="btn btn-primary">Lihat Kelas</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
