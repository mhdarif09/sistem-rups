@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Arahan RUPS - User Level 2') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('user.userlevel2.update', $admin1->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="form-control" required>
                                <option value="Belum ditindak lanjut" {{ $admin1->Status == 'Belum ditindak lanjut' ? 'selected' : '' }}>Belum ditindak lanjut</option>
                                <option value="Sudah ditindak lanjut" {{ $admin1->Status == 'Sudah ditindak lanjut' ? 'selected' : '' }}>Sudah ditindak lanjut</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea name="keterangan" class="form-control">{{ $admin1->Keterangan }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
