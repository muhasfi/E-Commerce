<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PriceList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PriceListController extends Controller
{
    /**
     * Tampilkan daftar PDF pricelist
     */
    public function index()
    {
        $pdfs = PriceList::latest()->get();
        return view('admin.price_lists.index', compact('pdfs'));
    }

    /**
     * Tampilkan form upload PDF baru
     */
    public function create()
    {
        return view('admin.price_lists.create');
    }

    /**
     * Simpan PDF baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'file' => 'required|mimes:pdf|max:10240', // max 10MB
        ]);

        // Upload file ke storage/app/public/pricelist
        $$path = $request->file('file')->store('pricelist', 'public');

        PriceList::create([
            'name' => $request->name,
            'file' => $path,
        ]);

        return redirect()->route('admin.price_lists.index')
                         ->with('success', 'PDF berhasil diupload.');
    }

    /**
     * Tampilkan flipbook PDF
     */
    public function show($id)
    {
        $priceList = PriceList::findOrFail($id);
        return view('admin.price_lists.show', compact('priceList'));
    }


    /**
     * Tampilkan form edit PDF
     */
    public function edit(PriceList $priceList)
    {
        return view('admin.price_lists.edit', compact('priceList'));
    }

    /**
     * Update data PDF
     */
    public function update(Request $request, PriceList $priceList)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'file' => 'nullable|mimes:pdf|max:10240',
        ]);

        $data = ['name' => $request->name];

        // Jika ada file baru diupload
        if ($request->hasFile('file')) {
            // Hapus file lama
            if (Storage::exists($priceList->file)) {
                Storage::delete($priceList->file);
            }

            // Simpan file baru
            $path = $request->file('file')->store('pricelist', 'public');
            $data['file'] = $path;
        }

        $priceList->update($data);

        return redirect()->route('admin.price_lists.index')
                         ->with('success', 'Data PDF berhasil diperbarui.');
    }

    /**
     * Hapus PDF
     */
    public function destroy(PriceList $priceList)
    {
        if (Storage::exists($priceList->file)) {
            Storage::delete($priceList->file);
        }

        $priceList->delete();

        return redirect()->route('admin.price_lists.index')
                         ->with('success', 'PDF berhasil dihapus.');
    }
}
