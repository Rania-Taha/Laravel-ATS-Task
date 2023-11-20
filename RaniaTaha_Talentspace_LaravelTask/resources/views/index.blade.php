@extends('Frontend.Layouts.master')
@section('title', 'Jobs List')

@section('content')


    <!-- Header End -->
    <div class="container-xxl py-5 bg-dark page-header mb-5">
        <div class="container my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Job List</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb text-uppercase">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Job List</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Header End -->


    <!-- Jobs Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Job Listing</h1>
            <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <!-- Check if $job_post is not empty -->
                        @if ($job_posts->isNotEmpty())
                            @foreach ($job_posts as $jobs)
                                <div class="job-item p-4 mb-4">
                                    <div class="row g-4">
                                        <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                            <img class="flex-shrink-0 img-fluid border rounded"
                                                src="Frontend/img/talentspace_logo1.png" alt=""
                                                style="width: 80px; height: 80px;">
                                            <div class="text-start ps-4">
                                                <h5 class="mb-3">{{ $jobs->title }}</h5>
                                                <span class="text-truncate me-3"><i
                                                        class="fa fa-map-marker-alt text-primary me-2"></i>{{ $jobs->location }}</span>
                                                <span class="text-truncate me-3"><i
                                                        class="far fa-clock text-primary me-2"></i>{{ $jobs->job_type }}</span>
                                            </div>
                                        </div>
                                        <div
                                            class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                            <div class="d-flex mb-3">
                                                <a class="btn btn-primary"
                                                    href="{{ route('apply', ['id' => $jobs->id]) }}">Apply Now</a>
                                            </div>
                                            <small class="text-truncate"><i
                                                    class="far fa-calendar-alt text-primary me-2"></i>Date Line:
                                                {{ $jobs->deadline }}</small>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>No jobs available at the moment.</p>
                        @endif
                        <a class="btn btn-primary py-3 px-5" href="">Browse More Jobs</a>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <!-- Jobs End -->


@endsection
