<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller {
    // public function index()
    // {
    //     $jobs = Job::latest()->paginate(10);
    //     return view('admin.jobs.index', compact('jobs'));
    // }

    public function create()
    {
        return view('admin.jobs.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'qualification' => 'required',
            'no_of_openings' => 'required|numeric',
            'dept' => 'required',
            'salary' => 'required|numeric',
        ]);

        $job = Job::create($validatedData);

        return redirect()->back()->with('success', 'Job created successfully!');
    }

    public function edit(Job $job)
    {
        return view('admin.jobs.edit', compact('job'));
    }

    public function update(Request $request, Job $job)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'qualification' => 'required',
            'no_of_openings' => 'required|numeric',
            'dept' => 'required',
            'salary' => 'required|numeric',
        ]);

        $job->update($validatedData);

        return redirect()->back()->with('success', 'Job updated successfully!');
    }

    public function destroy(Job $job)
    {
        $job->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Job deleted successfully!');
    }
}