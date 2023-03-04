<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\JobController;
use Illuminate\Support\Facades\Route;
use App\Models\Job;
use App\Models\JobApplication;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $user = auth()->user();
    $jobApplications = JobApplication::where('user_id', $user->id)->get();
    $jobs = Job::latest()->paginate(5);
    return view('dashboard',['jobs'=>$jobs,'jobApplications'=>$jobApplications]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/admin/dashboard', function () {
    $jobs = Job::latest()->paginate(10);
    return view('admin.dashboard',compact('jobs'));
})->middleware(['auth:admin', 'verified'])->name('admin.dashboard');

require __DIR__.'/adminauth.php';