<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('sort_order')->get();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price_start' => 'required|integer|min:0',
            'features' => 'nullable|string',
            'icon' => 'nullable|string|max:100',
            'image' => 'nullable|image|max:2048',
            'whatsapp_text' => 'nullable|string|max:500',
            'sort_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $data['slug'] = Str::slug($data['name']);
        $data['is_active'] = $request->has('is_active');
        $data['icon'] = $data['icon'] ?? 'fa-paint-brush';
        $data['sort_order'] = $data['sort_order'] ?? 0;

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('services', 'public');
        }

        if (isset($data['features'])) {
            $data['features'] = array_filter(array_map('trim', explode("\n", $data['features'])));
        }

        Service::create($data);

        return redirect()->route('admin.services.index')->with('success', 'Layanan berhasil ditambahkan!');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price_start' => 'required|integer|min:0',
            'features' => 'nullable|string',
            'icon' => 'nullable|string|max:100',
            'image' => 'nullable|image|max:2048',
            'whatsapp_text' => 'nullable|string|max:500',
            'sort_order' => 'nullable|integer',
        ]);

        $data['slug'] = Str::slug($data['name']);
        $data['is_active'] = $request->has('is_active');
        $data['icon'] = $data['icon'] ?? 'fa-paint-brush';
        $data['sort_order'] = $data['sort_order'] ?? 0;

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('services', 'public');
        }

        if (isset($data['features'])) {
            $data['features'] = array_filter(array_map('trim', explode("\n", $data['features'])));
        }

        $service->update($data);

        return redirect()->route('admin.services.index')->with('success', 'Layanan berhasil diperbarui!');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.services.index')->with('success', 'Layanan berhasil dihapus!');
    }

    public function toggle(Service $service)
    {
        $service->update(['is_active' => !$service->is_active]);
        return back()->with('success', 'Status berhasil diubah!');
    }
}
