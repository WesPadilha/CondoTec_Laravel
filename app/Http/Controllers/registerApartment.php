<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Apartamento;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $numero_apartamento = $user->apartamento->numero_apartamento ?? 'Número de apartamento não registrado';
        return view('dashboard', compact('user', 'numero_apartamento'));
    }

    public function registerApartment(Request $request)
    {
        $request->validate([
            'numero_apartamento' => 'required|string|max:255|unique:apartamentos,numero_apartamento',
        ]);

        $user = Auth::user();

        // Verifica se o usuário já tem um apartamento registrado
        if ($user->apartamento) {
            return redirect()->route('dashboard')->with('error', 'Você já registrou um número de apartamento.');
        }

        // Cria um novo registro de apartamento
        $apartamento = new Apartamento();
        $apartamento->user_id = $user->id;
        $apartamento->numero_apartamento = $request->numero_apartamento;
        $apartamento->save();

        return redirect()->route('dashboard')->with('status', 'Número do apartamento registrado com sucesso!');
    }
}
