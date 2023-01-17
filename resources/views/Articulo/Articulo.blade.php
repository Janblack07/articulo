<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<h1>Mostrar Lista de Articulos</h1>
    <div>
        <button class="btn btn-dark mb-2"> <a style="text-decoration:none; color:white;" href="{{url('Articulo/create')}}">Ir a agregar un articulo</a></button>
    </div>
     <table class="table  table-secondary table-striped-columns border-dark  table-hover ">
        <thead >
            <tr>
                <th class="text-center" >id</th>
                <th class="text-center">Nombre del Articulo</th>
                <th class="text-center">Descripcion del Artriculo</th>
                <th class="text-center">Foto del articulo</th>
                <th class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach( $Articulo as $articulo) 
            <tr>
                <td class="text-center">{{$articulo->id}}</td>
                <td class="text-center">{{$articulo->nombreA}}</td>
                <td class="text-center">{{$articulo->descripcionA}}</td>
                <td class="text-center"><img src="{{ asset('storage/'.$articulo->fotoA)}}" width="100px"></td>
                <td class="text-center  w-25 " ><button class="btn btn-info "> 
                    <a style="text-decoration:none; color:black" 
                    href="{{url('/Articulo/'.$articulo->id.'/edit')}}"><b>Editar</b></a></button>
                    
                    <form action="{{url('/Articulo/'.$articulo->id)}}" method="post" >
                        @csrf
                        {{method_field('DELETE')}}
                        <button class="btn btn-danger mt-2 "><b>Eliminar</b> </button> </td>
                    </form>
            </tr>
            @endforeach
        </tbody>
    </table>
 
</body>
</html>