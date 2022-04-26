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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session([
            'active_menu' => 'category',
            'document_title' => 'Categories ',
        ]);

        $list_items = Category::all();
        return view('admin.category.index', compact('list_items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoryObj = Category::find($id);

        if($categoryObj){
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
