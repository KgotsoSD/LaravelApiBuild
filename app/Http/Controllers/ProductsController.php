<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth:santum",["except"=>["index"],"show"]);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Productsx=Products::all();

        return response()->json([
            "success"=> true,
            "productsx"=>$productsx,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "title"=>"required",
            "description"=> "required",
            "price"=>"required",
        ]);

        $products=Products::create([
            "title"=>"required",
            "description"=>"required",
            "price"=>$request->price,

        ]);

        return response()->json([
            "success"=>true,
            "product"=>$product,

        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products=Productss::find($id);
        return response()->json([

            "success"=>true,
            "products"=>$products,


        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $products)
    {
        $products=Products::find($id);
        $products->update($request->all());

        return response()->json([
            "success"=>true,
            "product"=>$product,
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $products)
    {
        Products::find($id)->delete();

        return response()->json([
            "success"=>true,
            "message"=>"the product has been deleted!",
        ]);
    }
}
