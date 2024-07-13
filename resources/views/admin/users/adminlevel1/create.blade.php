@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tambah Data Admin Level 1</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.adminlevel1.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="Arahan">Arahan</label>
                <input type="text" class="form-control" id="Arahan" name="Arahan" value="{{ old('Arahan') }}">
            </div>
            <div class="form-group">
                <label for="PIC">PIC</label>
                <input type="text" class="form-control" id="PIC" name="PIC" value="{{ old('PIC') }}">
            </div>
            <div class="form-group">
                <label for="Hasil_tindak_lanjut">Hasil Tindak Lanjut</label>
                <input type="text" class="form-control" id="Hasil_tindak_lanjut" name="Hasil_tindak_lanjut" value="{{ old('Hasil_tindak_lanjut') }}">
            </div>
            <div class="form-group">
                <label for="Status">Status</label>
                <select class="form-control" id="Status" name="Status">
                    <option value="Belum ditindak lanjut" {{ old('Status') == 'Belum ditindak lanjut' ? 'selected' : '' }}>Belum ditindak lanjut</option>
                    <option value="Sudah ditindak lanjut" {{ old('Status') == 'Sudah ditindak lanjut' ? 'selected' : '' }}>Sudah ditindak lanjut</option>
                </select>
            </div>
            <div class="form-group">
                <label for="Keterangan">Keterangan</label>
                <textarea class="form-control" id="Keterangan" name="Keterangan">{{ old('Keterangan') }}</textarea>
            </div>
            <div class="form-group">
                <label for="Bukti">Bukti</label>
                <input type="text" class="form-control" id="Bukti" name="Bukti" value="{{ old('Bukti') }}">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
