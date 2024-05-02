<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index() {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    public function create() {
        $categories = Category::all();
        $brands     = Brand::all();
        $colors     = Color::all();
        return view('admin.product.create', compact('categories', 'brands', 'colors'));
    }

    public function store(ProductRequest $request) {
        $validatedData = $request->validated();

        $category = Category::findOrFail($validatedData['category_id']);

        $product = $category->products()->create([
            'category_id'       => $validatedData['category_id'],
            'name'              => $validatedData['name'],
            'slug'              => Str::slug($validatedData['slug']),
            'brand'             => $validatedData['brand'],
            'small_description' => $validatedData['small_description'],
            'description'       => $validatedData['description'],
            'original_price'    => $validatedData['original_price'],
            'selling_price'     => $validatedData['selling_price'],
            'quantity'          => $validatedData['quantity'],
            'trending'          => $request->trending == true ? '1':'0',
            'status'            => $request->status == true ? '1':'0',
            'meta_title'        => $validatedData['meta_title'],
            'meta_keyword'      => $validatedData['meta_keyword'],
            'meta_description'  => $validatedData['meta_description']
        ]);
        
        if($request->hasFile('image')) {
            $uploadPath = 'upload/product/';

            $i = 1;
            foreach($request->file('image') as $imageFile) {
                $extension = $imageFile->getClientOriginalExtension();
                $fileName = time().$i++.'.'.$extension;

                $imageFile->move($uploadPath, $fileName);
                $finalImagePathName = $uploadPath.$fileName;
                $product->productImages()->create([
                    'product_id'    => $product->id,
                    'image'         => $finalImagePathName
                ]);
            }
        }

        // color
        if($request->colors) {
            foreach($request->colors as $key => $color) {
                $product->productColors()->create([
                    'product_id'    => $product->id,
                    'color_id'      => $color,
                    'quantity'      => $request->colorquantity[$key] ?? 0
                ]);
            }
        }

        return redirect()->route('products-index')->with('message', 'Product Added Successfully');

    }

    public function edit($product_id) {
        $categories = Category::all();
        $brands = Brand::all();
        $product = Product::findOrFail($product_id);
        $productColor = $product->productColors->pluck('color_id')->toArray();
        $colors = Color::whereNotIn('id', $productColor)->get();
        return view('admin.product.edit', compact('categories', 'brands', 'product', 'colors'));
    }   

    public function update(ProductRequest $request, $product_id) {
        $validatedData = $request->validated();

        $product = Category::findOrFail($validatedData['category_id'])
                    ->products()->where('id', $product_id)->first();
        
        if($product) {
            $product->update([
                'category_id'       => $validatedData['category_id'],
                'name'              => $validatedData['name'],
                'slug'              => Str::slug($validatedData['slug']),
                'brand'             => $validatedData['brand'],
                'small_description' => $validatedData['small_description'],
                'description'       => $validatedData['description'],
                'original_price'    => $validatedData['original_price'],
                'selling_price'     => $validatedData['selling_price'],
                'quantity'          => $validatedData['quantity'],
                'trending'          => $request->trending == true ? '1':'0',
                'status'            => $request->status == true ? '1':'0',
                'meta_title'        => $validatedData['meta_title'],
                'meta_keyword'      => $validatedData['meta_keyword'],
                'meta_description'  => $validatedData['meta_description']
            ]);

            if($request->hasFile('image')) {
                $uploadPath = 'upload/product/';
    
                $i = 1;
                foreach($request->file('image') as $imageFile) {
                    $extension = $imageFile->getClientOriginalExtension();
                    $fileName = time().$i++.'.'.$extension;
    
                    $imageFile->move($uploadPath, $fileName);
                    $finalImagePathName = $uploadPath.$fileName;
                    $product->productImages()->create([
                        'product_id'    => $product->id,
                        'image'         => $finalImagePathName
                    ]);
                }
            }
            return redirect()->route('products-index')->with('message', 'berhasil update prodak');

        }else {
            return redirect()->route('products-index')->with('message', 'produk tidak ditemukan');
        }
        
    }

    public function deleteImage($id) {
        $productImage = ProductImage::findOrFail($id);
        if(File::exists($productImage->image)) {
            File::delete($productImage->image);
        }

        $productImage->delete();
        return redirect()->back()->with('message', 'Gambar berhasil dihapus');
    }

    public function delete($id){
        $product = Product::findOrFail($id);
        if($product->productImages) {
            foreach($product->productImages as $image) {
                if(File::exists($image->image)) {
                    File::delete($image->image);
                }
            }
        }
        $product->delete();
        return redirect()->back()->with('message', 'Berhasil hapus product');
    }

}
