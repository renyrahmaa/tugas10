@extends('layouts.app')

@section('content')
    <div class="container">

        <h3>
            Daftar Mahasiswa
           
        </h3>
        <a class="btn btn-primary btn-sm float-end" href="{{ url('mahasiswa/create') }}">Tambah Data</a>
        <br>
        <br>

        <!-- Start kode untuk form pencarian -->
        <form class="form" method="get" action="{{ route('search') }}">
                 <div class="form-group w-50 mb-3">
                    <label for="search" class="d-block mr-2">Pencarian</label>
                    <input type="text" name="search" class="form-control w-75 d-inline" id="search" placeholder="Cari berdasarkan nama">
                    <button type="submit" class="btn btn-primary mb-1">Cari</button>
                </div>
            </form>
        <!-- Start kode untuk form pencarian -->
        @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
        @endif
        <table class="table table-bordered">
            <tr>
                <td>NIM</td>
                <td>NAMA</td>
                <td>JURUSAN</td>
                <td>ALAMAT</td>
            
            </tr>
            @foreach ($rows as $row)
                <tr>
                    <td>{{ $row->mhsw_nim }}</td>
                    <td>{{ $row->mhsw_nama }}</td>
                    <td>{{ $row->mhsw_jurusan }}</td>
                    <td>{{ $row->mhsw_alamat }}</td>
                    <td><a href="{{ url('mahasiswa/' . $row->mhsw_id . '/edit') }}">Edit</a></td>
                    <td>
                        <form action="{{ url('mahasiswa/' . $row->mhsw_id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button>Hapus</button>
                        </form>

                    </td>

                </tr>
            @endforeach
        </table>
    </div>
@endsection
