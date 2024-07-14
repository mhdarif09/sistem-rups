@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Admin Level 2 - Arahan RUPS</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
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
            <tr id="row-{{ $data->id }}">
                <td>{{ $data->id }}</td>
                <td>{{ $data->Arahan }}</td>
                <td>{{ $data->PIC }}</td>
                <td>{{ $data->Status }}</td>
                <td>{{ $data->Keterangan }}</td>
                <td>
                    @if(!$data->approve)
                        <form action="{{ route('admin.adminlevel2.approve', $data->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-success approve-btn" data-id="{{ $data->id }}">Approve</button>
                        </form>
                        <a href="{{ route('admin.adminlevel2.edit', $data->id) }}" class="btn btn-primary">Edit</a>
                    @else
                        <span class="badge bg-success">Approved</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('.approve-btn').on('click', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        var row = $('#row-' + id);
        
        $.ajax({
            url: $(this).parent().attr('action'),
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                _method: 'PUT'
            },
            success: function(response) {
                row.fadeOut(1000, function() {
                    $(this).find('.approve-btn').remove();
                    $(this).find('.btn-primary').remove();
                    $(this).find('td:last').append('<span class="badge bg-success">Approved</span>');
                    $(this).fadeIn(1000);
                });
            }
        });
    });
});
</script>
@endsection
