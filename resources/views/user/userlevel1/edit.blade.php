@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Arahan RUPS</h1>
    <form action="{{ route('user.userlevel1.update', $admin1->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="Hasil_tindak_lanjut">Hasil Tindak Lanjut</label>
            <textarea name="Hasil_tindak_lanjut" id="Hasil_tindak_lanjut" class="form-control">{{ $admin1->Hasil_tindak_lanjut }}</textarea>
        </div>
        <div class="form-group">
            <label for="Keterangan">Keterangan</label>
            <textarea name="Keterangan" id="Keterangan" class="form-control">{{ $admin1->Keterangan }}</textarea>
        </div>
        <div class="form-group">
            <label for="Bukti">Bukti</label>
            <textarea name="Bukti" id="Bukti" class="form-control">{{ $admin1->Bukti }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
