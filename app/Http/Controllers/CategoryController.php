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

    public function show($id)
    {
        $category = Category::find($id);

        return $category;
    }

    public function update(Request $request)
    {
        $data = $request->json()->all();
        $name = $data['name'];
        $id = $data['id'];
        Category::where('id', $id)->update(['name' => $name]);

        return json_encode(['msg' => 'Producto actualizado']);
    }

    public function destroy($id)
    {
        Category::destroy($id);

        return json_encode(['msg' => 'Categoria eliminada']);
    }
}
