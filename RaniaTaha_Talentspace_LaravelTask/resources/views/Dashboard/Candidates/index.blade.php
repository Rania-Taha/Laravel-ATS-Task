@extends('Dashboard.layouts.master')
@section('title', 'Candidates')

@section('content')
    <div class="container">
        <div class="card" style="margin-top: 15px">
            @if(session('message'))
            <div class="alert alert-{{ session('alert-type') }}">
                {{ session('message') }}
            </div>
            @endif
            <div class="card-header">
                <h4>Manage Candidates</h4>
                <a href="{{ route('candidates.create') }}" class="mb-1 btn btn-outline-primary">
                    <i class=" mdi mdi-checkbox-marked-outline mr-1"></i>
                    Create candidates
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