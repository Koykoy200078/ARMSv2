<?php

namespace App\Http\Controllers\src;

use App\Http\Controllers\Controller;
use App\Models\ResearchProject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class ResearchProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $projects = ResearchProject::where('user_id', $user->id)
            ->orWhereHas('collaborators', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })
            ->get();
        $users = User::all();
        return view('layouts.researcher.research_project.index', compact('projects', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'funding_details' => 'required',
        ]);

        $projectData = Arr::except($validatedData, ['collaborators']);
        $projectData['user_id'] = auth()->id();
        $project = ResearchProject::create($projectData);

        if (isset($validatedData['collaborators'])) {
            // Sync the collaborators
            $project->collaborators()->sync($validatedData['collaborators']);
        }

        return redirect()->route('projects.index');
    }

    public function update(Request $request, ResearchProject $project)
    {
        $project->update($request->all());

        return redirect()->route('projects.index');
    }

    public function addCollaborators(ResearchProject $project, Request $request)
    {
        $validatedData = $request->validate([
            'collaborators' => 'required|array',
        ]);

        $project->collaborators()->sync($validatedData['collaborators']);

        return redirect()->route('projects.index');
    }

    public function removeCollaborator(ResearchProject $project, User $collaborator)
    {
        if (auth()->id() !== $project->user_id) {
            // The user is not the project creator. Show an error message or redirect.
            return redirect()->route('projects.index')->with('error', 'You do not have permission to remove collaborators.');
        }

        $project->collaborators()->detach($collaborator);
        return back();
    }
}
