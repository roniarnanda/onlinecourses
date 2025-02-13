@extends('layouts.main')

@section('container')
    <h1 class="mt-4">Daftar Nama Murid</h1>


    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                </tr>
                </a>
            @endforeach
        </tbody>
    </table>
@endsection
