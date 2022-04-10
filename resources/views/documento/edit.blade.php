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
                            <h1 class="h2 mb-0 ls-tight">Detalhes do documentos</h1>
                        </div>
                        <!-- Actions -->
                        <div class="col-sm-6 col-12 text-sm-end">
                            <div class="mx-n1">
                                <div class="container" style="padding-top: 10px;">
                                    <a href="{{route('documento.invalidar_documento',$documento->id)}}" class="btn btn-outline-danger">Invalidar documento</a>
                                
                                    <a href="{{route('documento.download_documento',$documento->id)}}" class="btn btn-outline-success">Download documento</a>
                                </div>
                            </div>
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

                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <label class="form-label" for="nome">nome_arquivo</label>
                                    <input value="{{$documento->nome_arquivo}}" type="text" class="form-control" disabled>
                                </div>
                                <div class="col">
                                    <label class="form-label" for="rg">identificacao_arquivo</label>
                                    <input value="{{$documento->identificacao_arquivo}}" type="text" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label class="form-label" for="nome">sufixo_arquivo</label>
                                    <input value="{{$documento->sufixo_arquivo}}" type="text" class="form-control" disabled>
                                </div>
                                <div class="col">
                                    <label class="form-label" for="rg">quadro_assinaturas</label>
                                    <input value="{{$documento->quadro_assinaturas}}" type="text" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label class="form-label" for="nome">url_documento</label>
                                    <input value="{{$documento->url_documento}}" type="text" class="form-control" disabled>
                                </div>
                                <div class="col">
                                    <label class="form-label" for="rg">file_path</label>
                                    <input value="{{$documento->file_path}}" type="text" class="form-control" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center" style="margin-top: 15px;">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-sm-6 col-12 mb-4 mb-sm-0">
                            <!-- Title -->
                            <h1 class="h2 mb-0 ls-tight">Partes do documento</h1>
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

                        <div class="table-responsive">
                            <table class="table table-hover table-nowrap">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Nome</th>
                                        <th scope="col">RG</th>
                                        <th scope="col">CPF</th>
                                        <th scope="col">E-mail</th>
                                        <th scope="col">DDD</th>
                                        <th scope="col">Telefone</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($documento_partes as $key => $value)
                                        <tr>
                                            <td>{{ $value->nome }}</td>
                                            <td>{{ $value->rg }}</td>
                                            <td>{{ $value->cpf }}</td>
                                            <td>{{ $value->email }}</td>
                                            <td>{{ $value->ddd }}</td>
                                            <td>{{ $value->telefone }}</td>
                                            <td class="text-end">
                                                <a href="{{ route('agenda.edit',$value->id) }}" class="btn btn-sm btn-neutral">Visualizar</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
