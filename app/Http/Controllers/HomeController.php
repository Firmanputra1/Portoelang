<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Package;
use App\Models\Portfolio;
use App\Models\Testimonial;
use App\Models\Faq;
use App\Models\Client;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::active()->get();
        $packages = Package::active()->get();
        $portfolios = Portfolio::active()->take(12)->get();
        $testimonials = Testimonial::active()->take(6)->get();
        $faqs = Faq::active()->get();
        $clients = Client::active()->get();

        $settings = Setting::all()->pluck('value', 'key');

        return view('pages.home', compact(
            'services', 'packages', 'portfolios', 'testimonials', 'faqs', 'clients', 'settings'
        ));
    }
}
