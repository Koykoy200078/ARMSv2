@extends('index')
@section('title', 'Research Project')
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
                            <li class="breadcrumb-item active">Research Projects</li>
                        </ul>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-12">
                    <div class="card-box">
                        <div class="card-block">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h4 class="text-base font-bold">Research Projects</h4>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Add
                                </button>
                            </div>

                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Funding Details</th>
                                            <th>Collaborators</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($projects as $project)
                                        <tr>
                                            <td>{{ $project->title }}</td>
                                            <td>{{ $project->description }}</td>
                                            <td>{{ $project->start_date }}</td>
                                            <td>{{ $project->end_date }}</td>
                                            <td>{{ $project->funding_details }}</td>
                                            <td>
                                                @foreach ($project->collaborators as $collaborator)
                                                <p style="text-align: center;">
                                                    <!-- {{ $collaborator->profile->fname }} {{ $collaborator->profile->lname }} -->
                                                    {{ optional($collaborator->profile)->fname ?? 'N/A' }} {{ optional($collaborator->profile)->lname ?? 'N/A' }}
                                                    @if (auth()->id() === $project->user_id)
                                                    <a href="{{ route('projects.removeCollaborator', ['project' => $project, 'collaborator' => $collaborator]) }}" onclick="return confirm('Are you sure you want to remove this collaborator?')" style="color: red; font-size: 16px; margin-left: 10px; font-weight: bold;">x</a>
                                                    @endif
                                                </p>
                                                @endforeach
                                            </td>
                                            <td style="width: 10%;">
                                                <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#view-{{ $project->id }}">
                                                    View
                                                </button>

                                                <button type="button" class="btn btn-primary w-100 mt-2" data-bs-toggle="modal" data-bs-target="#edit-{{ $project->id }}">
                                                    Edit
                                                </button>

                                                <button type="button" class="btn btn-success w-100 mt-2" data-bs-toggle="modal" data-bs-target="#addCollaborators-{{ $project->id }}">
                                                    Add Collaborators
                                                </button>

                                            </td>
                                        </tr>


                                        <!-- View Project Modal -->
                                        <div class="modal fade" id="view-{{ $project->id ?? '' }}" aria-labelledby="viewLabel-{{ $project->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="viewLabel">Project Details</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p><strong>ID:</strong> {{ $project->id  ?? '' }}</p>
                                                        <p><strong>Title:</strong> {{ $project->title  ?? '' }}</p>
                                                        <p><strong>Description:</strong> {{ $project->description  ?? '' }}</p>
                                                        <p><strong>Start Date:</strong> {{ $project->start_date  ?? '' }}</p>
                                                        <p><strong>End Date:</strong> {{ $project->end_date  ?? '' }}</p>
                                                        <p><strong>Funding Details:</strong> {{ $project->funding_details  ?? '' }}</p>
                                                        <p><strong>Collaborators:</strong></p>
                                                        @foreach ($projects as $project)
                                                        @foreach ($project->collaborators as $collaborator)
                                                        <p>{{ $collaborator->profile->fname  ?? 'N/A' }} {{ $collaborator->profile->lname  ?? 'N/A' }}</p>
                                                        @endforeach
                                                        @endforeach
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Edit Project Modal -->
                                        <div class="modal fade" id="edit-{{ $project->id }}" aria-labelledby="editLabel-{{ $project->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editLabel">Edit Project</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('projects.update', $project) }}" method="POST" id="updateForm">
                                                            @csrf
                                                            @method('PUT')
                                                            <label for="title">Title:</label><br>
                                                            <input type="text" id="title" name="title" value="{{ $project->title }}"><br>

                                                            <label for="description">Description:</label><br>
                                                            <textarea id="description" name="description">{{ $project->description }}</textarea><br>

                                                            <label for="start_date">Start Date:</label><br>
                                                            <input type="date" id="start_date" name="start_date" value="{{ $project->start_date }}"><br>

                                                            <label for="end_date">End Date:</label><br>
                                                            <input type="date" id="end_date" name="end_date" value="{{ $project->end_date }}"><br>

                                                            <label for="funding_details">Funding Details:</label><br>
                                                            <textarea id="funding_details" name="funding_details">{{ $project->funding_details }}</textarea><br>


                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary" form="updateForm">Update</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Add Collaborators Modal -->
                                        <div class="modal fade" id="addCollaborators-{{ $project->id }}" aria-labelledby="addCollaboratorsLabel-{{ $project->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="addCollaboratorsLabel{{ $project->id }}">Add Collaborators to {{ $project->title}}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" action="{{ route('projects.addCollaborators', $project) }}">
                                                            @csrf
                                                            <select name="collaborators[]" multiple>
                                                                <option value="">Select...</option>
                                                                @foreach ($users as $user)
                                                                @if ($user->id !== ($project->user_id ?? null))
                                                                <option value="{{ $user->id }}">{{ $user->email }}</option>
                                                                @endif
                                                                @endforeach
                                                            </select>
                                                            <button type="submit">Add Collaborators</button>
                                                        </form>
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


            <!-- Show Create Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Project</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('projects.store') }}" method="POST" id="addForm">
                                @csrf
                                <label for="title">Title:</label><br>
                                <input type="text" id="title" name="title"><br>

                                <label for="description">Description:</label><br>
                                <textarea id="description" name="description"></textarea><br>

                                <label for="start_date">Start Date:</label><br>
                                <input type="date" id="start_date" name="start_date"><br>

                                <label for="end_date">End Date:</label><br>
                                <input type="date" id="end_date" name="end_date"><br>

                                <label for="funding_details">Funding Details:</label><br>
                                <textarea id="funding_details" name="funding_details"></textarea><br>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" form="addForm">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection