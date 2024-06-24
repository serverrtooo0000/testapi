<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class ApiCategoryController extends Controller
{
    public function api_index()
    {
        $category = Category::all();
        return response()->json($category,200);

    }

    public function api_show($id)
    {
        $category = Category::find($id);
        return response()->json($category,200);
    }


    public function api_store(Request $request)
    {
        $category = new Category();
        $category->title = $request->input('title');
        $category->description = $request->input('description');
        $imagePath = $request->file('image')->store('images', 'public');
        $category->image_path = $imagePath;
        $category->save();
        return response()->json($category,201);

    }

     public function update(CategoryRequest $request, $id)
    {

        $category = Category::findOrFail($id);
        $category->title = $request->input('title');
        $category->description = $request->input('description');
        $imagePath = $request->file('image')->store('images', 'public');
        $category->image_path = $imagePath;
        $category->update($request->all());

        return response()->json($category,200);
    }

    public function destroy($id)
    {

        $category = Category::findOrFail($id);
        Storage::disk('public')->delete($category->image_path);
        $category->delete();

        return response()->json($category,200);
    }
    
}
