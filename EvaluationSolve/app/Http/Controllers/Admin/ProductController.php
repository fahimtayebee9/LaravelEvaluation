<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Models\Product;
use App\Models\SubCategory;

class ProductController extends Controller
{
    public function index()
    {
        session([
            'active_menu' => 'products',
            'document_title' => 'Products ',
        ]);

        $list_items = Product::all();
        $subcategories = SubCategory::all();
        return view('admin.pages.products.index', compact('list_items', 'subcategories'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'subcategory_id' => 'required|integer',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'price' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ]);
        }
        else{
            $product               = new Product();
            $product->title        = $request->title;
            $product->description  = $request->description;
            $product->subcategory_id  = $request->subcategory_id;
            $product->price        = $request->price;

            if ($request->hasFile('thumbnail')) {
                $image = $request->file('thumbnail');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $location = public_path('storage/uploads/products/' . $filename);
                Image::make($image)->save($location);
                $product->thumbnail = $filename;
            }

            $product->save();

            return redirect()->route('products.index')->with([
                'status' => 'success',
                'message' => 'Product has been created.',
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'subcategory_id' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        $productObj = Product::find($id);

        // dd($request->all());

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ]);
        }
        else if($productObj){
            $productObj->title        = $request->title;
            $productObj->description  = $request->description;
            $productObj->subcategory_id  = $request->subcategory_id;
            $productObj->price        = $request->price;

            if ($request->hasFile('thumbnail')) {
                // Delete old image
                if(File::exists(public_path('storage/uploads/products/' . $productObj->thumbnail))){
                    File::delete(public_path('storage/uploads/products/' . $productObj->thumbnail));
                }

                $image = $request->file('thumbnail');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $location = public_path('storage/uploads/products/' . $filename);
                Image::make($image)->save($location);
                $productObj->thumbnail = $filename;
            }
            
            $productObj->update();

            return redirect()->route('products.index')->with([
                'status' => 'success',
                'message' => 'Product has been created.',
            ]);
        }
    }

    public function destroy($id)
    {
        $productObj = Product::find($id);

        if($productObj){
            // Delete old image
            if(File::exists(public_path('storage/uploads/products/' . $productObj->thumbnail))){
                File::delete(public_path('storage/uploads/products/' . $productObj->thumbnail));
            }

            $productObj->delete();

            return redirect()->route('products.index')->with([
                'status' => 'success',
                'message' => 'Product has been deleted.',
            ]);
        }

        return redirect()->route('products.index')->with([
            'status' => 'error',
            'message' => 'Product not found.',
        ]);
    }
}
