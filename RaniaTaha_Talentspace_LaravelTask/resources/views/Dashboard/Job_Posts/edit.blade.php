@extends('Dashboard.layouts.master')
@section('title', 'Job Post')

@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="card card-default">
                <div class="card-header">
                    <h2>Edit Job Post</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('job_posts.update', $job_post->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-xl-6">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium">Title</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-message-text" id="mdi-account"></span>
                                        </div>
                                        <input type="text" class="form-control" name="title"
                                            value="{{ $job_post->title}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium">Location</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-message-text" id="mdi-account"></span>
                                        </div>
                                        <input type="text" class="form-control" name="location"
                                            value="{{ $job_post->location}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium">Job Type</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-message-text" id="mdi-account"></span>
                                        </div>
                                        <input type="text" class="form-control" name="job_type"
                                            value="{{ $job_post->job_type}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium">Deadline</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-message-text" id="mdi-account"></span>
                                        </div>
                                        <input type="date" class="form-control" name="deadline"
                                            value="{{ $job_post->deadline}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium">Responsibility</label>
                                    <div class="input-group mb-3">
                                        <textarea class="form-control" name="responsibility" style="height: 70px">{{ $job_post->responsibility}}</textarea>
                                    </div>
                                </div>
                            </div>



                            <div class="col-xl-12">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium">Qualifications</label>
                                    <div class="input-group mb-3">
                                        <textarea class="form-control" name="qualifications" style="height: 70px">{{ $job_post->qualifications}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium">Job Description</label>
                                    <div class="input-group mb-3">
                                        <textarea class="form-control" name="job_description" style="height: 70px">{{ $job_post->job_description}}</textarea>
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
