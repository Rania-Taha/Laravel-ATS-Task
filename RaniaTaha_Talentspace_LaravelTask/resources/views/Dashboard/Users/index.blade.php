@extends('Dashboard.layouts.master')
@section('title', 'Users')

@section('content')

    <div class="container" style="margin-top: 15px">
        @if(session('message'))
<div class="alert alert-{{ session('alert-type') }}">
    {{ session('message') }}
</div>
@endif
        <div class="card" style="margin-top: 15px">
            <div class="card-header">
                <h4>Manage Users</h4>
                <a href="{{ route('users.create') }}" class="mb-1 btn btn-outline-primary">
                    <i class=" mdi mdi-checkbox-marked-outline mr-1"></i>
                    Create User
                </a>
            </div>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>


@endsection

 
@push('scripts')

    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush