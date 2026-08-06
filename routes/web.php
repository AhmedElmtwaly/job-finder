<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ApplicationController;

// الصفحة الرئيسية
Route::get('/', function () {
    return view('welcome');
});

// الروابط التي تتطلب تسجيل دخول
Route::middleware(['auth', 'verified'])->group(function () {

    // لوحة التحكم العامة
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // صفحة About
    Route::view('/about', 'about')->name('about');

    // صفحة Contact
    Route::view('/contact', 'contact')->name('contact');

    // الملف الشخصي
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // تصفح الوظائف المتاحة للباحث (الصفحة التي تحتوي على زر Apply Now)
    Route::get('/browse-jobs', function () {
        $jobs = \App\Models\Job::all();
        return view('jobs.browse', compact('jobs'));
    })->name('jobs.browse');

    // التقديم على الوظائف (للـ Seeker)
    Route::get('/jobs/{job}/apply', [ApplicationController::class, 'create'])->name('jobs.apply');
    Route::post('/jobs/{job}/apply', [ApplicationController::class, 'store'])->name('jobs.store.application');

    // تتبع الطلبات الخاصة بالباحث
    Route::get('/my-applications', [ApplicationController::class, 'index'])->name('applications.index');

    // مسارات تعديل وتحديث وحذف طلب التقديم للباحث
    Route::get('/applications/{application}/edit', [ApplicationController::class, 'edit'])->name('applications.edit');
    Route::put('/applications/{application}', [ApplicationController::class, 'update'])->name('applications.update');
    Route::delete('/applications/{application}', [ApplicationController::class, 'destroy'])->name('applications.destroy');
});

// روابط الشركات والـ Admin لإدارة الوظائف والمتقدمين
Route::middleware(['auth', 'verified'])->prefix('company')->name('company.')->group(function () {

    // إدارة الوظائف (Add, Update, Delete باستخدام Resource Route)
    Route::resource('jobs', JobController::class);

    // صفحة عرض المتقدمين على الوظائف (الموظفين)
    Route::get('/applicants', [ApplicationController::class, 'indexAdmin'])->name('applicants.index');

    // زر قبول أو رفض الـ CV (تحديث حالة الطلب)
    Route::patch('/applications/{application}/status', [ApplicationController::class, 'updateStatus'])->name('applications.status');
});

require __DIR__.'/auth.php';
