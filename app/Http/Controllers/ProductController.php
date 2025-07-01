<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    // Show Products page
    public function index(){
        
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
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return redirect()->route('products.create')->withInput()->withErrors($validator);
        }
    }
    // Edit Product
    public function edit(){
        
    }
    // Update Product
    public function update(){
        
    }
    // Delete Product
    public function destroy(){
        
    }
}
