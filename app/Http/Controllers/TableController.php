<?php

namespace App\Http\Controllers;

use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    public function index()
    {
        $table = Table::get();
        return json_encode(['table' => $table]);
    }

    public function create(Request $request)
    {
        $table = new Table();
        $table->number_table = $request->number_table;
        $table->save();
    }

    public function update(Request $request, $id)
    {
        $table = Table::findOrFail($request->$id);
        $table->number_table = $request->number_table;
        $table->save();

        return $table;
    }

    public function destroy($id)
    {
        $table = Table::destroy($id);

        return $table;
    }
}
