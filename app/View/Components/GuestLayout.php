<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class GuestLayout extends Component
{
    /**
     * عرض التخطيط الخاص بالزوار (غير المسجلين).
     */
    public function render(): View
    {
        return view('layouts.guest');
    }
}