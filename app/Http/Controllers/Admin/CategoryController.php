<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Menampilkan daftar kategori.
     */
    public function index()
    {
        $categories = Category::with('parent')
            ->orderBy('parent_id')
            ->orderBy('name')
            ->get();

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Form tambah kategori.
     */
    public function create()
    {
        $parents = Category::whereNull('parent_id')->orderBy('name')->get();

        return view('admin.categories.create', compact('parents'));
    }


    /**
     * Simpan kategori baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:categories,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'description' => 'nullable|string',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['slug'] = Str::slug($validated['name']);
        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('categories', 'public');
        }

        Category::create($validated);

        return redirect()->route('admin.categories.index')->with('success', 'Kategori berhasil ditambahkan');
    }

    /**
     * Form edit kategori.
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $parents = Category::whereNull('parent_id')
            ->where('id', '!=', $id)
            ->get();

        return view('admin.categories.edit', compact('category', 'parents'));
    }


    /**
     * Update kategori.
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:categories,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'description' => 'nullable|string',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['slug'] = Str::slug($validated['name']);
        $validated['is_active'] = $request->has('is_active');

        // ✅ Jika user klik "hapus gambar lama"
        if ($request->remove_old_image == 1 && $category->image) {
            Storage::disk('public')->delete($category->image);
            $validated['image'] = null;
        }

        // ✅ Jika upload gambar baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($category->image) {
                Storage::disk('public')->delete($category->image);
            }

            // Simpan gambar baru
            $validated['image'] = $request->file('image')->store('categories', 'public');
        }

        $category->update($validated);

        return redirect()->route('admin.categories.index')->with('success', 'Kategori berhasil diperbarui');
    }

    /**
     * show kategori.
     */
    public function show(Category $category)
    {
        // Jika ingin memuat parent untuk tampil di view
        $category->load('parent');
        return view('admin.categories.show', compact('category'));
    }

    /**
     * Hapus kategori.
     */
    public function destroy(Category $category)
    {
        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        }

        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Kategori berhasil dihapus');
    }
}
