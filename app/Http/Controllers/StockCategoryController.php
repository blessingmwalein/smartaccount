<?php

namespace App\Http\Controllers;

use App\Models\StockCategory;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StockCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('StockCategory', [
            'categories' => StockCategory::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $stockCategory = StockCategory::create($data);
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StockCategory  $stockCategory
     * @return \Illuminate\Http\Response
     */
    public function show(StockCategory $stockCategory)
    {
        return Inertia::render('StockCategory', [
            'stockCategory' => $stockCategory
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StockCategory  $stockCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(StockCategory $stockCategory)
    {
        return Inertia::render('StockCategory/Edit', [
            'stockCategory' => $stockCategory
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StockCategory  $stockCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StockCategory $stockCategory)
    {
        $data = $request->all();
        $stockCategory->update($data);
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StockCategory  $stockCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(StockCategory $stockCategory)
    {
        $stockCategory->delete();
        return redirect()->route('categories.index');
    }
}
