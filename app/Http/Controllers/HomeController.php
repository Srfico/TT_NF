<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class HomeController extends Controller
{
    public function __invoke()
    {
        return view('welcome');
    }
    public function Ingreso()
    {

        /*$command = 'python GAHome.py';
        $cwd = null;
        $envVars = [ 'HOME' => getEnv('HOME'), 'PATH' => getEnv('PATH') ];
        $process = new Process(['python','GAHome.py'], $cwd, $envVars);
        $process->run();
        // executes after the command finishes
        if (!$process->isSuccessful()) {
           throw new ProcessFailedException($process);
        }
        dd($process->getOutput());*/
        /*
        $process = new Process(['python','GAHome.py']);
        try {
            $process->mustRun();
        
            echo $process->getOutput();
        } catch (ProcessFailedException $exception) {
            echo $exception->getMessage();
        }*/
        return view('welcome');
    }
}
