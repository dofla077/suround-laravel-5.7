<?php

namespace App\Http\Controllers;

use App\Mail\ProjectCreated;
use App\Notifications\SubscriptionRenewlFailed;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ProjectsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        /*cache()->rememberForever('stats', function () {
            return ['lessons' => 1300, 'hours' => 5000, 'series' => 100];
        });*/

        return view('projects.index', [ 'projects' => auth()->user()->projects ]);
    }

    public function edit(Project $project)
    {
        return view('projects.edit', ['project' => $project]);
    }

    public function show(Project $project)
    {
       // $this->authorize('update', $project);
      //  abort_unless(\Gate::allows('update', $project), 403);

        return view('projects.show', ['project' => $project]);
    }

    public function create()
    {
        return view('projects.create');
    }

    public function update(Project $project)
    {
        $project->update($this->validateProjects());

        return redirect('/projects');
    }

    public function store()
    {
        $attributes = $this->validateProjects();

        $attributes['owner_id'] = auth()->id();

        $project = Project::create($attributes);

        //event(new \App\Events\ProjectCreated($project));

        auth()->user()->notify(new SubscriptionRenewlFailed());

        return redirect('/projects');

    }

    public function destroy(Project $project)
    {
     //   $this->authorize('update', $project);

        $project->delete();

        return redirect('/projects');
    }

    public function validateProjects()
    {
        return \request()->validate([
            'title' => 'required|min:3',
            'description' => 'required|min:3'
        ]);
    }
}
