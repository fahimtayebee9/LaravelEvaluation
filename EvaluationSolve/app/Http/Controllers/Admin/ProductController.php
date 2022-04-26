<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Models\SubCategory;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        session([
            'active_menu' => 'products',
            'document_title' => 'Products ',
        ]);

        $list_items = Product::all();
        return view('admin.product.index', compact('list_items'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
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
                // Delete old image
                if(File::exists(public_path('storage/uploads/products/' . $projectObj->thumbnail))){
                    File::delete(public_path('storage/uploads/products/' . $projectObj->thumbnail));
                }

                $image = $request->file('thumbnail');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $location = public_path('storage/uploads/products/' . $filename);
                Image::make($image)->save($location);
                $projectObj->thumbnail = $filename;
            }

            $product->save();

            return redirect()->route('product.index')->with([
                'status' => 'success',
                'message' => 'Product has been created.',
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'subcategory_id' => 'required|integer',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'price' => 'required|numeric',
        ]);

        $productObj = Product::find($id);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ]);
        }
        else if($productObj){
            $productObj               = new Product();
            $productObj->title        = $request->title;
            $productObj->description  = $request->description;
            $productObj->subcategory_id  = $request->subcategory_id;
            $productObj->price        = $request->price;

            if ($request->hasFile('thumbnail')) {
                // Delete old image
                if(File::exists(public_path('storage/uploads/products/' . $projectObj->thumbnail))){
                    File::delete(public_path('storage/uploads/products/' . $projectObj->thumbnail));
                }

                $image = $request->file('thumbnail');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $location = public_path('storage/uploads/products/' . $filename);
                Image::make($image)->save($location);
                $productObj->thumbnail = $filename;
            }
            
            $product->update();

            return redirect()->route('product.index')->with([
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

            return redirect()->route('product.index')->with([
                'status' => 'success',
                'message' => 'Product has been deleted.',
            ]);
        }

        return redirect()->route('product.index')->with([
            'status' => 'error',
            'message' => 'Product not found.',
        ]);
    }
}
