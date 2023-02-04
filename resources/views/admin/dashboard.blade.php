@extends('layouts.admin.master')

@section('content')
@section('content')

<div class="row">
    <div class="col-xl-3 col-md-6">
        <!-- card -->
        <div class="card card-h-100 text-white bg-success">
            <!-- card body -->
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-6">
                        <span class="mb-3 lh-1 d-block text-truncate">Total customer</span>
                        <h4 class="mb-3 text-white">
                            {{-- <span class="counter-value" data-target="{{ $n_member }}">0</span> --}}
                        </h4>
                    </div>
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->

    <div class="col-xl-3 col-md-6">
        <!-- card -->
        <div class="card card-h-100 text-white bg-danger">
            <!-- card body -->
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-6">
                        <span class="mb-3 lh-1 d-block text-truncate">Number of video</span>
                        <h4 class="mb-3 text-white">
                            {{-- <span class="counter-value" data-target="{{ $n_video }}">0</span> --}}
                        </h4>
                    </div>
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col-->

    <div class="col-xl-3 col-md-6">
        <!-- card -->
        <div class="card card-h-100 bg-warning text-white">
            <!-- card body -->
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-6">
                        <span class="mb-3 lh-1 d-block text-truncate">Total course</span>
                        <h4 class="mb-3 text-white">
                            {{-- <span class="counter-value" data-target="{{ $n_course }}">0</span> --}}
                        </h4>
                    </div>
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->

    <div class="col-xl-3 col-md-6">
        <!-- card -->
        <div class="card card-h-100 bg-primary text-white">
            <!-- card body -->
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-6">
                        <span class="mb-3 lh-1 d-block text-truncate">Number of orders</span>
                        <h4 class="mb-3 text-white">
                            {{-- <span class="counter-value" data-target="1">0</span> --}}
                        </h4>
                    </div>
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->
</div><!-- end row-->
@endsection