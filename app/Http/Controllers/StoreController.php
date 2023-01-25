<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Store;
use App\Models\StoreStockAllocation;
use App\Models\StoreStockSold;
use Illuminate\Http\Request;
use Inertia\Inertia;


class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Store', [
            'stores' => Store::all()
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
        //check if request have image file
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $data['image'] = $name;
        }
        $store = Store::create($data);
        return redirect()->route('stores.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        return Inertia::render('StoreDetail', [
            'store' => $store,
            'stocks' => Stock::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store)
    {
        return Inertia::render('Store/Edit', [
            'store' => $store
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Store $store)
    {

        // dd($request->all());
        $data = $request->all();
        //check if request have image file
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $data['image'] = $name;
        }
        $store->update($data);
        return redirect()->route('stores.index');
    }
    public function allocate(Request $request)
    {
        // dd($request->all());
        $data = $request->all();

        //check if stock aready allocated to store
        $stockAlloc = StoreStockAllocation::where('stock_id', $data['stock_id'])->where('store_id', $data['store_id'])->first();

        if ($stockAlloc) {
            $stockAlloc->number_items_unit = $stockAlloc->number_items_unit + $data['number_items_unit'];
            $stockAlloc->save();
        } else {
            StoreStockAllocation::create($data);
        }

        $stock = Stock::find($data['stock_id']);
        $stock->number_items_unit = $stock->number_items_unit - $data['number_items_unit'];
        $stock->save();

        return redirect()->route('stores.show', $data['store_id']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
        $store->delete();
        return redirect()->route('stores.index');
    }

    public function storeStock(Request $request)
    {
        return StoreStockAllocation::where('store_id', $request->id)->get();
    }
    public function storeStockSold(Request $request)
    {
        return StoreStockSold::where('store_id', $request->id)->get();
    }
}
