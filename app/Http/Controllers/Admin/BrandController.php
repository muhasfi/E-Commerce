<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
     /**
     * Tampilkan daftar brand.
     */
    public function index()
    {
        $brands = Brand::latest()->paginate(10);
        return view('admin.brands.index', compact('brands'));
    }

    /**
     * Tampilkan form tambah brand.
     */
    public function create()
    {
        return view('admin.brands.create');
    }

    /**
     * Simpan data brand baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'      => 'required|string|max:255|unique:brands,name',
            'logo'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'is_active' => 'boolean',
        ]);

        $slug = Str::slug($validated['name']);
        $logoPath = null;

        // Upload logo jika ada
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('brands', 'public');
        }

        Brand::create([
            'name'      => $validated['name'],
            'slug'      => $slug,
            'logo'      => $logoPath,
            'is_active' => $request->boolean('is_active', true),
        ]);

        return redirect()->route('admin.brands.index')->with('success', 'Brand berhasil ditambahkan.');
    }

    /**
     * Tampilkan detail brand.
     */
    public function show(Brand $brand)
    {
        return view('admin.brands.show', compact('brand'));
    }

    /**
     * Tampilkan form edit brand.
     */
    public function edit(Brand $brand)
    {
        return view('admin.brands.edit', compact('brand'));
    }

    /**
     * Update data brand.
     */
    public function update(Request $request, Brand $brand)
    {
        $validated = $request->validate([
            'name'      => 'required|string|max:255|unique:brands,name,' . $brand->id,
            'logo'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'is_active' => 'boolean',
        ]);

        $slug = Str::slug($validated['name']);

        // Cek jika user centang checkbox hapus logo
        if ($request->has('remove_old_logo') && $request->remove_old_logo == 1) {
            if ($brand->logo && Storage::disk('public')->exists($brand->logo)) {
                Storage::disk('public')->delete($brand->logo);
            }
            $brand->logo = null;
        }

        // Jika ada logo baru, hapus yang lama dan upload baru
        if ($request->hasFile('logo')) {
            if ($brand->logo && Storage::disk('public')->exists($brand->logo)) {
                Storage::disk('public')->delete($brand->logo);
            }

            $brand->logo = $request->file('logo')->store('brands', 'public');
        }

        $brand->update([
            'name'      => $validated['name'],
            'slug'      => $slug,
            'logo'      => $brand->logo,
            'is_active' => $request->boolean('is_active', true),
        ]);

        return redirect()->route('admin.brands.index')->with('success', 'Brand berhasil diperbarui.');
    }

    /**
     * Hapus brand.
     */
    public function destroy(Brand $brand)
    {
        // Hapus logo jika ada
        if ($brand->logo && Storage::disk('public')->exists($brand->logo)) {
            Storage::disk('public')->delete($brand->logo);
        }

        $brand->delete();

        return redirect()->route('admin.brands.index')->with('success', 'Brand berhasil dihapus.');
    }
}
