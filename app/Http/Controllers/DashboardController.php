<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'seeker') {
            $applications = Application::where('user_id', $user->id)->with('job')->latest()->get();
            $jobsCount = Job::count();
            $applicationsCount = $applications->count();

            return view('dashboard', compact('applications', 'jobsCount', 'applicationsCount'));
        }

        if ($user->role === 'company' || $user->role === 'admin') {
            $jobs = Job::where('user_id', $user->id)->with('applications')->latest()->get();
            $jobsCount = $jobs->count();

            $applicationsCount = Application::whereHas('job', function ($query) use ($user) {
                if ($user->role !== 'admin') {
                    $query->where('user_id', $user->id);
                }
            })->count();

            $pendingCount = Application::whereHas('job', function ($query) use ($user) {
                if ($user->role !== 'admin') {
                    $query->where('user_id', $user->id);
                }
            })->where('status', 'pending')->count();

            $acceptedCount = Application::whereHas('job', function ($query) use ($user) {
                if ($user->role !== 'admin') {
                    $query->where('user_id', $user->id);
                }
            })->where('status', 'accepted')->count();

            return view('dashboard', compact('jobs', 'jobsCount', 'applicationsCount', 'pendingCount', 'acceptedCount'));
        }

        return view('dashboard');
    }
}