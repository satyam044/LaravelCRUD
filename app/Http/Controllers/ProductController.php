<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    // Show Products page
    public function index(){
        $products = Product::orderBy('created_at','DESC')->get();
        return view('products.list',[
            'products' => $products
        ]);
    }
    // Create Products page
    public function create(){
        return view('products.create');
    }
    // Store Products in DB
    public function store(Request $request){
        $rules = [
            'name' => 'required|min:5',
            'sku' => 'required|min:3',
            'price' => 'required|numeric',
        ];

        if($request->image != "") {
            $rules['image'] = 'image';
        }

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return redirect()->route('products.create')->withInput()->withErrors($validator);
        }
        // Insert product in DB
            $product = new Product();
            $product->name = $request->name;
            $product->sku = $request->sku;
            $product->price= $request->price;
            $product->description = $request->description;
            $product->save();

            if($request->image != "") {
                //Store image
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName = time().'.'.$ext;

            //Save image in directory
            $image->move(public_path('uploads/products'), $imageName);
            
            //Save image in DB
            $product->image = $imageName;
            $product->save();
        }
    
        return redirect()->route('products.index')->with('success','Product Added Successfully!');
    }
    // Edit Product
    public function edit($id){
        $product = Product::findOrFail($id);
        return view('products.edit',[
            'product' => $product 
        ]);
    }
    // Update Product
    public function update($id, Request $request){
        $product = Product::findOrFail($id);
        $rules = [
                'name' => 'required|min:5',
                'sku' => 'required|min:3',
                'price' => 'required|numeric',
            ];

            if($request->image != "") {
                $rules['image'] = 'image';
            }

            $validator = Validator::make($request->all(), $rules);

            if($validator->fails()){
                return redirect()->route('products.edit',$product->id)->withInput()->withErrors($validator);
            }
            // Update product in DB
                $product->name = $request->name;
                $product->sku = $request->sku;
                $product->price= $request->price;
                $product->description = $request->description;
                $product->save();

                if($request->image != "") {
                //Delete old Image
                File::delete(public_path('uploads/products/'.$product->image));

                //Store image
                $image = $request->image;
                $ext = $image->getClientOriginalExtension();
                $imageName = time().'.'.$ext;

                //Save image in directory
                $image->move(public_path('uploads/products'), $imageName);
                
                //Save image in DB
                $product->image = $imageName;
                $product->save();
            }
        
            return redirect()->route('products.index')->with('success','Product Updated Successfully!');
    }
    // Delete Product
    public function destroy(){
        
    }
}
