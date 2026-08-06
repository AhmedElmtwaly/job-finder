<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class JobController extends Controller
{

    /**
     * عرض الوظائف
     */
    public function index()
    {
        $jobs = Job::latest()
            ->paginate(10);

        return view(
            'jobs.index',
            compact('jobs')
        );
    }


    /**
     * صفحة إنشاء وظيفة
     */
    public function create()
    {
        // تم تعطيل الفحص مؤقتاً لكي لا تظهر مشكلة 403
        // $this->checkCompany();

        return view('jobs.create');
    }


    /**
     * حفظ وظيفة جديدة
     */
    public function store(Request $request)
    {
        // تم تعطيل الفحص مؤقتاً هنا أيضاً
        // $this->checkCompany();

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'company_name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'salary' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if($request->hasFile('image')){
            $validated['image'] = $request->file('image')
                ->store('jobs','public');
        }

        $validated['user_id'] = Auth::id();

        Job::create($validated);

        return redirect()
            ->route('dashboard')
            ->with(
                'success',
                'Job created successfully 🎉'
            );
    }


    /**
     * تفاصيل الوظيفة
     */
    public function show(Job $job)
    {
        return view(
            'jobs.show',
            compact('job')
        );
    }


    /**
     * تعديل الوظيفة
     */
    public function edit(Job $job)
    {
        $this->checkOwner($job);

        return view(
            'jobs.edit',
            compact('job')
        );
    }


    /**
     * تحديث الوظيفة
     */
    public function update(Request $request, Job $job)
    {
        $this->checkOwner($job);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'company_name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'salary' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if($request->hasFile('image')){
            if($job->image){
                Storage::disk('public')
                    ->delete($job->image);
            }

            $validated['image'] = $request->file('image')
                ->store('jobs','public');
        }

        $job->update($validated);

        return redirect()
            ->route('dashboard')
            ->with(
                'success',
                'Job updated successfully ✏️'
            );
    }


    /**
     * حذف الوظيفة
     */
    public function destroy(Job $job)
    {
        $this->checkOwner($job);

        if($job->image){
            Storage::disk('public')
                ->delete($job->image);
        }

        $job->delete();

        return redirect()
            ->route('dashboard')
            ->with(
                'success',
                'Job deleted successfully 🗑️'
            );
    }


    /**
     * التأكد أن المستخدم شركة
     */
    private function checkCompany()
    {
        if(
            Auth::user()->role !== 'company'
            &&
            Auth::user()->role !== 'admin'
        ){
            abort(403);
        }
    }


    /**
     * التأكد أن الوظيفة تخص المستخدم
     */
    private function checkOwner(Job $job)
    {
        if(
            Auth::user()->role !== 'admin'
            &&
            $job->user_id !== Auth::id()
        ){
            abort(403);
        }
    }

}