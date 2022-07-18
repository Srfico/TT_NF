<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SaRequest;
use App\Models\Sa;
use Illuminate\Support\Facades\DB;

class AppsaController extends Controller
{
    public function __invoke()
    {
        return view('AppSa');
    }
    public function SaveSa(SaRequest $request)
    {
        $SaApp = new Sa();
        $SaApp->Vertice_Inicial=$request->Vertice_Inicial;
        $SaApp->Num_Iteraciones=$request->Num_Iteraciones;
        $SaApp->Num_Vecinas=$request->Num_Vecinas;
        $SaApp->Tiempo_Lim=$request->Tiempo_Lim;
        $SaApp->Tipo_Improv=$request->Tipo_Improv;
        $SaApp->Enfriamiento=$request->Enfriamiento;
        $SaApp->Param_Geometrico=$request->Param_Geometrico;
        $SaApp->Param_Lineal=$request->Param_Lineal;
        $SaApp->Lambda=$request->Lambda;
        $SaApp->Sigma=$request->Sigma;
        $SaApp->Gamma=$request->Gamma; 
        $SaApp->save();
        
        $RegsSa = DB::table('Sa')->select('Sa.*')->get();
        return view('AppSa')->with('RegsSa',$RegsSa);

    }
}
