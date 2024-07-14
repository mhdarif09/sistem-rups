@extends('layouts.app')

@section('content')
<h1>Arahan RUPS</h1>

<a href="{{ route('admin.adminlevel1.create') }}" class="btn btn-primary mb-3">Tambah Data</a>

<table class="table">
    <thead>
        <tr>
            <th>Arahan</th>
            <th>PIC</th>
            <th>Status</th>
            <th>Keterangan</th>
            <th>Hasil Tindak Lanjut</th>
            <th>Bukti</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($admin1Data as $data)
            <tr>
                <td>{{ $data->Arahan }}</td>
                <td>{{ $data->PIC }}</td>
                <td>{{ $data->Status }}</td>
                <td>{{ $data->Keterangan }}</td>
                <td>
                    @if ($data->approved_by_user2 && $data->approved_by_user3)
                        {{ $data->Hasil_tindak_lanjut }}
                    @else
                        -
                    @endif
                </td>
                <td>
                    @if ($data->approved_by_user2 && $data->approved_by_user3)
                        {{ $data->Bukti }}
                    @else
                        -
                    @endif
                </td>
                <td>
                    @if ($data->approved_by_user2 && $data->approved_by_user3)
                        <a href="{{ route('admin.adminlevel1.edit', $data->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    @endif
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
