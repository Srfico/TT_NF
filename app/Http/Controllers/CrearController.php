<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\CreateEtiquetRequest;
use App\Http\Requests\CreateProdEtiqRequest;
use App\Http\Requests\CreateProductRequest;
use App\Models\Categoria;
use App\Models\Etiqueta;
use App\Models\Producto;
use App\Models\Producto_Etiqueta;
use CreateTableProdEtiq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CrearController extends Controller
{
    public function __invoke()
    {
        $categorias = DB::table('categorias')
                    ->select('categorias.*')
                    ->get();
        $etiquetas = DB::table('etiquetas')
                    ->select('etiquetas.*')
                    ->get();
        $prodetiqs = DB::table('productos_etiquetas')
                    ->select('productos_etiquetas.*')
                    ->get();
        return view('crear')
        ->with('categorias',$categorias)
        ->with('etiquetas',$etiquetas)
        ->with('prodetiqs',$prodetiqs);
    }
    public function __invokeC()
    {
        return view('crearC');
    }
    public function __invokeE()
    {
        return view('crearE');
    }
    public function guardado(CreateProductRequest $request)
    {
        /*if($imagen=$request->file('imagen'))
        {
            $nombre=time().".".$imagen->getClientOriginalExtension();
            $destino=public_path('images\products');
            $request->Imagen->move($destino,$nombre);
            $url=$destino."\\".$nombre;
            $entrada['Imagen']=$url;
        }*/
    
        $imagen=$request->file('Imagen');
        if(is_null($imagen)==0){
            $nombre=$imagen->getClientOriginalName().$imagen->getClientOriginalExtension();
            $destino=public_path('images\products');
            $request->Imagen->move($destino,$nombre);
            $entrada=$request->validated();
            $entrada['Imagen']="images\products\\".$nombre;
        }
        else{
            $entrada=$request->validated();
        }
        $arreglo=array();
        $numero=0;
        foreach($_POST as $vector)
        {
            if(ctype_digit($vector)==1){
                $aux=$vector;
                $n = 0;
                do{
	            $aux = floor($aux / 10);
	             $n = $n + 1;
                 } while ($aux > 0);
                 if($n==1)
                 {
                     if($numero==1){
                        array_push($arreglo,$vector);
                     }
                     else{
                         $numero=$numero+1;
                     }
                 }
            }
        }
        foreach($arreglo as $i){
            echo $i;
        }
        Producto::create($entrada);
        echo "<br>";
        $vars=DB::table('productos')->select('productos.*')->orderBy('id','DESC')->get();
        $var=$vars[0]->id;
        foreach($arreglo as $i)
        {
            Producto_Etiqueta::create([
                'id_Producto'=>$var,
                'id_Etiqueta'=>$i
            ]);
        }
        return redirect('menu');
    }
    public function guardadoC(CreateCategoryRequest $request)
    {

        Categoria::create($request->validated());

        return redirect('menu');
    }
    public function guardadoE(CreateEtiquetRequest $request)
    {
        Etiqueta::create($request->validated());

        return redirect('menu');
    }
}
