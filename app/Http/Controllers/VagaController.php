<?php

namespace App\Http\Controllers;

use App\Http\Requests\VagaRequest;
use Illuminate\Http\Request;
use App\Vaga;


class VagaController extends Controller
{
 
    public function __construct()
    {
        $this->middleware('jwt.verify', ['except' => ['index']]);
    }
    
    public function index(Request $request, Vaga $vaga)
    {
        $dados = $vaga->newQuery();
        if ($request->filled('titulo')) {
            $dados->where('titulo', $request->titulo);
        }

        if ($request->filled('descricao')) {
            $dados->where('descricao', $request->descricao);
        }

        return $dados->orderBy('titulo')->paginate(10);
    }


    public function store(VagaRequest $request)
    {
        Vaga::create($request->all());
        return response('salvo com sucesso', 200);
    }


    public function show($id)
    {
        return response(['dados' => Vaga::findOrFail($id)]);
    }

    public function update(Request $request, $id)
    {
        $dados = $request->all();
        $vaga = Vaga::findOrFail($id);
        $vaga->update($dados);

        return response('atualizado com sucesso', 200);
    }


    public function destroy($id)
    {
        $vaga = Vaga::findOrFail($id);
        $vaga->delete();
    }
}