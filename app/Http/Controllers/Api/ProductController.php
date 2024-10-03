<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResouce;
use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ProductResouce::collection(Product::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $prod=Product::create($request->all());
        return response()->json($prod);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $prod=Product::find($id);
        if(!$prod){
            return response()->json(
                [
                    "massage" => "productNotFond"
                ]
                );
        }
        $prod->update($request->all());
        return response()->json(
            $prod
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $prod=Product::find($id);
        if(!$prod){
            return response()->json(
                [
                    "massage" => "productNotFond"
                ]
                );
        }
        $prod->delete();
        return response()->json(
            [

                "message" => "category successfuly deleted"

            ]
        );
    }
}
