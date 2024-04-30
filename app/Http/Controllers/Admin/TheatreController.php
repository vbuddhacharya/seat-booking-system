<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Theatre;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTheatreRequest;

class TheatreController extends Controller
{
    public function index()
    {
        $theatres = Theatre::all();

        return view('theatres.index', compact('theatres'));
    }

    public function create()
    {
        return view('theatres.create');
    }

    public function store(StoreTheatreRequest $request)
    {
        $theatre = Theatre::create($request->validated());

        return redirect()->route('admin.theatres.index');
    }

    public function edit(Theatre $theatre)
    {
        return view('theatres.edit', compact('theatre'));
    }

    public function destroy(Theatre $theatre)
    {
        $theatre->delete();

        return redirect()->route('admin.theatres.index')->with('success', 'Movie deleted successfully');
    }
}
