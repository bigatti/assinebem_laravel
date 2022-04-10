@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div style="max-width: 23rem; margin: 10px;" class="col mb-3 p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                            <a href="#">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center">
                                    {{$quantidade_documentos}}
                                </h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 text-center">
                                Quantidade de documentos solicitados
                            </p>
                        </div>

                        <div style="max-width: 23rem; margin: 10px;" class="col mb-3 p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                            <a href="#">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center">
                                    {{$quantidade_agenda}}
                                </h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 text-center">
                                Quantidade de pessoas na agenda
                            </p>
                        </div>
                        
                    </div>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
