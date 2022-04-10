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
                            <h1 class="h2 mb-0 ls-tight">Agenda</h1>
                        </div>
                        <!-- Actions -->
                        <div class="col-sm-6 col-12 text-sm-end">
                            <div class="mx-n1">
                                <a href="{{route('agenda.create')}}" class="btn d-inline-flex btn-sm btn-primary mx-1">
                                    <span class=" pe-2">
                                        <i class="fa fa-plus"></i>
                                    </span>
                                    <span>Criar novo</span>
                                </a>
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
                        <div class="table-responsive">
                            <table class="table table-hover table-nowrap">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">#</th>
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
                                    @foreach ($data as $key => $value)
                                        <tr>
                                            <td>{{ $value->id }}</td>
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
