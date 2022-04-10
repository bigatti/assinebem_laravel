@extends('layouts.app')
@section('title', 'Agenda')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-sm-6 col-12 mb-4 mb-sm-0">
                            <!-- Title -->
                            <h1 class="h2 mb-0 ls-tight">Detalhes contato</h1>
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

                        <form action="{{ route('agenda.update', $agenda->id) }}" method="POST">
                            @csrf @method('PUT')
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <label class="form-label" for="nome">Nome</label>
                                        <input value="{{$agenda->nome}}" type="text" class="form-control" id="nome" name="nome" placeholder="Seu nome">
                                    </div>
                                    <div class="col">
                                        <label class="form-label" for="rg">RG</label>
                                        <input value="{{$agenda->rg}}" type="text" class="form-control" id="rg" name="rg" placeholder="rg">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label class="form-label" for="cpf">CPF</label>
                                        <input value="{{$agenda->cpf}}" type="text" class="form-control" id="cpf" name="cpf" placeholder="cpf">
                                    </div>
                                    <div class="col">
                                        <label class="form-label" for="email">E-mail</label>
                                        <input value="{{$agenda->email}}" type="text" class="form-control" id="email" name="email" placeholder="email">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label class="form-label" for="ddd">DDD</label>
                                        <input value="{{$agenda->ddd}}" type="text" class="form-control" id="ddd" name="ddd" placeholder="ddd">
                                    </div>
                                    <div class="col">
                                        <label class="form-label" for="telefone">Telefone</label>
                                        <input value="{{$agenda->telefone}}" type="text" class="form-control" id="telefone" name="telefone" placeholder="telefone">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <label class="form-label" for="status">Status na Assine Bem</label>
                                        <input value="{{$status_parte}}" type="text" class="form-control" disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="container" style="padding-top: 10px;">
                                <button class="btn btn-outline-primary">Alterar</button>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
