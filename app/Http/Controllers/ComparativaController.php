<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class ComparativaController extends Controller
{
    public function __invoke()
    {
        
        /*$process = new Process(['python','Pruebas.py']);
        
        try {
            $process->mustRun();
        
            echo $process->getOutput();
        } catch (ProcessFailedException $exception) {
            echo $exception->getMessage();
        }*/
        $Alg= DB::table('Exe_Algs')->select('Exe_Algs.*')->get();
        $Alg_ls = DB::table('Ls')->select('Ls.*')->get();
        $Alg_sa = DB::table('sa')->select('sa.*')->get();
        $Alg_ga = DB::table('ga')->select('ga.*')->get();
        return view('Comparativa')
        ->with('Alg',$Alg)
        ->with('Alg_ls',$Alg_ls)
        ->with('Alg_sa',$Alg_sa)
        ->with('Alg_ga',$Alg_ga);
    }
}
