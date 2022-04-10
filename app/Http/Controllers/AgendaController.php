<?php

namespace App\Http\Controllers;

use App\Models\agenda;
use Illuminate\Http\Request;

use App\Http\Controllers\assinebem;
use DB;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Agenda::latest()->paginate(10);
        return view('agenda.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agenda.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $agenda = Agenda::create($request->all());

        # -- caso cadastre, inserir na assine bem

        if ($agenda) {
            $assineBemController = new AssineBemController();

            $id_externo = $assineBemController->inserir_parte($agenda->id)['parte']['id_externo'];
            if($id_externo){
                DB::table('agendas')->where('id', $agenda->id)->update(['id_externo' => $id_externo]);
            }
        }

        return redirect()->route('agenda.edit',compact('agenda'))->with('success','Contato cadastrado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function show(agenda $agenda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function edit(agenda $agenda)
    {

        $assineBemController = new AssineBemController();
        $status_parte =  [];
        if ($agenda->id_externo) {
            $status_parte = $assineBemController->consultar_status_parte($agenda->id_externo);
        }

        return view('agenda.edit', compact('agenda', 'status_parte'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, agenda $agenda)
    {
        $agenda->update($request->all());
        return redirect()->route('agenda.edit',compact('agenda'))->with('success','Contato atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function destroy(agenda $agenda)
    {
        //
    }
}
