<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'status' => true,
            'message' => "all tags in database",
            'data' => Tag::all()];
        return view('tag.tag', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tag.show-tag');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TagRequest $request)
    {
        // dd($request->input());
        $tag = Tag::create([
            'tag' => $request->tag,
            "created_at" => NOW(),
            "updated_at" => NOW(),
        ]);
        return back()->with("create", "tag has been created");
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tag = Tag::find($id)->first();

        return view('tag.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TagRequest $request, Tag $tag)
    {
        // dd($tag);
        $tag->update([
            'tag' => $request->tag,
            'updated_at' => now(),
        ]);
        return back()->with("update", "takg has been updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('tag.index');
    }
}
