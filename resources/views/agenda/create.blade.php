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
                            <h1 class="h2 mb-0 ls-tight">Cadastrar contato</h1>
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

                        <form action="{{ route('agenda.store') }}" method="POST">
                            @csrf
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <label class="form-label" for="nome">Nome</label>
                                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Seu nome">
                                    </div>
                                    <div class="col">
                                        <label class="form-label" for="rg">RG</label>
                                        <input type="text" class="form-control" id="rg" name="rg" placeholder="rg">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label class="form-label" for="cpf">CPF</label>
                                        <input type="text" class="form-control" id="cpf" name="cpf" placeholder="cpf">
                                    </div>
                                    <div class="col">
                                        <label class="form-label" for="email">E-mail</label>
                                        <input type="text" class="form-control" id="email" name="email" placeholder="email">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label class="form-label" for="ddd">DDD</label>
                                        <input type="text" class="form-control" id="ddd" name="ddd" placeholder="ddd">
                                    </div>
                                    <div class="col">
                                        <label class="form-label" for="telefone">Telefone</label>
                                        <input type="text" class="form-control" id="telefone" name="telefone" placeholder="telefone">
                                    </div>
                                </div>
                            </div>

                            <div class="container" style="padding-top: 10px;">
                                <button class="btn btn-outline-primary">Cadastrar</button>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
