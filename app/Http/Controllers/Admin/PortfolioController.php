<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\Service;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::with('service')->orderBy('sort_order')->get();
        return view('admin.portfolios.index', compact('portfolios'));
    }

    public function create()
    {
        $services = Service::orderBy('name')->get();
        return view('admin.portfolios.create', compact('services'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'service_id' => 'nullable|exists:services,id',
            'category' => 'required|string|max:100',
            'client_name' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:4096',
            'sort_order' => 'nullable|integer',
        ]);

        $data['is_active'] = $request->has('is_active');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('portfolios', 'public');
        }

        Portfolio::create($data);
        return redirect()->route('admin.portfolios.index')->with('success', 'Portfolio berhasil ditambahkan!');
    }

    public function edit(Portfolio $portfolio)
    {
        $services = Service::orderBy('name')->get();
        return view('admin.portfolios.edit', compact('portfolio'), compact('services'));
    }

    public function update(Request $request, Portfolio $portfolio)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'service_id' => 'nullable|exists:services,id',
            'category' => 'required|string|max:100',
            'client_name' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:4096',
            'sort_order' => 'nullable|integer',
        ]);

        $data['is_active'] = $request->has('is_active');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('portfolios', 'public');
        }

        $portfolio->update($data);
        return redirect()->route('admin.portfolios.index')->with('success', 'Portfolio berhasil diperbarui!');
    }

    public function destroy(Portfolio $portfolio)
    {
        $portfolio->delete();
        return redirect()->route('admin.portfolios.index')->with('success', 'Portfolio berhasil dihapus!');
    }

    public function toggle(Portfolio $portfolio)
    {
        $portfolio->update(['is_active' => !$portfolio->is_active]);
        return back()->with('success', 'Status berhasil diubah!');
    }
}
