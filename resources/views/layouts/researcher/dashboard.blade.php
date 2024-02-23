@extends('index')
@section('title', 'Dashboard')
@section('content')
<div class="main-wrapper">
    @include('layouts.researcher.body.header')
    @include('layouts.researcher.body.sidebar')

    <div class="page-wrapper">
        <div class="content">
            <!-- Page Header -->
            <div class="page-header">
                <!-- <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Dashboard </a></li>
                        </ul>
                    </div>
                </div> -->
            </div>
            <!-- /Page Header -->

            <div class="good-morning-blk">
                <div class="row">
                    <div class="col-md-6">
                        <div class="morning-user">
                            @php
                            $hour = \Carbon\Carbon::now()->hour;
                            if ($hour >= 5 && $hour <= 11) { $greeting="Good Morning" ; } elseif ($hour>= 12 && $hour <= 17) { $greeting="Good Afternoon" ; } else { $greeting="Good Evening" ; } @endphp <h2>{{ $greeting }}, <span>{{ Auth::user()->fname }}</span></h2>
                                    <p>Have a nice day at work</p>
                        </div>
                    </div>
                    <div class="col-md-6 position-blk">
                        <div class="morning-img">
                            <img src="assets/img/morning-img-01.png" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="sidebar-overlay" data-reff=""></div>
</div>
@endsection