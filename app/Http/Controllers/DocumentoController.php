<?php

namespace App\Http\Controllers;

use App\Models\documento;
use App\Models\documento_partes;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Storage;
class DocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Documento::latest()->paginate(10);
        return view('documento.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agendas = DB::table('agendas')->get();
        return view('documento.create', compact('agendas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        # --- Documento
        $documento =  new Documento();
        if ($request->hasFile('file')) {
            $request->file->store('documentos', 'public');
            $documento->file_path = 'documentos/'.$request->file->hashName();
        }

        $documento->nome_arquivo = $request->nome_arquivo;
        $documento->identificacao_arquivo = $request->identificacao_arquivo;
        $documento->sufixo_arquivo = $request->sufixo_arquivo;
        $documento->quadro_assinaturas = $request->quadro_assinaturas;
        $documento->id_documento_status = $request->id_documento_status;
        $documento->url_documento = $request->url_documento;

        $documento->save();

        # --- FIM documento

        # --- cadastra partes no documento ---
        foreach ($request->partes as $key => $value) {
            $documento_parte =  new documento_partes();
            $documento_parte->documento_id = $documento->id;
            $documento_parte->parte_documento_id = $value;
            $documento_parte->save();
        }
        # --- FIM partes no documento ---

        # --- Enviar para assine bem ---

        $assineBemController = new AssineBemController();
        $dados_documento = $assineBemController->upload_documento($documento->id);
        if ($dados_documento['documento']['id_externo']) {
            DB::table('documentos')->where('id', $documento->id)->update(['id_externo' => $dados_documento['documento']['id_externo']]);
        }
        

        # --- FIM Enviar para assine bem ---

        return redirect()->route('documento.edit',compact('documento'))->with('success','Documento solicitado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function show(documento $documento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function edit(documento $documento)
    {
        $documento_partes = DB::table('documento_partes')
            ->join('agendas', 'agendas.id', '=', 'documento_partes.parte_documento_id')
            ->select('agendas.*','documento_partes.identificacao_parte')
            ->where('documento_partes.documento_id', $documento->id)->get();
        return view('documento.edit', compact('documento', 'documento_partes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, documento $documento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function destroy(documento $documento)
    {
        //
    }

    public function invalidar_documento($id)
    {
        $assineBemController = new AssineBemController();
        $assineBemController->invalidar_documento($id);
        $documento = Documento::where('id',$id)->first();

        return redirect()->route('documento.edit',compact('documento'))->with('success','Documento solicitado com sucesso.');
    }

    public function download_documento($id)
    {
        $assineBemController = new AssineBemController();
        $download = $assineBemController->download_documento($id);

        header("Content-Type: application/pdf");
        header("Content-Disposition: inline;");
        echo file_get_contents('data://application/pdf;base64,' . $download['arquivo']);

    }

}
