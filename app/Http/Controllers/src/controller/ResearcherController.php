<?php

namespace App\Http\Controllers\src\controller;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResearcherController extends Controller
{
    public function researcherIndex()
    {
        return view('layouts.researcher.dashboard');
    }

    public function researcherLogout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function researcherProfile()
    {
        $id = Auth::user()->id;
        $pdata = User::find($id);


        return view('layouts.researcher.profile', compact('pdata'));
    }
}
