@extends('layouts.app')
@section('title', 'Documento')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-sm-6 col-12 mb-4 mb-sm-0">
                            <!-- Title -->
                            <h1 class="h2 mb-0 ls-tight">Cadastrar documento</h1>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div id="body">

                        <form action="{{ route('documento.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="container">

                                <div class="row">
                                    <div class="col">
                                        <label class="form-label" for="file_path">Tipo de documento</label>

                                        <label class="container">
                                            Upload
                                            <input type="radio" id="radio_tipo" name="radio_tipo" onclick="verifica_tipo(1)" checked>
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="container">
                                            Link
                                            <input type="radio" id="radio_tipo" name="radio_tipo" onclick="verifica_tipo(2)">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="row" id="escolher_doc">
                                    <div class="col" id="eh_upload">
                                        <label class="form-label" for="file_path">Upload documento</label>
                                        <input type="file" name="file" id="file" class="form-control">
                                    </div>

                                    <div class="col" id="eh_link" style="display: none;">
                                        <label class="form-label" for="url_documento">URL do documento</label>
                                        <input type="text" class="form-control" id="url_documento" name="url_documento" placeholder="https://teste.com.br/teste.pdf">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <label class="form-label" for="nome_arquivo">Nome arquivo</label>
                                        <input type="text" class="form-control" id="nome_arquivo" name="nome_arquivo" placeholder="Nome do arquivo" required>
                                    </div>
                                    <div class="col">
                                        <label class="form-label" for="identificacao_arquivo">Identificação do arquivo</label>
                                        <input type="text" class="form-control" id="identificacao_arquivo" name="identificacao_arquivo" placeholder="identificacao_arquivo" required>
                                    </div>
                                    <div class="col">
                                        <label class="form-label" for="sufixo_arquivo">Sufixo arquivo</label>
                                        <input type="text" class="form-control" id="sufixo_arquivo" name="sufixo_arquivo" placeholder="sufixo_arquivo" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label class="form-label" for="nome_arquivo">Quadro de assinatura?</label>
                                        <select class="form-control" name="quadro_assinaturas" id="quadro_assinaturas">
                                            <option value="1">SIM</option>
                                            <option value="0">NÃO</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col">
                                        <label class="form-label" for="nome_arquivo">Escolher parte</label>
                                        <select class="form-control" name="partes[]" id="partes" multiple required>
                                            @foreach ($agendas as $key => $value)
                                                <option value="{{$value->id}}">{{$value->nome}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="container" style="padding-top: 15px;">
                                <button class="btn btn-outline-primary">Cadastrar</button>
                            </div>
                        </form>

                        <script type="text/javascript">
                            function verifica_tipo(tipo){
                                document.getElementById('escolher_doc').style.display = 'block';

                                if (tipo == '1') {                                    
                                    document.getElementById('eh_upload').style.display = 'block';
                                    document.getElementById('eh_link').style.display = 'None';

                                }else{
                                    document.getElementById('eh_upload').style.display = 'None';
                                    document.getElementById('eh_link').style.display = 'block';
                                }
                            }
                        </script>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
