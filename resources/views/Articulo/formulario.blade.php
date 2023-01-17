<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>
<body>
               
<label for="nombreA">Nombre del articulo</label>
    <br>
    <input type="text" name="nombreA" class="form-control" placeholder="Nombre del articulo" value="{{$articulo->nombreA}}">
    <br>
    <label for="descripcionA">Descripcion del articulo</label>
    <br>
    <input type="text" name="descripcionA" class="form-control" placeholder="Descripcion del articulo" value="{{$articulo->descripcionA}}">
    <br>
    <label for="fotoA">Imagen del articulo</label>
    <br>
    <input type="file" name="fotoA"  placeholder="Imagen" value="{{ asset('storage/'.$articulo->fotoA)}}">
    
    @if ($articulo->fotoA)
    <img src="{{ asset('storage/'.$articulo->fotoA)}} " width="100px"  alt="">
    @endif

    <br>
    <button type="submit" name="enviar" class="btn btn-dark" value="Guardar datos">Enviar</button>
    
</body>
</html>