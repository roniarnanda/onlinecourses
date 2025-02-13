@extends('layouts.main')

@section('container')
    <h2 class="mt-4">Tambah Materi Baru</h2>
    <div class="row">
        <div class="col-md-12">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form action="/instruktur/tambah" method="POST" enctype="multipart/form-data">

                        @csrf

                        {{-- <div class="form-group">
                            <label class="font-weight-bold">Thumbnail</label>
                            <input type="file" class="form-control @error('thumbnail') is-invalid @enderror"
                                name="thumbnail">

                            <!-- error message untuk title -->
                            @error('thumbnail')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div> --}}

                        <div class="form-group">
                            <label class="font-weight-bold">Judul Materi</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                                name="title" placeholder="Masukkan Nama Kursus">

                            <!-- error message untuk title -->
                            @error('title')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                            {{-- </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Slug</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="slug"
                                name="slug" placeholder="">

                            <!-- error message untuk title -->
                            @error('title')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div> --}}
                            <div class="form-group">
                                <label class="font-weight-bold">Video</label>
                                <input type="file" class="form-control @error('video') is-invalid @enderror"
                                    id="video" name="video" placeholder="Video">
                            </div>


                            <div class="form-group">
                                <label class="font-weight-bold">Keterangan</label>
                                <textarea class="form-control @error('content') is-invalid @enderror" name="about" id="about" rows="5"
                                    placeholder="Masukkan Konten Post"></textarea>

                                <!-- error message untuk content -->
                                @error('content')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <input type="hidden" name="course_id" value="{{ $course_id }}">
                            <input type="hidden" name="course_id" value="{{ $slug }}">
                            <input type="hidden" name="video" value="video.mp4">

                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                    </form>
                </div>
            </div>
        </div>
    @endsection
