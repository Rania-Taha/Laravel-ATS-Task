@extends('Dashboard.Layouts.master')
@section('title', 'Dashboard')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-body text-center">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp"
                        alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                    <h5 class="my-3">{{ $user->first_name }} {{ $user->last_name }}</h5>
                    
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-body">
                    <form id="userInfoForm" method="POST" action="{{ route('profile_update') }}">
                        @csrf

                        <div class="row">
                            <div class="col-sm-3">
                                <label for="fullName" class="mb-0">First Name</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="first_name" name="first_name"
                                    value="{{ $user->first_name }}" >
                            </div>
                          
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-3">
                              <label for="last_name" class="mb-0">Last Name</label>
                          </div>
                          <div class="col-sm-9">
                              <input type="text" class="form-control" id="last_name" name="last_name"
                                  value="{{ $user->last_name }}" >
                          </div>
                        
                      </div>

                        <hr>

                        <div class="row">
                            <div class="col-sm-3">
                                <label for="email" class="mb-0">Email</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ $user->email }}" >
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <label for="phone" class="mb-0">Phone</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="tel" class="form-control" id="phone" name="phone"
                                    value="{{ $user->phone }}" >
                            </div>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-center mb-2">
                          <button type="submit" class="btn btn-primary" id="editButton">Save updates</button>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Your JavaScript logic for editing and updating the form fields remains unchanged
    // Include the script for handling edit, save, and cancel actions here
</script>

@endsection
