@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Arahan RUPS for User Level 1</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table table-bordered">
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
            @foreach ($admin1Data as $item)
                <tr>
                    <td>{{ $item->Arahan }}</td>
                    <td>{{ $item->PIC }}</td>
                    <td>{{ $item->Hasil_tindak_lanjut }}</td>
                    <td>{{ $item->Status }}</td>
                    <td>{{ $item->Keterangan }}</td>
                    <td>{{ $item->Bukti }}</td>
                    <td>
                        <a href="{{ route('user.userlevel1.edit', $item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
