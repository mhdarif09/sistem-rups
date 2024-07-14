@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Arahan RUPS - Admin Level 2') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.adminlevel2.update', $admin1->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="Status">Status</label>
                            <select name="Status" class="form-control" required>
                                <option value="Belum ditindak lanjut" {{ $admin1->Status == 'Belum ditindak lanjut' ? 'selected' : '' }}>Belum ditindak lanjut</option>
                                <option value="Sudah ditindak lanjut" {{ $admin1->Status == 'Sudah ditindak lanjut' ? 'selected' : '' }}>Sudah ditindak lanjut</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="Keterangan">Keterangan</label>
                            <input type="text" name="Keterangan" class="form-control" value="{{ $admin1->Keterangan }}">
                        </div>

                        <div class="form-group">
                            <label for="Bukti">Bukti</label>
                            <input type="text" name="Bukti" class="form-control" value="{{ $admin1->Bukti }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
