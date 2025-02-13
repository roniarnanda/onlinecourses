@extends('layouts.main')

@section('container')
    <h1 class="mt-4">Daftar Status Transaksi</h1>


    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Kursus Dibeli</th>
                <th scope="col">Harga</th>
                <th scope="col">Status</th>
                <th scope="col">Bukti Pembayaran</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $transaction->name }}</td>
                    <td>{{ $transaction->course_name }}</td>
                    <td>Rp. {{ $transaction->price }}</td>
                    <td>
                        @if ($transaction->is_paid == 1)
                            <span class="badge rounded-pill text-bg-success">Sukses</span>
                        @elseif ($transaction->is_paid == 0)
                            <span class="badge rounded-pill text-bg-danger">Ditolak</span>
                        @else
                            <span class="badge rounded-pill text-bg-warning">Tertunda</span>
                        @endif


                    </td>
                    <td>{{ $transaction->transaction }}</td>
                    <td><a href="/admin/transaksi/{{ $transaction->id }}" class="btn btn-success">Terima</a> <a
                            href="/admin/transaksi/tolak/{{ $transaction->id }}" class="btn btn-danger">Tolak</a>
                    </td>
                </tr>
                </a>
            @endforeach
        </tbody>
    </table>
@endsection
