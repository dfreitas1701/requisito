<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Incidente;
use App\criticidade;
use App\tipoincidente;

class incidenteController extends Controller
{
    public function index(){
        $incidentes = array();
    
        foreach(Incidente::with(['criticidade', 'tipoincidente'])->get() as $incidente) {
            $temp = json_decode($incidente);
            $temp->criticidade = $incidente->criticidade;
            $temp->tipoincidente = $incidente->tipoincidente;
            if ($incidente->status == 'A'){
                $temp->status = 'Aberto';
            } else {
                $temp->status = 'Fechado';
            }
            $incidentes[] = $temp;
        }
        $total = Incidente::all()->count();
        return view('lista_incidentes', compact('incidentes', 'total'));

    }
    
    public function create(){
        return view('incluir_incidente');
    }
    
    public function edit($id){
        $incidente = Incidente::with(['criticidade', 'tipoincidente'])->findOrFail($id);
        return view('alterar_incidente', compact('incidente'));
    }
    
    public function store(Request $request){
        $i_incidente = new Incidente;
        $i_incidente->titulo = $request->titulo;
        $i_incidente->descricao = $request->descricao;
        $i_incidente->criticidade_id = $request->criticidade;
        $i_incidente->tipoincidente_id = $request->tipo;
        $i_incidente->status = 'A';
        $i_incidente->save();
        return redirect()->route('incidente.index')->with('message', 'Incidente incluído.');
    }
    
    public function update(Request $request, $id){
        $incidente = Incidente::findOrFail($id);
        $incidente->titulo = $request->titulo;
        $incidente->descricao = $request->descricao;
        $incidente->criticidade_id = $request->criticidade;
        $incidente->tipoincidente_id = $request->tipo;
        $incidente->status = $request->status;
        $incidente->save();
        return redirect()->route('incidente.index')->with('message', 'Incidente alterado.');
    }
    
    public function destroy($id){
        $incidente = Incidente::findOrFail($id);
        $incidente->destroy($id);
        return redirect()->route('incidente.index')->with('message', 'Incidente excluído.');
    }
    
    public function show($id){
//
    }

}
