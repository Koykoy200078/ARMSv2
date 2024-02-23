@extends('index')
@section('title', 'Publish Research')
@section('content')
<div class="main-wrapper">
    @include('layouts.researcher.body.header')
    @include('layouts.researcher.body.sidebar')

    <div class="page-wrapper">
        <div class="content">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('researcher.dashboard') }}">Dashboard </a></li>
                            <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                            <li class="breadcrumb-item active">Publish Research</li>
                        </ul>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-12">
                    <div class="card-box">
                        <div class="card-block">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h4 class="text-base font-bold">Publish Research</h4>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                                    Add
                                </button>
                            </div>

                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Authors</th>
                                            <th>Publication Date</th>
                                            <th>Conference/Journal Information</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($publishResearch as $research)
                                        <tr>
                                            <td>{{ $research->title }}</td>
                                            <td>{{ $research->author }}</td>
                                            <td>{{ \Carbon\Carbon::parse($research->publication_date)->format('d/m/Y') }}</td>
                                            <td>{!! $research->conference_journal_info !!}</td>
                                            <td style="width: 10%;">
                                                <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#view{{ $research->id }}">
                                                    View Publish Research
                                                </button>

                                                <button type="button" class="btn btn-success w-100 mt-2" data-bs-toggle="modal" data-bs-target="#view{{ $research->id }}">
                                                    Show
                                                </button>
                                            </td>
                                        </tr>

                                        <!-- Show Modal -->
                                        <div class="modal fade" id="view{{ $research->id }}" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="viewProjectModalLabel">Project Details</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p><strong>ID:</strong> {{ $research->id }}</p>
                                                        <p><strong>Title:</strong> {{ $research->title }}</p>
                                                        <p><strong>Author:</strong> {{ $research->author }}</p>
                                                        <p><strong>Publication Date:</strong> {{ \Carbon\Carbon::parse($research->publication_date)->format('d/m/Y')  }}</p>
                                                        <p><strong>Conference/Journal Information:</strong> {!! $research->conference_journal_info !!}</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- Show Create Modal -->
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog  modal-dialog-scrollable modal-fullscreen">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="addModalLabel">Publish Research</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('publish.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="input-block local-forms">
                                        <label>Title <span class="login-danger">*</span></label>
                                        <input class="form-control" type="text" placeholder="" id="title" name="title">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-6">
                                    <div class="input-block local-forms cal-icon">
                                        <label>Publication Date <span class="login-danger">*</span></label>
                                        <input class="form-control datetimepicker" type="text" id="publication_date" name="publication_date">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-6">
                                    <div class="input-block local-forms">
                                        <label>Author Name <span class="login-danger">*</span></label>
                                        <input class="form-control" type="text" placeholder="" id="author" name="author">
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-xl-12">
                                    <div class="input-block summer-mail">
                                        <textarea rows="4" cols="5" class="form-control summernote" placeholder="Conference/Journal Information" id="conference_journal_info" name="conference_journal_info"></textarea>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="doctor-submit text-end">
                                        <button type="submit" class="btn btn-primary submit-form me-2">Publish Research</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection