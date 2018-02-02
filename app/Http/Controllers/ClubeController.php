<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clube;

class ClubeController extends Controller
{
    public function index() {
        $clubes = Clube::all();
        $total = Clube::all()->count();
        return view('list-clubes', compact('clubes', 'total'));
    }

    public function create(){
    	return view('include-clube');
    }

    public function store(Request $request) {
        $clube = new Clube;
        $clube->nome = $request->nome;
        $clube->save();
        return redirect()->route('clube.index')->with('message', 'Clube criado com sucesso!');
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        $clube = Clube::findOrFail($id);
        return view('alter-clube', compact('clube'));
    }

    public function update(Request $request, $id) {
        $clube = Clube::findOrFail($id); 
        $clube->nome = $request->nome;
        $clube->save();
        return redirect()->route('clube.index')->with('message', 'Clube alterado com sucesso!');
    }

    public function destroy($id) {
        $clube = Clube::findOrFail($id);
        $clube->delete();
        return redirect()->route('clube.index')->with('message', 'Clube excluído com sucesso!');
    }






}
