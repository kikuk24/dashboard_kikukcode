<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Products::with('brand')->latest()->paginate(10);

        $data = [
            'products' => $products,
            'query' => null
        ];
        return view('clients.products.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brands::all();
        $data = [
            'title' => 'Tambah Produk',
            'brands' => $brands
        ];
        return view('admin.products.addproduct', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $product = new Products;
        $product->name = $request->name;
        $product->price = $request->harga;
        $product->description = $request->body;
        $product->discount = $request->diskon;
        $product->is_published = $request->publish;
        $product->meta_description = $request->brand_id;
        $product->brand_id = $request->brand_id;
        $product->slug = \Str::slug($request->name);
        $files = ['cover', 'image_1', 'image_2', 'image_3', 'image_4',];
        foreach ($files as $file) {
            if ($request->hasFile($file)) {
                $uploadFile = $request->file($file);
                $name = time()  . '.' . $uploadFile->getClientOriginalExtension();
                $path = $uploadFile->storeAs('produk', $name, 'public');

                $product->$file = $path;
            }
        }

        $product->save();
        return redirect()->route('dashboard.posts')->with('success', 'produk created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $product = Products::with('brand')->where('slug', $slug)->firstOrFail();
        $data = [
            'product' => $product
        ];
        return view('clients.products.detail', $data);
    }

    public function search(Request $request)
    {
        $search = $request->input('produk');
        $products = Products::where('name', 'like', '%' . $search . '%')->get();
        $data = [
            'products' => $products,
            'query' => $search
        ];
        return view('clients.products.index', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        //
        $product = Products::find($id);

        if (!$product) {
            return redirect()->route('products.index')->with('error', 'Produk tidak ditemukan');
        }

        // Perbarui atribut produk
        $product->name = $request->name;
        $product->price = $request->harga;
        $product->description = $request->body;
        $product->discount = $request->diskon;
        $product->is_published = $request->publish;
        $product->brand_id = $request->brand_id;
        $product->slug = \Str::slug($request->name);

        // Daftar file yang mungkin terkait dengan produk
        $files = ['cover', 'image_1', 'image_2', 'image_3', 'image_4'];

        // Perbarui file terkait jika ada
        foreach ($files as $file) {
            if ($request->hasFile($file)) {
                // Hapus file lama jika ada
                if ($product->$file) {
                    Storage::disk('public')->delete($product->$file);
                }

                // Simpan file baru
                $uploadFile = $request->file($file);
                $name = time() . '-' . $file . '.' . $uploadFile->getClientOriginalExtension();
                $path = $uploadFile->storeAs('produk', $name, 'public');
                $product->$file = $path;
            }
        }

        // Simpan produk ke database
        $product->save();

        // Redirect dengan pesan sukses
        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Products::find($id);

        if (!$product) {
            return redirect()->route('products.index')->with('error', 'Produk tidak ditemukan');
        }

        $files = ['cover', 'image_1', 'image_2', 'image_3', 'image_4'];

        foreach ($files as $file) {
            if ($product->$file) {
                Storage::disk('public')->delete($product->$file);
            }
        }

        // Hapus produk dari database
        $product->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus');
    }
}
