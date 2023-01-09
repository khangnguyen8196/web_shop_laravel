<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    { 
        $product = Product::all();
        return view('admin.product.index', compact('product'));
    }

    public function add()
    { 
        return view('admin.product.add');
    }

    public function insert(Request $request)
    {
        $product = new Product();
        if($request->hasFile('image'))
        {
            $file =$request->file('image');
            $ext=$file->getClientOriginalExtensions();
            $filename=time().'.'.$ext;
            $file->move('assets/uploads/product/'.$filename);
            $product->image=$filename;
        }

        $product->name = $request->input('name');
        $product->slug = $request->input('slug');
        $product->description = $request->input('description');
        $product->content = $request->input('content');
        $product->status = $request->input('status')== TRUE ? '1' : '0';
        $product->save();

        return redirect ('/dashboard')->with('status','Product Added Successfully');
    }

    public function edit($id)
    {   
        $product = Product::find($id);
        return view('admin.product.edit',compact('product'));
    }

    public function update(Request $request,$id)
    {
        $product = Product::find($id);
        if($request->hasFile('image'))
        {
            $path='assets/uploads/product/'.$product->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file =$request->file('image');
            $ext=$file->getClientOriginalExtensions();
            $filename=time().'.'.$ext;
            $file->move('assets/uploads/product/'.$filename);
            $product->image=$filename;
        }
        $product->name = $request->input('name');
        $product->slug = $request->input('slug');
        $product->description = $request->input('description');
        $product->content = $request->input('content');
        $product->status = $request->input('status')== TRUE ? '1' : '0';
        $product->update();
        return redirect ('/dashboard')->with('status','Product Updated Successfully');
    }

    public function delete($id)
    {
        $product = Product::find($id);
        if($product->image)
        {
            $path='assets/uploads/product/'.$product->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
        }
        $product->delete();
        return redirect ('/products')->with('status','Product Delete Successfully');
    }
}
