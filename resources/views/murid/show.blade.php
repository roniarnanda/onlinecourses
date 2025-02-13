@extends('layouts.main')

@section('container')
    <h1 class="mt-4">Materi {{ $course->course_name }}</h1>
    <div class="card" style="width: 20rem;">
        <div class="card-header">
            TENTANG KURSUS
        </div>
        <ul class="list-group list-group-flush ">
            {{-- <li class="list-group-item">Harga = Rp. <span class="badge text-bg-info text-white">{{ $course->price }}</span>
            </li> --}}
            <li class="list-group-item">Kategori = <span class="badge text-bg-info text-white">{{ $course->category }}</span>
            </li>
            <li class="list-group-item">{{ $course->about }}</li>
        </ul>
    </div>

    <div class="alert alert-info mt-4" role="alert">
        Berikut materi yang tersedia pada kursus {{ $course->course_name }}
    </div>
    <table class="table table-striped mt-4">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Judul</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($materials as $material)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $material->title }}</td>
                    <td>{{ $material->about }}</td>
                    <td><a href="/murid/{{ $course->slug }}/{{ $material->id }}">Mulai Belajar</a></td>
                </tr>
                </a>
            @endforeach
        </tbody>
    </table>
@endsection
