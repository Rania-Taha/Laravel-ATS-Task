@extends('Frontend.Layouts.master')
@section('title', 'Jobs List')

@section('content')


    <!-- Job Detail Start -->
    <br>
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
            <div class="row gy-5 gx-4">
                <div class="col-lg-8">
                    <div class="d-flex align-items-center mb-5">
                        <img class="flex-shrink-0 img-fluid border rounded"
                            src="{{ asset('Frontend/img/talentspace_logo1.png') }}" alt="Talent Space Logo"
                            style="width: 80px; height: 80px;">

                        <div class="text-start ps-4">
                            <h3 class="mb-3"> {{ $job->title }} &nbsp &nbsp &nbsp &nbsp <span> <a href="#apply"
                                        class="btn btn-primary w-20" type="submit"> Apply Now </a>
                                </span></h3>

                            <span class="text-truncate me-3"><i
                                    class="fa fa-map-marker-alt text-primary me-2"></i>{{ $job->location }}</span>
                            <span class="text-truncate me-3"><i
                                    class="far fa-clock text-primary me-2"></i>{{ $job->job_type }}</span>
                        </div>
                    </div>

                    <div class="mb-5">
                        <h4 class="mb-3">Job description</h4>
                        <p>{{ $job->job_description }}</p>

                        <h4 class="mb-3">Responsibility</h4>
                        <p>{{ $job->responsibility }}</p>

                        <h4 class="mb-3">Qualifications</h4>
                        <p>{{ $job->qualifications }}</p>

                    </div>

                    <div class="" id="apply">
                        <h4 class="mb-4">Apply For The Job</h4>
                        <form action="{{ route('application_form.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <label for="firstName" class="form-label">First Name</label>
                                    <input type="text" id="firstName" name="first_name" class="form-control"
                                        placeholder="First Name">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label for="last_name" class="form-label">Last Name</label>
                                    <input type="text" id="last_name" name="last_name" class="form-control"
                                        placeholder="Last Name">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label for="emailAddress" class="form-label">Email Address</label>
                                    <input type="email" id="emailAddress" name="email" class="form-control"
                                        placeholder="Email Address">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="tel" id="phone" name="phone" class="form-control"
                                        placeholder="Phone">
                                </div>
                                <div class="col-6">
                                    <label for="resume" class="form-label">Upload Resume</label>
                                    <div class="custom-file-input"
                                        style="background-color: white; color: grey; padding: 8px 12px; border-radius: 5px;">
                                        <input type="file" id="resume" name="resume" class="form-control bg-white"
                                            style="opacity: 0; position: absolute; z-index: -1;">
                                        <label for="resume" class="custom-file-label" style="cursor: pointer;">Choose
                                            File</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label for="cover_letter" class="form-label">Cover Letter</label>
                                    <div class="custom-file-input"
                                        style="background-color: white; color: grey; padding: 8px 12px; border-radius: 5px;">
                                        <input type="file" id="cover_letter" name="cover_letter"
                                            class="form-control bg-white"
                                            style="opacity: 0; position: absolute; z-index: -1;">
                                        <label for="cover_letter" class="custom-file-label" style="cursor: pointer;">Choose
                                            File</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="linkedin_profile" class="form-label">Linkedin profile
                                    </label>
                                    <input type="text" id="linkedin_profile" name="linkedin_profile" class="form-control"
                                        placeholder="Linkedin profile">
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100" type="submit">Apply Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="bg-light rounded p-5 mb-4 wow slideInUp" data-wow-delay="0.1s"
                        style="background: #7E3AF2 !important">
                        <h4 class="mb-4">Job Summery</h4>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Published On: {{ $job->created_at->format('Y-m-d') }}</p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Job Type: {{ $job->job_type }}</p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Location: {{ $job->location }}</p>
                        <p class="m-0"><i class="fa fa-angle-right text-primary me-2"></i>Deadline:
                            {{ $job->deadline }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Job Detail End -->

@endsection
