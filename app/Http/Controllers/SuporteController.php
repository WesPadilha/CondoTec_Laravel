<?php

namespace App\Http\Controllers;

use App\Models\Suporte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuporteController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $suportes = Suporte::where('user_id', $user->id)->get();

        return view('suporte', compact('user', 'suportes'));
    }

    public function store(Request $request)
    {
        // Obtém o usuário autenticado
        $user = Auth::user();

        try {
            // Cria um novo suporte com os dados do formulário
            $suporte = new Suporte();
            $suporte->user_id = $user->id;
            $suporte->categoria = $request->categoria;
            $suporte->informacao = $request->informacao;
            $suporte->descricao = $request->descricao;
            $suporte->carater = $request->carater;
            $suporte->protocolo = uniqid();
            $suporte->save();

            // Redireciona de volta à página de suporte com uma mensagem de sucesso, incluindo o protocolo
            return redirect()->route('suporte')->with('status', 'Suporte registrado com sucesso! Protocolo: ' . $suporte->protocolo);
        } catch (\Exception $e) {
            // Em caso de erro, redireciona de volta com uma mensagem de erro
            return redirect()->back()->with('error', 'Erro ao registrar o suporte: ' . $e->getMessage())->withInput();
        }
    }


    public function show()
    {
        $user = Auth::user();
        $suportes = Suporte::where('user_id', $user->id)->get();

        return view('visualizar_suporte', compact('user', 'suportes'));
    }

    public function update(Request $request, $protocolo)
    {
        $suporte = Suporte::where('protocolo', $protocolo)->firstOrFail();
        $suporte->update($request->only('informacao', 'descricao'));
        
        return redirect()->route('visualizar_suporte')->with('status', 'Suporte atualizado com sucesso!');
    }

    public function destroy($protocolo)
    {
        $suporte = Suporte::where('protocolo', $protocolo)->firstOrFail();
        $suporte->delete();
        
        return redirect()->route('visualizar_suporte')->with('status', 'Suporte excluído com sucesso!');
    }
}
