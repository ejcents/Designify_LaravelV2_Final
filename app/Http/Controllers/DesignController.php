<?php

namespace App\Http\Controllers;

use App\Models\Design;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DesignController extends Controller
{
    public function index()
    {
        $designs = Design::all();
        return view('designs.index', compact('designs'));
    }

    public function create()
    {
        return view('designs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image_url' => 'nullable|url',
        ]);

        $design = new Design();
        $design->title = $request->title;
        $design->description = $request->description;
        $design->image_url = $request->image_url;
        $design->save();

        DB::statement('ALTER TABLE designs AUTO_INCREMENT = 1');

        return redirect()->route('designs.index');
    }

    public function show(Design $design)
    {
        return view('designs.show', compact('design'));
    }

    public function edit(Design $design)
    {
        return view('designs.edit', compact('design'));
    }

    public function update(Request $request, Design $design)
    {
        $design->update($request->all());
        return redirect()->route('designs.index');
    }

    public function destroy(Design $design)
    {
        $design->delete();
        return redirect()->route('designs.index');
    }
}