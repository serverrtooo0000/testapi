<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{   
    
    public function index()
    {
        $categories = Category::all();
        return view('index',['categories' => $categories]);
    }

    public function store(CategoryRequest $request)
    {
        $category = new Category();

        $category->title = $request->input('title');
        $category->description = $request->input('description');
        $imagePath = $request->file('image')->store('images', 'public');
        $category->image_path = $imagePath;
        $category->save();

        return redirect()->route('categories.index');
    }



    public function show($id)
    {
        $categories = Category::findOrFail($id);
        return view('show', ['categories' => $categories]);
    }

   
    public function update(CategoryRequest $request, $id)
    {

        $category = Category::findOrFail($id);
        $category->title = $request->input('title');
        $category->description = $request->input('description');
        $imagePath = $request->file('image')->store('images', 'public');
        $category->image_path = $imagePath;
        $category->update($request->all());

        return redirect()->route('categories.index');
    }

    public function destroy($id)
    {

        $category = Category::findOrFail($id);
        Storage::disk('public')->delete($category->image_path);
        $category->delete();

        return redirect()->route('categories.index');
    }
    
}


