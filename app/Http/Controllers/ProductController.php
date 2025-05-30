<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::getAllProduct();
        return view('backend.product.index')->with('products', $products);
    }

    public function create()
    {
        $category = Category::where('is_parent', 1)->get();
        return view('backend.product.create')->with('categories', $category);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'string|required',
            'summary' => 'string|required',
            'description' => 'string|nullable',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'stock' => "required|numeric",
            'cat_id' => 'required|exists:categories,id',
            'child_cat_id' => 'nullable|exists:categories,id',
            'is_featured' => 'sometimes|in:1',
            'status' => 'required|in:active,inactive',
            'condition' => 'required|in:default,new,hot',
            'price' => 'required|numeric',
            'discount' => 'nullable|numeric'
        ]);

        $data = $request->except('photo');
        
        // Handle file upload
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $name = Str::slug($request->title).'_'.time();
            $folder = '/photos/1/product-pic/';
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            
            // Create directory if it doesn't exist
            if (!Storage::disk('public')->exists($folder)) {
                Storage::disk('public')->makeDirectory($folder);
            }
            
            $image->storeAs($folder, $name.'.'.$image->getClientOriginalExtension(), 'public');
            $data['photo'] = $filePath;
        }

        $slug = Str::slug($request->title);
        $count = Product::where('slug', $slug)->count();
        if ($count > 0) {
            $slug = $slug . '-' . date('ymdis') . '-' . rand(0, 999);
        }
        $data['slug'] = $slug;
        $data['is_featured'] = $request->input('is_featured', 0);

        $status = Product::create($data);
        if ($status) {
            request()->session()->flash('success', 'Product added');
        } else {
            request()->session()->flash('error', 'Please try again!!');
        }
        return redirect()->route('product.index');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $category = Category::where('is_parent', 1)->get();
        return view('backend.product.edit')
            ->with('product', $product)
            ->with('categories', $category);
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $this->validate($request, [
            'title' => 'string|required',
            'summary' => 'string|required',
            'description' => 'string|nullable',
            'photo' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
            'stock' => "required|numeric",
            'cat_id' => 'required|exists:categories,id',
            'child_cat_id' => 'nullable|exists:categories,id',
            'is_featured' => 'sometimes|in:1',
            'status' => 'required|in:active,inactive',
            'condition' => 'required|in:default,new,hot',
            'price' => 'required|numeric',
            'discount' => 'nullable|numeric'
        ]);

        $data = $request->except('photo');
        
        // Handle file upload if new image is provided
        if ($request->hasFile('photo')) {
            // Delete old image if exists
            if ($product->photo && Storage::disk('public')->exists($product->photo)) {
                Storage::disk('public')->delete($product->photo);
            }
            
            $image = $request->file('photo');
            $name = Str::slug($request->title).'_'.time();
            $folder = '/photos/1/product-pic/';
            
            // Create directory if it doesn't exist
            if (!Storage::disk('public')->exists($folder)) {
                Storage::disk('public')->makeDirectory($folder);
            }
            
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            $image->storeAs($folder, $name.'.'.$image->getClientOriginalExtension(), 'public');
            $data['photo'] = $filePath;
        }

        $data['is_featured'] = $request->input('is_featured', 0);

        $status = $product->fill($data)->save();
        if ($status) {
            request()->session()->flash('success', 'Product updated');
        } else {
            request()->session()->flash('error', 'Please try again!!');
        }
        return redirect()->route('product.index');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        
        // Delete the product photo if exists
        if ($product->photo && Storage::disk('public')->exists($product->photo)) {
            Storage::disk('public')->delete($product->photo);
        }
        
        $status = $product->delete();
        
        if($status){
            request()->session()->flash('success','Product deleted');
        }
        else{
            request()->session()->flash('error','Error while deleting product');
        }
        return redirect()->route('product.index');
    }
}