<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Characteristic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;



class ProductController extends Controller
{


    public function index()
{
    // Validar que haya sesión activa
    $user = Auth::user();
    if (!$user) {
        return redirect()->route('login')
            ->with('error', 'Debes iniciar sesión para acceder.');
    }

    // Validar que el usuario tenga rol de "company" (tabla pivote role_user)
    if (!$user->roles()->where('name', 'company')->exists()) {
        return redirect()->route('home')
            ->with('error', 'Acceso denegado. No eres una empresa.');
    }

    // Obtener la empresa vinculada al usuario
    $company = \App\Models\Company::where('user_id', $user->id)->first();

    if (!$company) {
        return redirect()->route('home')
            ->with('error', 'No tienes una empresa asociada.');
    }

    // Traer productos de esa empresa con categorías y características
    $products = Product::with(['categories', 'characteristics'])
        ->where('company_id', $company->id)
        ->paginate(10);

    return view('profiles.company.productsection.productsSection', [
        'products' => $products,
        'categories' => Category::all(),
        'characteristics' => Characteristic::all(),
        'product' => new Product(), // para usar en formularios (ej. modal de crear)
    ]);
}







    public function store(Request $request)
    {
        $request->validate([
            'name'         => 'required|string|max:255',
            'description'  => 'nullable|string',
            'barcode'      => 'nullable|string|max:255',
            'unit_price'   => 'required|numeric|min:0',
            'state'        => 'required|in:available,unavailable',
            'media'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'categories'   => 'required|array',
            'categories.*' => 'exists:categories,id',
            'characteristics'   => 'nullable|array',
            'characteristics.*.name'     => 'nullable|string|max:255',
            'characteristics.*.brand'    => 'nullable|string|max:255',
            'characteristics.*.model'    => 'nullable|string|max:255',
            'characteristics.*.size'     => 'nullable|string|max:255',
            'characteristics.*.color'    => 'nullable|string|max:255',
            'characteristics.*.material' => 'nullable|string|max:255',
        ]);

        $user = Auth::user();
        $company = \App\Models\Company::where('user_id', $user->id)->first();
        if (!$company) {
            return redirect()->back()->with('error', 'No tienes una empresa asociada.');
        }

        $product = new Product();
        $product->company_id  = $company->id;
        $product->branch_id   = null;
        $product->name        = $request->name;
        $product->description = $request->description;
        $product->barcode     = $request->barcode;
        $product->unit_price  = $request->unit_price;
        $product->state       = $request->state;

        if ($request->hasFile('media')) {
            $path = $request->file('media')->store('products', 'public');
            $product->media = $path;
        }
        $product->save();

        // Guardar categorías + características en pivot
        if ($request->filled('categories') && $request->filled('characteristics')) {
            foreach ($request->categories as $categoryId) {
                foreach ($request->characteristics as $char) {
                    $characteristic = Characteristic::create([
                        'name'       => $char['name'] ?? null,
                        'brand'      => $char['brand'] ?? null,
                        'model'      => $char['model'] ?? null,
                        'size'       => $char['size'] ?? null,
                        'color'      => $char['color'] ?? null,
                        'material'   => $char['material'] ?? null,
                    ]);

                    DB::table('characteristic_category_product')->insert([
                        'product_id'        => $product->id,
                        'category_id'       => $categoryId,
                        'characteristic_id' => $characteristic->id,
                        'created_at'        => now(),
                        'updated_at'        => now(),
                    ]);
                }
            }
        }

        return redirect()->back()->with('success', 'Producto agregado correctamente ✅');
    }



public function update(Request $request, Product $product)
{
    $request->validate([
        'name'         => 'required|string|max:255',
        'description'  => 'nullable|string',
        'barcode'      => 'nullable|string|max:255',
        'unit_price'   => 'required|numeric|min:0',
        'state'        => 'required|in:available,unavailable',
        'media'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'categories'   => 'required|array',
        'categories.*' => 'exists:categories,id',
        'characteristics'   => 'nullable|array',
        'characteristics.*.name'     => 'nullable|string|max:255',
        'characteristics.*.brand'    => 'nullable|string|max:255',
        'characteristics.*.model'    => 'nullable|string|max:255',
        'characteristics.*.size'     => 'nullable|string|max:255',
        'characteristics.*.color'    => 'nullable|string|max:255',
        'characteristics.*.material' => 'nullable|string|max:255',
    ]);

    // Verificar que el producto pertenezca a la empresa del usuario
    $user = Auth::user();
    $company = \App\Models\Company::where('user_id', $user->id)->first();
    
    if ($product->company_id !== $company->id) {
        return redirect()->back()->with('error', 'No tienes permisos para editar este producto.');
    }

    // Actualizar datos básicos del producto
    $product->name = $request->name;
    $product->description = $request->description;
    $product->barcode = $request->barcode;
    $product->unit_price = $request->unit_price;
    $product->state = $request->state;

    // Actualizar imagen si se proporciona una nueva
    if ($request->hasFile('media')) {
        // Eliminar imagen anterior si existe
        if ($product->media) {
            Storage::disk('public')->delete($product->media);
        }
        
        $path = $request->file('media')->store('products', 'public');
        $product->media = $path;
    }

    $product->save();

    // Eliminar relaciones existentes en la tabla pivot
    DB::table('characteristic_category_product')
        ->where('product_id', $product->id)
        ->delete();

    // Crear nuevas características y relaciones
    if ($request->filled('categories') && $request->filled('characteristics')) {
        foreach ($request->categories as $categoryId) {
            foreach ($request->characteristics as $char) {
                // Crear nueva característica
                $characteristic = Characteristic::create([
                    'name'       => $char['name'] ?? null,
                    'brand'      => $char['brand'] ?? null,
                    'model'      => $char['model'] ?? null,
                    'size'       => $char['size'] ?? null,
                    'color'      => $char['color'] ?? null,
                    'material'   => $char['material'] ?? null,
                ]);

                // Crear nueva relación en la tabla pivot
                DB::table('characteristic_category_product')->insert([
                    'product_id'        => $product->id,
                    'category_id'       => $categoryId,
                    'characteristic_id' => $characteristic->id,
                    'created_at'        => now(),
                    'updated_at'        => now(),
                ]);
            }
        }
    }

    return redirect()->back()->with('success', 'Producto actualizado correctamente ✅');
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
