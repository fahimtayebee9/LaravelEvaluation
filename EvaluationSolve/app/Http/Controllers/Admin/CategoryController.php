<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;


class CategoryController extends Controller
{
    public function index()
    {
        session([
            'active_menu' => 'category',
            'document_title' => 'Categories ',
        ]);

        $list_items = Category::all();
        return view('admin.category.index', compact('list_items'));
    }

    public function store(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        if ($validated->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validated->errors()->first(),
            ]);
        }
        else{
            $category               = new Category();
            $category->title        = $request->title;
            $category->description  = $request->description;
            $category->save();

            return redirect()->route('category.index')->with([
                'status' => 'success',
                'message' => 'Category has been created.',
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $validated = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $categoryObj = Category::find($id);

        if ($validated->fails()) {
            return redirect()->back()
                ->withErrors($validated)
                ->withInput();
        }
        else if($categoryObj){
            $categoryObj->name         = $request->name;
            $categoryObj->title        = $request->title;
            $categoryObj->description  = $request->description;
            $categoryObj->update();

            return redirect()->route('category.index')->with([
                'status' => 'success',
                'message' => 'Category has been updated.',
            ]);
        }
        else{
            return redirect()->route('category.index')->with([
                'status' => 'error',
                'message' => 'Category not found.',
            ]);
        }
    }

    public function destroy($id)
    {
        $categoryObj = Category::find($id);

        if($categoryObj){
            $subCategories = $categoryObj->subCategories;
            if($subCategories->count() > 0){
                foreach($subCategories as $subCategory){
                    $subCategory->delete();
                }
            }
            
            $categoryObj->delete();

            return redirect()->route('category.index')->with([
                'status' => 'success',
                'message' => 'Category has been deleted.',
            ]);
        }
        else{
            return redirect()->route('category.index')->with([
                'status' => 'error',
                'message' => 'Category not found.',
            ]);
        }
    }
}
