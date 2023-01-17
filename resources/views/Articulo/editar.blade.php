
 <div>
        <button class="btn btn-dark mb-2"> <a style="text-decoration:none; color:white;" href="{{url('/Articulo')}}">Ir a agregar un articulo</a></button>
    </div> 
<form action="{{url('/Articulo/'.$articulo->id)}} " method="post" enctype="multipart/form-data">
@csrf
<!-- {{method_field('PATCH') }} -->
@method('PUT')
@include('Articulo.formulario')

</form>