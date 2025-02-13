@extends('layouts.main')

@section('container')
    <h1 class="mt-4">{{ $course->course_name }}</h1>
    <div class="row">
        <div class="card col-md-4" style="width: 20rem;">
            <div class="card-header">
                TENTANG KURSUS
            </div>
            <ul class="list-group list-group-flush ">
                <li class="list-group-item">Harga = Rp. <span
                        class="badge text-bg-info text-white">{{ $course->price }}</span>
                </li>
                <li class="list-group-item">Kategori = <span
                        class="badge text-bg-info text-white">{{ $course->category }}</span>
                </li>
                <li class="list-group-item">{{ $course->about }}</li>
            </ul>
        </div>

        <div class="col-md-8">
            <div class="alert alert-info mt-4 role="alert">
                Berikut materi yang tersedia pada kursus {{ $course->course_name }}
            </div>
            <table class="table table-striped mt-4">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($materials as $material)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $material->title }}</td>
                            <td>{{ $material->about }}</td>

                        </tr>
                        </a>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @if (auth()->user()->role == 'Murid')
        <a href="/murid/kursus/beli/{{ $course->slug }}" class="btn btn-primary mt-3">Beli Kelas</a>
    @endif
@endsection
