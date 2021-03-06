<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        foreach ($products as $product) {
            if (!$product->img) {
                $product->img = 'no_image.png';
            }
        }
        return response()->json($products);
    }

    public function getProductsByCategory($id)
    {
        $products = Product::where('category_id', $id)->get();
        foreach ($products as $product) {
            if (!$product->img) {
                $product->img = 'no_image.png';
            }
        }
        return view('pages.products', compact('products'));
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
        $data = $request->toArray();
        Product::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::where('id', $id)->get()->first();
        if (!$product->img) {
            $product->img = 'no_image.png';
        }
        return view('pages.product', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = $request->toArray();
        unset($data['created_at']);
        unset($data['updated_at']);
        Product::where('id', $request->id)->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productId = (int)$id;
        $product = Product::findOrFail($productId);
        $product->delete();
    }
}
