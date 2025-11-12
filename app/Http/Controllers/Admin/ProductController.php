<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Tampilkan daftar produk
     */
    public function index()
    {
        $products = Product::with(['category', 'brand', 'images'])->latest()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Form tambah produk
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.products.create', compact('categories', 'brands'));
    }

    /**
     * Simpan produk baru beserta multiple image
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id'    => 'required|exists:categories,id',
            'brand_id'       => 'nullable|exists:brands,id',
            'name'           => 'required|string|max:255',
            'description'    => 'nullable|string',
            'price'          => 'required|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0',
            'is_active'      => 'boolean',
            'image'          => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'images.*'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        DB::beginTransaction();

        try {
            // Upload gambar utama
            $mainImage = $request->hasFile('image')
                ? $request->file('image')->store('products', 'public')
                : null;

            // Simpan produk
            $product = Product::create([
                'category_id'    => $request->category_id,
                'brand_id'       => $request->brand_id,
                'name'           => $request->name,
                'slug'           => Str::slug($request->name),
                'description'    => $request->description,
                'price'          => $request->price,
                'discount_price' => $request->discount_price,
                'image'          => $mainImage,
                'is_active'      => $request->boolean('is_active', true),
            ]);

            // Simpan multiple image (gallery)
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $img) {
                    $path = $img->store('product_images', 'public');
                    ProductImage::create([
                        'product_id' => $product->id,
                        'image'      => $path,
                    ]);
                }
            }

            DB::commit();
            return redirect()
                ->route('admin.products.index')
                ->with('success', 'Produk berhasil ditambahkan.');
        } catch (\Throwable $e) {
            DB::rollBack();
            return back()
                ->withErrors(['error' => 'Gagal menyimpan produk: ' . $e->getMessage()])
                ->withInput();
        }
    }

    /**
     * Tampilkan detail produk
     */
    public function show($id)
    {
        $product = Product::with(['category', 'brand', 'images'])->findOrFail($id);
        return view('admin.products.show', compact('product'));
    }

    /**
     * Form edit produk
     */
    public function edit($id)
    {
        $product = Product::with('images')->findOrFail($id);
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.products.edit', compact('product', 'categories', 'brands'));
    }

    /**
     * Update produk dan gambar
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'category_id'    => 'required|exists:categories,id',
            'brand_id'       => 'nullable|exists:brands,id',
            'name'           => 'required|string|max:255',
            'description'    => 'nullable|string',
            'price'          => 'required|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0',
            'is_active'      => 'boolean',
            'image'          => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'images.*'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        DB::beginTransaction();

        try {
            // Ganti gambar utama jika ada upload baru
            if ($request->hasFile('image')) {
                if ($product->image && Storage::disk('public')->exists($product->image)) {
                    Storage::disk('public')->delete($product->image);
                }
                $product->image = $request->file('image')->store('products', 'public');
            }

            // Update field lain
            $product->update([
                'category_id'    => $request->category_id,
                'brand_id'       => $request->brand_id,
                'name'           => $request->name,
                'slug'           => Str::slug($request->name),
                'description'    => $request->description,
                'price'          => $request->price,
                'discount_price' => $request->discount_price,
                'image'          => $product->image,
                'is_active'      => $request->boolean('is_active', true),
            ]);

            // Upload gambar tambahan baru
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $img) {
                    $path = $img->store('product_images', 'public');
                    ProductImage::create([
                        'product_id' => $product->id,
                        'image'      => $path,
                    ]);
                }
            }

            DB::commit();
            return redirect()
                ->route('admin.products.index')
                ->with('success', 'Produk berhasil diperbarui.');
        } catch (\Throwable $e) {
            DB::rollBack();
            return back()
                ->withErrors(['error' => 'Gagal memperbarui produk: ' . $e->getMessage()])
                ->withInput();
        }
    }

    /**
     * Hapus produk dan semua gambar terkait
     */
    public function destroy($id)
    {
        $product = Product::with('images')->findOrFail($id);

        try {
            // Hapus gambar utama
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }

            // Hapus semua gambar tambahan
            foreach ($product->images as $img) {
                if (Storage::disk('public')->exists($img->image)) {
                    Storage::disk('public')->delete($img->image);
                }
                $img->delete();
            }

            $product->delete();

            return redirect()
                ->route('admin.products.index')
                ->with('success', 'Produk berhasil dihapus.');
        } catch (\Throwable $e) {
            return back()->withErrors(['error' => 'Gagal menghapus produk: ' . $e->getMessage()]);
        }
    }
}
