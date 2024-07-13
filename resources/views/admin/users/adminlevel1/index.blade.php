@extends('layouts.app')

@section('content')
<h1>Arahan Rups</h1>

<a href="{{ route('admin.adminlevel1.create') }}" class="btn btn-primary mb-3">Tambah Data</a>

<table class="table">
    <thead>
        <tr>
            <th>Arahan</th>
            <th>PIC</th>
            <th>Hasil Tindak Lanjut</th>
            <th>Status</th>
            <th>Keterangan</th>
            <th>Bukti</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($admin1Data as $data)
            <tr>
                <td>{{ $data->Arahan }}</td>
                <td>{{ $data->PIC }}</td>
                <td>{{ $data->Hasil_tindak_lanjut }}</td>
                <td>{{ $data->Status }}</td>
                <td>{{ $data->Keterangan }}</td>
                <td>{{ $data->Bukti }}</td>
                <td>
                    <a href="{{ route('admin.adminlevel1.edit', $data->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.adminlevel1.destroy', $data->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
