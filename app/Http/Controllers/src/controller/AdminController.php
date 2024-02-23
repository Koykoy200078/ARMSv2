<?php

namespace App\Http\Controllers\src\controller;

use App\Http\Controllers\Controller;
use App\Models\PublishResearch;
use App\Models\ResearchProject;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function adminIndex()
    {
        $researcherCount = User::whereHas('role', function ($query) {
            $query->where('role', 'researcher');
        })->count();

        $professorCount = User::whereHas('role', function ($query) {
            $query->where('role', 'professor');
        })->count();

        $publishedResearchCount = PublishResearch::count();
        $researchProjectCount = ResearchProject::count();

        $totalResearchCount = $publishedResearchCount + $researchProjectCount;

        return view('layouts.admin.dashboard', compact('researcherCount', 'professorCount', 'publishedResearchCount', 'researchProjectCount', 'totalResearchCount'));
    }

    public function adminLogout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
    
}
