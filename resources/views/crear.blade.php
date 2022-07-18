<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
CREAR
<body>
    @if($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>  
            @endforeach
        </ul>
    @endif
    <form method="POST" action="{{ route('crear')}}" enctype="multipart/form-data">
        @csrf
        <label>Nombre del producto <br>
        <input type="text" name="Nombre"> </label> <br>
        <label>Precio <br>
        <input type="text" name="Precio"> </label> <br>
        <label>Categoria <br>
        @foreach ($categorias as $categoria)
            <input type="radio" name="Categoria" value="{{$categoria->id}}">{{$categoria->Nombre}}<br>
        @endforeach
        <label>Etiquetas <br>
            @foreach ($etiquetas as $etiqueta)
                <input type="checkbox" name="id_Etiqueta{{$etiqueta->Nombre}}" value="{{$etiqueta->id}}">{{$etiqueta->Nombre}}<br>
            @endforeach
        <label>Descripcion <br>
        <textarea type="text" name="Descripcion"> </textarea></label> <br>
        <label>Imagen <br>
        <input type="file" name="Imagen"> </textarea></label><br>
        <button type="submit"><p>Guardar</p></button>
    </form>
    <?php
    ?>
</body>
</html>