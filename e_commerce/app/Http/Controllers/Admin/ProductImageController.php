<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductImage;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductImageController extends Controller
{
    /**
     * Display a listing of the product images.
     */

    public function index()
    {
        // Ambil produk yang punya gambar, dengan hitung jumlah gambar
        $products = Product::whereHas('images')
            ->withCount('images')
            ->with(['images' => function($query) {
                $query->latest()->limit(1); // Ambil 1 gambar terbaru sebagai preview
            }])
            ->latest()
            ->get();

        return view('admin.product_images.index', compact('products'));
    }

    /**
     * Show the form for creating a new product image.
     */
    public function show($productId)
    {
        $product = Product::with('images')->findOrFail($productId);
        
        return view('admin.product_images.show', compact('product'));
    }

    public function create()
    {
        $products = Product::orderBy('name')->get();
        return view('admin.product_images.create', compact('products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'images' => 'required|array|min:1',
            'images.*' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('product_images', 'public');
                
                ProductImage::create([
                    'product_id' => $validated['product_id'],
                    'image' => $path,
                ]);
            }
        }

        return redirect()->route('admin.product_images.show', $validated['product_id'])
            ->with('success', 'Gambar produk berhasil ditambahkan.');
    }

    public function edit($id)
    {
        // Redirect ke show untuk edit gambar
        $image = ProductImage::findOrFail($id);
        return redirect()->route('admin.product_images.show', $image->product_id);
    }

    public function update(Request $request, $id)
    {
        // Optional: jika mau update gambar individual
        $image = ProductImage::findOrFail($id);
        
        $validated = $request->validate([
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Hapus gambar lama
            if ($image->image && Storage::disk('public')->exists($image->image)) {
                Storage::disk('public')->delete($image->image);
            }
            
            $path = $request->file('image')->store('product_images', 'public');
            $image->update(['image' => $path]);
        }

        return redirect()->route('admin.product_images.show', $image->product_id)
            ->with('success', 'Gambar berhasil diupdate.');
    }

    public function destroy($id)
    {
        $image = ProductImage::findOrFail($id);
        $productId = $image->product_id;

        // Hapus file dari storage
        if ($image->image && Storage::disk('public')->exists($image->image)) {
            Storage::disk('public')->delete($image->image);
        }

        $image->delete();

        return redirect()->route('admin.product_images.show', $productId)
            ->with('success', 'Gambar berhasil dihapus.');
    }
}