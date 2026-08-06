<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ApplicationController extends Controller
{
    /**
     * عرض الطلبات الخاصة بالباحث عن عمل (Seeker)
     */
    public function index()
    {
        $applications = Application::where('user_id', Auth::id())
            ->with('job')
            ->latest()
            ->get();

        return view('applications.index', compact('applications'));
    }

    /**
     * صفحة التقديم على وظيفة
     */
    public function create(Job $job)
    {
        return view('jobs.apply', compact('job'));
    }

    /**
     * حفظ طلب التقديم (بدون قيود التكرار)
     */
    public function store(Request $request, Job $job)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'cv' => 'required|mimes:pdf|max:2048',
        ]);

        $cvPath = $request
            ->file('cv')
            ->store('cvs', 'public');

        Application::create([
            'job_id' => $job->id,
            'user_id' => Auth::id(),
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'cv_path' => $cvPath,
            'status' => 'pending',
        ]);

        return redirect()
            ->route('dashboard')
            ->with(
                'success',
                'Application submitted successfully 🎉'
            );
    }

    /**
     * تعديل الطلب
     */
    public function edit(Application $application)
    {
        $this->checkOwner($application);

        return view(
            'jobs.edit-application',
            compact('application')
        );
    }

    /**
     * تحديث الطلب
     */
    public function update(Request $request, Application $application)
    {
        $this->checkOwner($application);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'cv' => 'nullable|mimes:pdf|max:2048',
        ]);

        if($request->hasFile('cv')){
            if($application->cv_path){
                Storage::disk('public')
                    ->delete($application->cv_path);
            }

            $application->cv_path =
                $request->file('cv')
                ->store('cvs','public');
        }

        $application->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'cv_path' => $application->cv_path,
        ]);

        return redirect()
            ->route('dashboard')
            ->with(
                'success',
                'Application updated successfully ✏️'
            );
    }

    /**
     * حذف الطلب
     */
    public function destroy(Application $application)
    {
        $this->checkOwner($application);

        if($application->cv_path){
            Storage::disk('public')
                ->delete($application->cv_path);
        }

        $application->delete();

        return back()->with(
            'success',
            'Application deleted successfully 🗑️'
        );
    }

    /**
     * عرض المتقدمين للشركة
     */
    public function indexAdmin()
    {
        if(
            !in_array(
                auth()->user()->role,
                ['company','admin']
            )
        ){
            abort(403);
        }

        if(auth()->user()->role == 'admin'){
            $applications =
                Application::with('job')
                ->latest()
                ->get();
        }else{
            $applications =
                Application::whereHas(
                    'job',
                    function($query){
                        $query->where(
                            'user_id',
                            auth()->id()
                        );
                    }
                )
                ->with('job')
                ->latest()
                ->get();
        }

        return view(
            'admin.applications',
            compact('applications')
        );
    }

    /**
     * تغيير حالة الطلب
     */
    public function updateStatus(
        Request $request,
        Application $application
    ){
        if(auth()->user()->role !== 'company'
            &&
            auth()->user()->role !== 'admin'
        ){
            abort(403);
        }

        // تأكيد أن الشركة صاحبة الوظيفة
        if(
            auth()->user()->role === 'company'
            &&
            $application->job->user_id !== auth()->id()
        ){
            abort(403);
        }

        $request->validate([
            'status' => 'required|in:pending,accepted,rejected'
        ]);

        $application->update([
            'status' => $request->status
        ]);

        return back()->with(
            'success',
            'Application status updated ✅'
        );
    }

    /**
     * التحقق من صاحب الطلب
     */
    private function checkOwner(Application $application)
    {
        if($application->user_id !== auth()->id()){
            abort(403);
        }
    }
}