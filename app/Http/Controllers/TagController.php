<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tag.list', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "name"=>"required|string|max:255"
        ]);
        Tag::create($data);
        return redirect()->back();
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
    public function edit($id)
{
    $tag = Tag::findOrFail($id);
    return view('admin.tag.edit', compact('tag'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $tag = Tag::findOrFail($id);
        $data = $request->validate([
            "name"=>"required|string|max:255"

        ]);

        $tag->name = $data["name"];
        $tag->save();
        return redirect('/tag/list')->with('success','Tag updated successfully');

    } 


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $tag = Tag::findOrFail($id);
    $tag->delete();

    return redirect('/tag/list')->with('success', 'Tag deleted successfully.');
}
}
