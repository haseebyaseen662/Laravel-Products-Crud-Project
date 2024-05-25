<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    // this method show product page
    
    public function index() {
        $products = Product::orderBy('created_at', 'DESC')->get();
        return view('products.list',[
            'products' => $products
        ]);
    }

    // this method will show create product page

    public function create() {
        return view('products.create');
    }

    // this method will store a product in db

    public function store(Request $request) {
        $rules = [
            'name' => 'required|min:5',
            'sku' => 'required|min:3',
            'price' => 'required|numeric'
        ];

        if ($request->image != "") {
        $rules['image'] = 'image';
        }

         $validator = Validator::make($request->all(),$rules);

        if($validator->fails()) {
            return redirect()->route('products.create')->withInput()->withErrors($validator);
        }

        // here we will store products in db
        $product = new Product();
        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->save();

        if ($request->image != "") {
         
            // here we will store image
        $image = $request->image;
        $ext = $image->getClientOriginalExtension();
        $imageName = time().'.'.$ext; // Unique image name

        // Save images to product directory
        $image->move(public_path('uploads/products'),$imageName);

        // Save Image Name in Database
        $product->image = $imageName;
        $product->save();
        
        }

        return redirect()->route('products.index')->with('success', 'Product added successfully.');
    }

    // this method will show edit product page

    public function edit($id) {
        $product = Product::findOrFail($id);
        return view('products.edit',[
            'product' => $product
        ]);

    }

       // this method will update products
        public function update($id, Request $request)
        {
            // Find the existing product by ID
            $product = Product::findOrFail($id);
    
            // Define validation rules
            $rules = [
                'name' => 'required|min:5',
                'sku' => 'required|min:3',
                'price' => 'required|numeric'
            ];
    
            if ($request->hasFile('image')) {
                $rules['image'] = 'image';
            }
    
            // Validate the request
            $validator = Validator::make($request->all(), $rules);
    
            if ($validator->fails()) {
                return redirect()->route('products.edit', $product->id)
                                 ->withInput()
                                 ->withErrors($validator);
            }
    
            // Update the product with validated data
            $product->name = $request->name;
            $product->sku = $request->sku;
            $product->price = $request->price;
            $product->description = $request->description;
    
            // Handle image upload if present
            if ($request->hasFile('image')) {
                // Delete the old image from the directory
                if ($product->image) {
                    File::delete(public_path('uploads/products/' . $product->image));
                }
    
                // Store the new image
                $image = $request->file('image');
                $ext = $image->getClientOriginalExtension();
                $imageName = time() . '.' . $ext; // Unique image name
    
                // Save the new image to the product directory
                $image->move(public_path('uploads/products'), $imageName);
    
                // Save the image name in the database
                $product->image = $imageName;
            }
    
            // Save the updated product to the database
            $product->save();
    
            // Redirect with success message
            return redirect()->route('products.index')
                             ->with('success', 'Product updated successfully.');
        }
           
       
               public function destroy($id)
       {
           \Log::info('Destroy method called for product ID: ' . $id);
           $product = Product::findOrFail($id);
       
           if ($product->image) {
               File::delete(public_path('uploads/products/' . $product->image));
           }
       
           $product->delete();
       
           return redirect()->route('products.index')
               ->with('success', 'Product deleted successfully.');
       }
       
}
       