<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Previsao;

class PrevisaoController extends Controller
{
    public function index()
    {
        $previsoes = Previsao::all();
        return view('previsao', compact('previsoes'));
    }

    public function buscar(Request $request)
    {
        $cidade = $request->input('cidade');

        $apiKey = '0347ffe0f367fd5390c7565c0e1342ae'; // Substitua pela sua chave de API do OpenWeatherMap
        $url = "http://api.openweathermap.org/data/2.5/weather?q={$cidade}&units=metric&appid={$apiKey}&lang=pt_br";

        $response = Http::get($url);

        if ($response->successful()) {
            $dados = $response->json();

            $previsao = Previsao::updateOrCreate(
                ['cidade' => $cidade],
                [
                    'descricao' => $dados['weather'][0]['description'],
                    'temperatura' => $dados['main']['temp']
                ]
            );

            return redirect()->route('previsao.index')->with('success', 'Previsão atualizada!');
        } else {
            return redirect()->route('previsao.index')->with('error', 'Cidade não encontrada.');
        }
    }
}
