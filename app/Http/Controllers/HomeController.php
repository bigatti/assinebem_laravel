<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use GuzzleHttp\Client;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $quantidade_documentos = DB::table('documentos')->count();
        $quantidade_agenda = DB::table('agendas')->count();
        return view('home', compact('quantidade_documentos', 'quantidade_agenda'));
    }    
}
