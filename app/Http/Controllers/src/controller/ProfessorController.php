<?php

namespace App\Http\Controllers\src\controller;

use App\Http\Controllers\Controller;
use App\Models\PublishResearch;
use App\Models\ResearchProject;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfessorController extends Controller
{
    public function professorIndex()
    {
        $publishedResearchCount = PublishResearch::count();
        $researchProjectCount = ResearchProject::count();

        $totalResearchCount = $publishedResearchCount + $researchProjectCount;

        return view(
            'layouts.professor.dashboard',
            compact('publishedResearchCount', 'researchProjectCount', 'totalResearchCount')
        );
    }

    public function professorLogout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
