<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Product::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Product::create($request->all())) {
            return response()->json([
                'message' => 'Produto criado com sucesso'
            ], 201);
        } 
            return response()->json([
                'message' => 'Falha ao criar o produto'
            ], 404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($product)
    {
        $product = Product::find($product);
        if($product){
            $response = [
                'product' => $product,
                'category' => $product->category
            ];
            return $product;
        }
            return response()->json([
                'message' => 'Produto não encontrado'
            ], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $product)
    {
        $product = Product::find($product);
        if($product){
            $product->update($request->all());
            return $product;
        }
        return response()->json([
            'message' => 'Erro ao editar o produto'
        ], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product)
    {
        $product = Product::find($product);
        if($product){
            $product->delete();
            return response()->json([
                'message' => 'Produto deletado com sucesso'
            ], 200);
        }
        return response()->json([
            'message' => 'Erro ao deletar o produto'
        ], 404);
    }
}
