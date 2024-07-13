@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>

            @if($divisions->count() > 0)
                <div class="mt-4">
                    <h5>Your Divisions:</h5>
                    <div class="row">
                        @foreach($divisions as $divisi)
                            <div class="col-md-12 mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $divisi }}</h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
            @else
                <p>Tidak ada divisi yang tersedia.</p>
            @endif
        </div>
    </div>
</div>
@endsection
