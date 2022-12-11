<?php

namespace App\Http\Controllers;

use App\Models\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::get();
        return json_encode(['category' => $category]);
    }

    public function create(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->save();
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($request->$id);
        $category->name = $request->name;
        $category->save();

        return $category;
    }

    public function destroy($id)
    {
        $category = Category::destroy($id);

        return $category;
    }
}
