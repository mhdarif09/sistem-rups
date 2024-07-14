@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Arahan RUPS - User Level 3') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('user.userlevel3.update', $admin1->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="Status">Status</label>
                            <input type="text" name="Status" class="form-control" value="{{ $admin1->Status }}">
                        </div>

                        <div class="form-group">
                            <label for="Keterangan">Keterangan</label>
                            <input type="text" name="Keterangan" class="form-control" value="{{ $admin1->Keterangan }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
