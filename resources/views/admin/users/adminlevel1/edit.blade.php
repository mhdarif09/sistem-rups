@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Arahan RUPS') }}</div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.adminlevel1.update', $admin1->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="Arahan">{{ __('Arahan') }}</label>
                            <input type="text" class="form-control" id="Arahan" name="Arahan" value="{{ $admin1->Arahan }}" required>
                        </div>

                        <div class="form-group">
                            <label for="PIC">{{ __('PIC') }}</label>
                            <input type="text" class="form-control" id="PIC" name="PIC" value="{{ $admin1->PIC }}" required>
                        </div>

                        <div class="form-group">
                            <label for="Hasil_tindak_lanjut">{{ __('Hasil Tindak Lanjut') }}</label>
                            <textarea class="form-control" id="Hasil_tindak_lanjut" name="Hasil_tindak_lanjut">{{ $admin1->Hasil_tindak_lanjut }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="Status">{{ __('Status') }}</label>
                            <select class="form-control" id="Status" name="Status" required>
                                <option value="Belum ditindak lanjut" {{ $admin1->Status == 'Belum ditindak lanjut' ? 'selected' : '' }}>Belum ditindak lanjut</option>
                                <option value="Sudah ditindak lanjut" {{ $admin1->Status == 'Sudah ditindak lanjut' ? 'selected' : '' }}>Sudah ditindak lanjut</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="Keterangan">{{ __('Keterangan') }}</label>
                            <textarea class="form-control" id="Keterangan" name="Keterangan">{{ $admin1->Keterangan }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="Bukti">{{ __('Bukti') }}</label>
                            <textarea class="form-control" id="Bukti" name="Bukti">{{ $admin1->Bukti }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
