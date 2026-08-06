<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{
    /**
     * إنشاء مكون التخطيط الرئيسي للتطبيق.
     */
    public function __construct()
    {
        //
    }

    /**
     * عرض ملف الـ Layout الرئيسي.
     */
    public function render(): View
    {
        return view('layouts.app');
    }
}