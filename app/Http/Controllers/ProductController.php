<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;



class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10); // 10 productos por página
        return view('profiles.company.productsection.productsSection', compact('products'));
    }


        public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'barcode'     => 'nullable|string|max:255',
            'unit_price'  => 'required|numeric|min:0',
            'state'       => 'required|in:available,unavailable',
            'media'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Aquí asumimos que el branch viene del usuario logueado
        $branchId = Auth::user()->branch_id ?? 1; // cámbialo según tu lógica

        $product = new Product();
        $product->branch_id   = $branchId;
        $product->name        = $request->name;
        $product->description = $request->description;
        $product->barcode     = $request->barcode;
        $product->unit_price  = $request->unit_price;
        $product->state       = $request->state;

        // Guardar imagen si se sube
        if ($request->hasFile('media')) {
            $path = $request->file('media')->store('products', 'public');
            $product->media = $path; // Guardamos la ruta
        }

        $product->save();

        return redirect()->back()->with('success', 'Producto agregado correctamente.');
    }

    
    public function show(Product $product)
    {
        //
    }

    
    public function edit(Product $product)
    {
        //
    }

    
    public function update(Request $request, Product $product)
    {
        //
    }

    public function destroy(Product $product)
    {
        // Si el producto tiene imagen, la eliminamos del storage
        if ($product->media) {
            Storage::disk('public')->delete($product->media);
        }

        // Eliminamos el producto de la base de datos
        $product->delete();

        return redirect()->back()->with('success', 'Producto eliminado correctamente.');
    }










    public function index2()
    {
    // Obtenemos todos los productos con sus categorías y características
    $products = Product::with(['categories.characteristics'])->get();

    $filters = [];
    foreach ($products as $product) {
        foreach ($product->categories as $category) {
            if (!isset($filters[$category->name])) {
                $filters[$category->name] = [];
            }

            foreach ($category->characteristics as $char) {
                $charName = $char->name;
                $charValue = $char->pivot->characteristic_id;
                $filters[$category->name][$charName][$charValue] = $char->name;
            }
        }
    }

    return view('products.products', compact('products', 'filters'));
}
}
