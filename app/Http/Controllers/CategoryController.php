<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        // Mengambil semua data
        return response()->json(Category::all());
    }

    public function store(Request $request)
    {
        // Validasi: memastikan 'name' wajib diisi
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Simpan data
        $category = Category::create($validated);
        
        return response()->json($category, 201);
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
        return response()->json($category);
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category->update($validated);
        return response()->json($category);
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return response()->json(['message' => 'Deleted successfully'], 200);
    }
}