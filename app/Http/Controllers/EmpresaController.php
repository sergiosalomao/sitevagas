<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EmpresaRequest;
use App\Empresa;

class EmpresaController extends Controller
{
   
    public function index(Request $request, Empresa $empresa)
    {
        $dados = $empresa->newQuery();
        if ($request->filled('nome')) {
            $dados->where('nome', $request->nome);
        }

        if ($request->filled('email')) {
            $dados->where('email', $request->email);
        }

        return $dados->orderBy('nome')->paginate(10);
    }

   
  
    public function store(EmpresaRequest $request)
    {
       
        $dados = $request->all();
        Empresa::create($dados);
        return response('salvo com sucesso', 200);
    }

    public function show($id)
    {
        return response(['dados' => Empresa::findOrFail($id)]);
    }

    public function update(Request $request, $id)
    {
        $dados = $request->all();
        $user = Empresa::findOrFail($id);
        $user->update($dados);
        
        return response('atualizado com sucesso', 200);
    }

    public function destroy($id)
    {
        $user = Empresa::findOrFail($id);
        $user->delete();
    }
}
