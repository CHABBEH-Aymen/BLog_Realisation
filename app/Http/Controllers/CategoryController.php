<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $data = $request->validate([
            "name"=>"required|string|max:255"
        ]);
        Category::create($data);
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);
        $data = $request->validate([
            "name"=>"required|string|max:255"
        ]);
        $category->name = $data["name"];
        return redirect()->back(); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $article = Category::findOrFail($id);
        $article->delete();
        
        return redirect('admin.category.index')->with('success' , 'delete successed');
    }
}
