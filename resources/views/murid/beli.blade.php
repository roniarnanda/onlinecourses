@extends('layouts.main')

@section('container')
    <h2 class="mt-4">Pembayaran Pembelian Kursus {{ $course->course_name }}</h2>
    <div class="row">
        <div class="col-md-12">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form action="/murid/kursus/beli" method="POST" enctype="multipart/form-data">

                        @csrf

                        <div class="form-group">
                            <label class="font-weight-bold">Bukti Pembayaran</label>
                            <input type="file" class="form-control @error('title') is-invalid @enderror" id="course_name"
                                name="transaction" placeholder="Masukkan Bukti Pembayaran">

                            <!-- error message untuk title -->
                            @error('title')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                            <input type="hidden" name="id" value="{{ $course->id }}">
                            <button type="submit" class="btn btn-md btn-primary mt-3">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning mt-3">RESET</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
