<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clube;
use App\Socio;

class SocioController extends Controller
{
    public function index() {
        $socios = Socio::all();
        $total = Socio::all()->count();
        return view('list-socios', compact('socios', 'total'));
    }

    public function create(){
    	$clubes = Clube::all();
    	return view('include-socio', compact('clubes'));
    }

    public function store(Request $request) {
        $socio = new Socio;
        $socio->nome = $request->nome;
        $socio->clube_id = $request->clube_id;
        $socio->save();
        return redirect()->route('socio.index')->with('message', 'Socio criado com sucesso!');
    }

    public function show($id) {
        //
    }	

    public function edit($id) {
    	$clubes = Clube::all();
        $socio = Socio::findOrFail($id);
        return view('alter-socio', compact('clubes','socio'));
    }

    public function update(Request $request, $id) {
        $socio = Socio::findOrFail($id); 
        $socio->nome = $request->nome;
        $socio->clube_id = $request->clube_id;
        $socio->save();
        return redirect()->route('socio.index')->with('message', 'Socio alterado com sucesso!');
    }

    public function destroy($id) {
        $socio = Socio::findOrFail($id);
        $socio->delete();
        return redirect()->route('socio.index')->with('message', 'Socio excluído com sucesso!');
    }
}
