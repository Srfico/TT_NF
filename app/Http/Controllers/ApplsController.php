<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LsRequest;
use App\Models\Ls;
use Illuminate\Support\Facades\DB;

class ApplsController extends Controller
{
    public function __invoke()
    {
        return view('AppLs');
    }
    public function SaveLs(LsRequest $request)
    {
        $LsApp = new Ls();
        $LsApp->Vertice_Inicial=$request->Vertice_Inicial;
        $LsApp->Num_Iteraciones=$request->Num_Iteraciones;
        $LsApp->Num_Vecinas=$request->Num_Vecinas;
        $LsApp->Tiempo_Lim=$request->Tiempo_Lim;
        $LsApp->Tipo_Improv=$request->Tipo_Improv;
        $LsApp->save();
        
        $RegsLs = DB::table('Ls')->select('Ls.*')->get();
        return view('AppLs')->with('RegsLs',$RegsLs);

    }
}
