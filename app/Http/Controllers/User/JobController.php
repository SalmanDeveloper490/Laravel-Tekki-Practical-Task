<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\JobApplication;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function index(Request $request, $id){
        // dd($id);
        $job = Job::find($id)->first();
        // dd($job);
        return view('jobs.index',compact('job'));
    }

    public function applyJob(Request $request, $id)
{
    try {
        $user = Auth::user();
        $job = Job::findOrFail($id);

        // Validate request data
        $request->validate([
            'resume' => 'required|mimes:pdf,doc,docx|max:2048',
        ]);

        // Save the user's resume file
        $resumeName = time() . '_' . $request->file('resume')->getClientOriginalName();
        $request->file('resume')->storeAs('public/resumes', $resumeName);

        // Create a new job application
        $jobApplication = new JobApplication([
            'user_id' => $user->id,
            'job_id' => $job->id,
            'resume' => $resumeName,
        ]);

        $jobApplication->save();

        return redirect()->back()->with('success', 'Job application submitted successfully.');
    } catch (\Exception $e) {
        return $e->getMessage();
    }
}

    // public function jobApplications(){
    //     $applications = Auth::user()->jobApplications;
    //     return view('job-applications', ['applications' => $applications]);
    // }

    // public function showAppliedJobs(){
    // $user = User::find(Auth::user()->id);
    // $jobApplications = $user->jobApplications()->with('job')->get();

    // return view('applied-jobs', ['jobApplications' => $jobApplications]);
    // }

    // public function jobApplications()
    // {
    //     $user = Auth::user();
    //     $jobApplications = $user->jobApplications()->with('job')->get();
    //     return view('applied_jobs', compact('jobApplications'));
    // }

    public function appliedJobs()
    {  
        try {
            $user = Auth::user();
            $jobApplications = $user->jobApplications()->with('job')->orderByDesc('created_at')->get();
            // dd($jobApplications);
            return view('jobs.applied-jobs', compact('jobApplications'));
        }catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
