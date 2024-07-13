@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Pending User Approvals') }}</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($users->isEmpty())
                        <p>{{ __('No users awaiting approval.') }}</p>
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Email') }}</th>
                                    <th>{{ __('Jabatan') }}</th>
                                    <th>{{ __('Divisi') }}</th>
                                    <th>{{ __('Role') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->jabatan }}</td>
                                        <td>{{ $user->divisi }}</td>
                                        <td>
                                            <form action="{{ route('admin.users.approve', $user) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <select name="role" class="form-control" required>
                                                    <option value="">Select Role</option>
                                                    <option value="user1">User Level 1</option>
                                                    <option value="user2">User Level 2</option>
                                                    <option value="user3">User Level 3</option>
                                                    <option value="admin1">Admin Level 1</option>
                                                    <option value="admin2">Admin Level 2</option>
                                                    <option value="admin3">Admin Level 3</option>
                                                    <option value="admin4">Admin Level 4</option>
                                                    <option value="admin5">Admin Level 5</option>
                                                </select>
                                                <button type="submit" class="btn btn-success mt-2">{{ __('Approve') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
