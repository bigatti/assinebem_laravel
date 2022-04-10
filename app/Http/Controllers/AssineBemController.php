<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use App\Models\documento;

use GuzzleHttp\Client;
use DB;
use File;
use Storage;

class AssineBemController extends Controller
{
    public function monta_security_hash($endpoint='', $query_string='')
    {
        $url_request = env('ASSINE_BEM_URL').$endpoint;
        $token_acesso = hash('sha256', $url_request.env('ASSINE_BEM_SECRET').$query_string);
        $security_hash = base64_encode(env('ASSINE_BEM_TOKEN').':'.$token_acesso);
        return $security_hash;
    }

    public function send_request($tipo_requisicao,$security_hash, $endpoint, $params)
    {
        $client = new Client();
        $url_endpoint = env('ASSINE_BEM_URL').$endpoint;
        $headers = [ 'SECURITY-HASH' => $security_hash];

        # --- caso seja POST precisa enviar form_params
        if ($tipo_requisicao == 'POST') {
            $response = $client->request($tipo_requisicao, $url_endpoint, [
                'headers' => $headers,
                'verify'  => false,
                'form_params' => ($params ? $params : null)
            ]);
        # --- caso seja GET precisa enviar a query junto apenas.
        }else{
            $response = $client->request($tipo_requisicao, $url_endpoint, [
                'headers' => $headers,
                'query' => $params
            ]);
        }

        $json = json_decode($response->getBody(), true);

        return $json;
    }

    public function get_identifier()
    {
        # -- endpoint de solicitar identificacao do documento vazio na assine bem ---
        $url = '/documento/get_identifier_to_upload';
        $security_hash_fmt = $this->monta_security_hash($url, '');
        $result = $this->send_request('GET',$security_hash_fmt, $url, '');
        return $result['identifier'];
    }

    public function inserir_parte($agenda_id)
    {
        # -- pega info da agenda --
        $contato = DB::table('agendas')->where('id', $agenda_id)->first();

        $params  = [
            'id_validacao_bloco' => '2',
            'id_tipo_telefone' => '2',
            'identificacao_parte' => 'Parte 1',
            'id_referencia' => $contato->id,
            'nome' => $contato->nome,
            'rg' => $contato->rg,
            'cpf' => $contato->cpf,
            'email' => $contato->email,
            'ddd' => $contato->ddd,
            'telefone' => $contato->telefone
        ];

        # -- endpoint de solicitar criacao da parte ---
        $url = '/parte';
        $security_hash_fmt = $this->monta_security_hash($url, '');
        $result = $this->send_request('POST', $security_hash_fmt, $url, $params);

        return $result;
    }

    public function consultar_status_parte($id_externo)
    {
        $params  = ['id_externo' => $id_externo];
        $url = '/parte/status';
        $security_hash_fmt = $this->monta_security_hash($url, 'id_externo='.$id_externo);
        $result = $this->send_request('GET', $security_hash_fmt, $url, $params);

        if ($result) {
            return $result['descricao'];
        }
        return Null;
    }

    public function download_documento($documento_id)
    {
        $documento = Documento::where('id',$documento_id)->first();
        $params = [
            'id_externo' => $documento->id_externo,
            'assinado'=> '1'
        ];

        $url = '/documento/download';
        $security_hash_fmt = $this->monta_security_hash($url, http_build_query($params));
        $result = $this->send_request('GET', $security_hash_fmt, $url, $params);
        return $result;
    }

    public function invalidar_documento($documento_id)
    {
        $documento = Documento::where('id',$documento_id)->first();
        $params  = ['id_externo' => $documento->id_externo];
        $url = '/documento/invalidar';
        $security_hash_fmt = $this->monta_security_hash($url, '');

        $result = $this->send_request('POST', $security_hash_fmt, $url, $params);

        if ($result) {
            return $result['mensagem'];
        }
        return Null;
    }

    public function usar_parte_existente($agenda_id)
    {
        # -- pega info da agenda --
        $contato = DB::table('agendas')->where('id', $agenda_id)->first();
        $result = [
            'id_validacao_bloco' => 2,
            'id_externo'=> $contato->id_externo,
            'identificacao_parte'=> 'parte 1',
            'id_referencia'=> 'aaa111', 
            'ordem_assinatura' => 0
        ];

        return $result;
    }

    public function upload_documento($documento_id)
    {
        # -- busca no banco

        $documento = Documento::where('id',$documento_id)->first();
        # -- solicita identifier na assine bem
        $identifier = $this->get_identifier();

        $params = [
            'id_identifier' => $identifier,
            'identificacao_arquivo' => $documento->identificacao_arquivo,
            'sufixo_arquivo' => $documento->sufixo_arquivo,
            'lista_partes' => json_encode($this->usar_parte_existente(9))
        ];

        if($documento->url_documento != ''){
            $params['url_arquivo'] = $documento->url_documento;
        }else{
            # -- precisa pegar o arquivo em si, converter em md5 para enviar na request
            $file_base64 = base64_encode(Storage::disk('public')->get($documento->file_path));
            $params['arquivo'] = $file_base64;
        }
        # -- endpoint de solicitar upload do documento ---
        $url = '/documento';
        $security_hash_fmt = $this->monta_security_hash($url, '');

        $result = $this->send_request('POST', $security_hash_fmt, $url, $params);
        return $result;
    }

    public function upload_documento_exemplo()
    {
        $url_documento = 'http://www.gbigatti.com/assinebem/teste.pdf';

        # -- solicita identifier
        $identifier = $this->get_identifier();

        $params = [
            'id_identifier' => $identifier,
            'url_arquivo' => $url_documento,
            'identificacao_arquivo' => 'teste_'.date('d_m_Y_H_i'),
            'sufixo_arquivo' => 'pdf',
            'lista_partes' => json_encode($this->usar_parte_existente(9))
        ];

        # -- endpoint de solicitar upload do documento ---
        $url = '/documento';
        $security_hash_fmt = $this->monta_security_hash($url, '');

        $result = $this->send_request('POST', $security_hash_fmt, $url, $params);
        return $result;
    }

}
