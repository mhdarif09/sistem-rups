@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Admin Level 5 - Arahan RUPS</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Arahan</th>
                <th>PIC</th>
                <th>Status</th>
                <th>Keterangan</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($admin1Data as $data)
            <tr>
                <td>{{ $data->id }}</td>
                <td>{{ $data->Arahan }}</td>
                <td>{{ $data->PIC }}</td>
                <td>{{ $data->Status }}</td>
                <td>{{ $data->Keterangan }}</td>
                <td>
                    <form action="{{ route('admin.adminlevel5.approve', $data->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-success">Approve</button>
                    </form>
                    <form action="{{ route('admin.adminlevel5.markComplete', $data->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-primary">Mark as Complete</button>
                    </form>
                    <a href="{{ route('admin.adminlevel5.edit', $data->id) }}" class="btn btn-primary">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
