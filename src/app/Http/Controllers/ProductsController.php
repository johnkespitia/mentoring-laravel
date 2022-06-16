<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductsRequest;
use App\Http\Requests\UpdateProductsRequest;
use App\Models\Products;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $limit = request()->get("limit");
        $name = request()->get("name");
        $pricegt = request()->get("pricegt");
        $category = request()->get("category");
        $result = Products::limit($limit)
            //->wherePrice($pricegt)
            ->where(function($query) use($name) {
                $query->where("products.name",'like',"%{$name}%");
                $query->orWhere("products.description",'like',"%{$name}%");
            })
            ->where("categories.name","like","%{$category}%")
            ->join('categories', 'products.category_id', "=", 'categories.id')
            //->select("categories.name as category", 'products.*')
            //where a=1 and (b=2 or c= 2)
            //where (a=1 and b=2) or (a=1 and c=2)
            // ->where([
            //     ["name",'like',"%{$name}%"],
            //     ['price', ">=",$pricegt],
            // ])
            // ->orWhere([
            //     ["description",'like',"%{$name}%"],
            //     ['price', ">=",$pricegt]
            // ])
            ->with("category")
            ->get()->sum->price;
        //return $result; 
        return response()->json($result, 200);
            
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
     * @param  \App\Http\Requests\StoreProductsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $product)
    {
        return response()->json($product, 200);
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
     * @param  \App\Http\Requests\UpdateProductsRequest  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductsRequest $request, Products $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $products)
    {
        //
    }
}
