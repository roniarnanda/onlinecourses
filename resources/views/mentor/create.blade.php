@extends('layouts.main')

@section('container')
    <h2 class="mt-4">Buat Kursus Baru</h2>
    <div class="row">
        <div class="col-md-12">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form action="{{ route('mentor.store') }}" method="POST" enctype="multipart/form-data">

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
                            <label class="font-weight-bold">Nama Kursus</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="course_name"
                                name="course_name" placeholder="Masukkan Nama Kursus">

                            <!-- error message untuk title -->
                            @error('title')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror

                            <div class="form-floating my-3">
                                <select id="category" name="category"
                                    class="form-select @error('category') is-invalid @enderror">
                                    <option>Pilih</option>
                                    <option>Teknologi</option>
                                    <option>Bahasa</option>
                                </select>
                                <label for="category">Pilih Kategoru</label>
                            </div>

                            <label class="font-weight-bold">Harga Kursus</label>
                            <input type="number" class="form-control @error('price') is-invalid @enderror" id="price"
                                name="price" placeholder="Masukkan Harga Kursus">

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

                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        const course_name = document.querySelector('#course_name');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function() {
            fetch('/dashboard/checkSlug?course_name' + course_name.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        })
    </script>
@endsection
