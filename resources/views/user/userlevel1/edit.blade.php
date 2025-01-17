@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Arahan RUPS - User Level 1') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('user.userlevel1.update', $admin1->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="Hasil_tindak_lanjut">Hasil Tindak Lanjut</label>
                            <textarea name="Hasil_tindak_lanjut" class="form-control">{{ $admin1->Hasil_tindak_lanjut }}</textarea>
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
