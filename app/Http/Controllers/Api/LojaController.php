<?php

namespace App\Http\Controllers\Api;

use App\Models\Loja;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LojaController extends Controller
{

    private $store;

    public function __construct(Loja $loja)
    {
        $this->store = $loja;

    }

 
    public function index()
    {
        //
        return $this->store->paginate(12);
    }


    public function store(Request $request)
    {

        $loja = new Loja();
        $loja->nome =  $request->input("nome");
        $loja->telefone =  $request->input("telefone");
        $loja->email =  $request->input("email");
        $loja->bairro =  $request->input("bairro");
        $loja->estado =  $request->input("estado");
        $loja->cep =  $request->input("cep");
        $loja->descricao =  $request->input("descricao");
        if($loja->save())
        {
            return $loja;
        }
        
    }


    public function show($id)
    {
        //
        $loja = $this->store->with("produtos")->findOrFail($id);
        return $loja;
    }

    public function update(Request $request, $id)
    {
        //
        $loja = $this->store->findOrFail($id);
        $loja->nome =  $request->input("nome");
        $loja->telefone =  $request->input("telefone");
        $loja->email =  $request->input("email");
        $loja->bairro =  $request->input("bairro");
        $loja->estado =  $request->input("estado");
        $loja->cep =  $request->input("cep");
        $loja->descricao =  $request->input("descricao");
        if($loja->save())
        {
            return $loja;
        }
    }


    public function destroy($id)
    {
        //
        $loja = $this->store->findOrFail($id);
        if($loja->delete())
        {
           return $loja;
        }
    }
}
