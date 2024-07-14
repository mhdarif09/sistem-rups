@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Arahan RUPS - Admin Level 5') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.adminlevel5.update', $admin5->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <input type="text" name="keterangan" class="form-control" value="{{ $admin5->keterangan }}" required>
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="form-control" required>
                                <option value="Belum selesai" {{ $admin5->status == 'Belum selesai' ? 'selected' : '' }}>Belum selesai</option>
                                <option value="Selesai" {{ $admin5->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
