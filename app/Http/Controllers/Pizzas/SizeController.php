<?php

namespace App\Http\Controllers\Pizzas;

use App\Http\Controllers\Controller;
use App\Models\Pizzas\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sizeLists = Size::all();

        $sizes = [];

        foreach ($sizeLists as $sizeList) {
            $sizeId = $sizeList->id;
            $sizeName = $sizeList->title;
            $sizeMultiplier = $sizeList->multiplier;

            $sizes[] = [
                'id' => $sizeId,
                'name' => $sizeName,
                'multiplier' => $sizeMultiplier,
            ];
        }

        return response()->json($sizes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
