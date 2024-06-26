<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{   
    
    public function api_index()
    {
        $categories = Category::all();
        return view('index',['categories' => $categories]);
    }

    public function api_store(CategoryRequest $request)
    {
        $category = new Category();

        $category->title = $request->input('title');
        $category->description = $request->input('description');
        $imagePath = $request->file('image')->store('images', 'public');
        $category->image_path = $imagePath;
        $category->save();

        return redirect()->route('categories.index');
    }



    public function api_show($id)
    {
        $categories = Category::findOrFail($id);
        return view('show', ['categories' => $categories]);
    }

   
    public function api_update(CategoryRequest $request, $id)
    {

        $category = Category::findOrFail($id);
        $category->title = $request->input('title');
        $category->description = $request->input('description');
        $imagePath = $request->file('image')->store('images', 'public');
        $category->image_path = $imagePath;
        $category->update($request->all());

        return redirect()->route('categories.index');
    }

    public function api_destroy($id)
    {

        $category = Category::findOrFail($id);
        Storage::disk('public')->delete($category->image_path);
        $category->delete();

        return redirect()->route('categories.index');
    }
    
}


