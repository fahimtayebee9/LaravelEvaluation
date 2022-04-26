<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\SubCategory;
use App\Models\Category;

class SubCategoryController extends Controller
{
    public function index()
    {
        session([
            'active_menu' => 'category',
            'document_title' => 'Categories ',
        ]);

        $list_items = Category::all();
        return view('admin.categories.index', compact('list_items'));
    }

    public function store(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'category_id' => 'required|integer',
        ]);

        if ($validated->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validated->errors()->first(),
            ]);
        }
        else{
            $category               = new SubCategory();
            $category->title        = $request->title;
            $category->description  = $request->description;
            $category->category_id  = $request->category_id;
            $category->save();

            return redirect()->route('categories.index')->with([
                'status' => 'success',
                'message' => 'Category has been created.',
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $validated = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'category_id' => 'required|integer',
        ]);

        $sub_categoryObj = Category::find($id);

        if ($validated->fails()) {
            return redirect()->back()
                ->withErrors($validated)
                ->withInput();
        }
        else if($sub_categoryObj){
            $sub_categoryObj->name         = $request->name;
            $sub_categoryObj->title        = $request->title;
            $sub_categoryObj->description  = $request->description;
            $sub_categoryObj->category_id  = $request->category_id;
            $sub_categoryObj->update();

            return redirect()->route('categories.index')->with([
                'status' => 'success',
                'message' => 'Category has been updated.',
            ]);
        }
        else{
            return redirect()->route('categories.index')->with([
                'status' => 'error',
                'message' => 'Category not found.',
            ]);
        }
    }

    public function destroy($id)
    {
        $sub_categoryObj = SubCategory::find($id);
        dd($sub_categoryObj);
        if($sub_categoryObj){
            $sub_categoryObj->delete();

            return redirect()->route('categories.index')->with([
                'status' => 'success',
                'message' => 'Category has been deleted.',
            ]);
        }
        else{
            return redirect()->route('categories.index')->with([
                'status' => 'error',
                'message' => 'Category not found.',
            ]);
        }
    }
}
