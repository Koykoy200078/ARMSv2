<?php

namespace App\Http\Controllers\src;

use App\Http\Controllers\Controller;
use App\Models\PublishResearch;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PublishResearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publishResearch = PublishResearch::all();
        return view('layouts.researcher.publish_research.index', compact('publishResearch'));
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
            'author' => 'required|max:255',
            'publication_date' => 'required|date_format:d/m/Y',
            'conference_journal_info' => 'required',
        ]);

        $validatedData['publication_date'] = Carbon::createFromFormat('d/m/Y', $validatedData['publication_date'])->format('Y-m-d');

        PublishResearch::create($validatedData);
        return redirect()->route('publish.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
