<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Models\User;
use Inertia\Inertia;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::with(['client', 'accountManager', 'projectManager'])
            ->latest()
            ->paginate(10);
        
        return Inertia::render('projects/index', [
            'projects' => $projects
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = User::clients()->where('is_active', true)->get(['id', 'name']);
        $accountManagers = User::accountManagers()->where('is_active', true)->get(['id', 'name']);
        $projectManagers = User::projectManagers()->where('is_active', true)->get(['id', 'name']);

        return Inertia::render('projects/create', [
            'clients' => $clients,
            'account_managers' => $accountManagers,
            'project_managers' => $projectManagers,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $project = Project::create($request->validated());

        return redirect()->route('projects.show', $project)
            ->with('success', 'Project created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $project->load(['client', 'accountManager', 'projectManager', 'tasks', 'attachments']);

        return Inertia::render('projects/show', [
            'project' => $project
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $clients = User::clients()->where('is_active', true)->get(['id', 'name']);
        $accountManagers = User::accountManagers()->where('is_active', true)->get(['id', 'name']);
        $projectManagers = User::projectManagers()->where('is_active', true)->get(['id', 'name']);

        return Inertia::render('projects/edit', [
            'project' => $project,
            'clients' => $clients,
            'account_managers' => $accountManagers,
            'project_managers' => $projectManagers,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $project->update($request->validated());

        return redirect()->route('projects.show', $project)
            ->with('success', 'Project updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index')
            ->with('success', 'Project deleted successfully.');
    }
}