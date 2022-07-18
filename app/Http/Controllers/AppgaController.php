<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\GaRequest;
use App\Models\Ga;
use Illuminate\Support\Facades\DB;

class AppgaController extends Controller
{
    public function __invoke()
    {
        return view('AppGa');
    }
    public function SaveGa(GaRequest $request)
    {
        $GaApp = new Ga();
        $GaApp->Vertice_Inicial=$request->Vertice_Inicial;
        $GaApp->Num_Iteraciones=$request->Num_Iteraciones;
        $GaApp->Num_IterMax_WMejora=$request->Num_IterMax_WMejora;
        $GaApp->Num_Individuos=$request->Num_Individuos;
        $GaApp->Cruce=$request->Cruce;
        $GaApp->Mutacion=$request->Mutacion;
        $GaApp->Prob_Mutacion=$request->Prob_Mutacion;
        $GaApp->Fitness_Opt=$request->Fitness_Opt;
        $GaApp->Tiempo_Lim=$request->Tiempo_Lim;
        $GaApp->Elites=$request->Elites;
        $GaApp->save();
        
        $RegsGa = DB::table('Ga')->select('Ga.*')->get();
        return view('AppGa')->with('RegsGa',$RegsGa);
    }
}
