<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Category::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Category::create($request->all())) {
            return response()->json([
                'message' => 'Categoria criada com sucesso'
            ], 201);
        } 
            return response()->json([
                'message' => 'Falha ao criar o categoria'
            ], 404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($category)
    {
        $category = Category::find($category);
        if($category){
            $response = [
                'category' => $category,
                'products' => $category->products
            ];
            return $category;
        }
            return response()->json([
                'message' => 'Categoria não encontrada'
            ], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $category)
    {
        $category = Category::find($category);
        if($category){
            $category->update($request->all());
            return $category;
        }
        return response()->json([
            'message' => 'Erro ao editar categoria'
        ], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($category)
    {
        if(Category::destroy($category)) {
            return response()->json([
                'message' => 'Categoria deletada com sucesso'
            ], 201);
        } 
            return response()->json([
                'message' => 'Erro ao deletar a categoria'
            ], 404);
    }
}
