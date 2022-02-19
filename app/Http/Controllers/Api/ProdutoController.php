<?php

namespace App\Http\Controllers\Api;

use App\Models\Produto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    private $store;
    public function __construct(Produto $produto)
    { 
      $this->store = $produto;   
    }


    public function index()
    {
        return $this->store->paginate(12);
    }


    public function store(Request $request)
    {
        //
        $produto = new Produto();
        $produto->loja_id=$request->input("loja_id"); 
        $produto->nome=$request->input("nome"); 
        $produto->descricao=$request->input("descricao");
        $produto->preco=$request->input("preco"); 
        if($produto->save()){
            return $produto;
        } 
    }


    public function show($id)
    {
        //
        $produto = $this->store->findOrFail($id);
        return $produto;
    }

    public function update(Request $request, $id)
    {
        //
        $produto = $this->store->findOrFail($id);
        $produto->loja_id=$request->input("loja_id"); 
        $produto->nome=$request->input("nome"); 
        $produto->descricao=$request->input("descricao");
        $produto->preco=$request->input("preco"); 
        if($produto->update()){
            return $produto;
        } 
    }

    public function destroy($id)
    {
        //
        $produto = $this->store->findOrFail($id);
        if($produto->delete()){
            return $produto;
        }
    }
}
