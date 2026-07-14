<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Package;
use App\Models\Portfolio;
use App\Models\Testimonial;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'services' => Service::count(),
            'packages' => Package::count(),
            'portfolios' => Portfolio::count(),
            'testimonials' => Testimonial::count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
