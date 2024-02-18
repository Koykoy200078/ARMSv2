@extends('index')
@section('title', 'Profile')

<div class="main-wrapper">
    @include('layouts.researcher.body.header')
    @include('layouts.researcher.body.sidebar')

    <div class="page-wrapper">
        <div class="content">

            <div class="row">
                <div class="col-sm-7 col-6">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('researcher.dashboard') }}">Dashboard </a></li>
                        <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                        <li class="breadcrumb-item active">My Profile</li>
                    </ul>
                </div>

                <div class="col-sm-5 col-6 text-end m-b-30">
                    <a href="edit-profile.html" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Edit Profile</a>
                </div>
            </div>
            <div class="card-box profile-header">
                <div class="row">
                    <div class="col-md-12">
                        <div class="profile-view">
                            <div class="profile-img-wrap">
                                <div class="profile-img">
                                    <a href="#"><img class="avatar" src="assets/img/doctor-03.jpg" alt=""></a>
                                </div>
                            </div>
                            <div class="profile-basic">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="profile-info-left">
                                            <h3 class="user-name m-t-0 mb-0">{{ $pdata->profile->fname }}</h3>
                                            <small class="text-muted">{{ $pdata->role->role}}</small>
                                            <div class="staff-id">Student ID : 000-000-000</div>
                                            <div class="staff-msg"><a href="chat.html" class="btn btn-primary">Send Message</a></div>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <ul class="personal-info">
                                            <li>
                                                <span class="title">Contact Number:</span>
                                                <span class="text"><a href="#">{{ $pdata->profile->contact_number }}</a></span>
                                            </li>
                                            <li>
                                                <span class="title">Email:</span>
                                                <span class="text"><a href="#">{{ $pdata->email}}</a></span>
                                            </li>

                                            <li>
                                                <span class="title">Address:</span>
                                                <span class="text">{{ $pdata->profile->address }}</span>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>