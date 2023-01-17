<h1>crear</h1>
<div>
        <button class="btn btn-dark mb-2"> <a style="text-decoration:none; color:white;" href="{{url('/Articulo')}}">Ir a agregar un articulo</a></button>
    </div> 
<form action="{{url('/Articulo')}}" method="post" enctype="multipart/form-data">
    @csrf
    @include('Articulo.formulario',['articulo'=>$articulo])
</form>