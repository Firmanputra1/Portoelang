<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Faq;
use App\Models\Package;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $services = Service::active()->get();
        $packages = Package::where('is_active', true)->orderBy('sort_order')->get();
        $portfolios = Portfolio::where('is_active', true)->orderBy('sort_order')->latest()->take(9)->get();
        $testimonials = Testimonial::where('is_active', true)->orderBy('sort_order')->get();
        $faqs = Faq::where('is_active', true)->orderBy('sort_order')->get();
        $clients = Client::where('is_active', true)->orderBy('sort_order')->get();
        $settings = Setting::pluck('value', 'key');

        return view('welcome', compact(
            'services', 'packages', 'portfolios',
            'testimonials', 'faqs', 'clients', 'settings'
        ));
    }

    public function portfolio(Request $request)
    {
        $query = Portfolio::where('is_active', true);

        if ($request->has('service') && $request->service) {
            $query->where('service_id', $request->service);
        }

        $portfolios = $query->orderBy('sort_order')->latest()->paginate(12);
        $services = Service::active()->get();

        return view('portfolio', compact('portfolios', 'services'));
    }

    public function contact()
    {
        $settings = Setting::pluck('value', 'key');
        return view('contact', compact('settings'));
    }
}
