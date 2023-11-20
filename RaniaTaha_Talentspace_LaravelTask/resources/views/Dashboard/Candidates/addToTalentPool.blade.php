@extends('Dashboard.layouts.master')
@section('title', 'Users')

@section('content')
    <div class="content-wrapper">
        <div class="content" style="margin-top: 5px">
            <div class="card card-default">
                <div class="card-header">
                    <h2>Add To Talent Pool</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('talent_pool.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="mb-5">
                                    <div class="input-group mb-3">
                                        <input type="hidden" class="form-control" name="candidate_id"
                                            value="{{ $candidate->id }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium">First Name</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-message-text" id="mdi-account"></span>
                                        </div>
                                        <input type="text" class="form-control" name="first_name"
                                            value="{{ $candidate->first_name }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium">Last Name</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-message-text" id="mdi-account"></span>
                                        </div>
                                        <input type="text" class="form-control" name="last_name"
                                            value="{{ $candidate->last_name }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium">Email</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-message-text" id="mdi-account"></span>
                                        </div>
                                        <input type="text" class="form-control" name="email"
                                            value="{{ $candidate->email }}" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium">Phone</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-message-text" id="mdi-account"></span>
                                        </div>
                                        <input type="text" class="form-control" name="phone"
                                            value="{{ $candidate->phone }}" readonly>
                                    </div>
                                </div>
                            </div>



                            <div class="col-xl-12">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium">Skills</label>
                                    <div class="input-group mb-3">
                                        <textarea class="form-control" name="skills" placeholder="Add Skills to The Candidate" style="height: 70px ">{{ old('Skills') }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-footer pt-5 border-top">
                                    <button type="submit" class="btn btn-primary btn-pill">Submit</button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files[0]);
            })
        });
    </script>
@endsection
