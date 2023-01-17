<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;
use Illuminate\Support\Facades\Storage;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 
    public function index()
    {
        //
        $Articulo=  Articulo::all();
        return view('Articulo.Articulo',compact('Articulo'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $articulo= new Articulo();
        $articulo->descripcionA='';
        $articulo->nombreA='';
        $articulo->fotoA='';
        return view('Articulo.crear',compact('articulo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'fotoA' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);
        
       /*  $input = $request->all();
  
        if ($image = $request->file('fotoA')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['fotoA'] = "$profileImage";
        }

        Articulo::create($input);
             */
            $articulo = new Articulo($request->all());
        $path = $request->fotoA->store('public/image/');
//        $path = $request->image->storeAs('public/articles', $request->user()->id . '_' . $article->title . '.' . $request->image->extension());

        $articulo->fotoA ='image/' . basename(time().'-'.$path);
        $articulo->save();
        return redirect('/Articulo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $articulo=Articulo::findOrFail($id);
        return view('Articulo.editar',compact('articulo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        /* $Datos=request()->except(['_token','method']); */
        
       /*  if($request->hasfile('fotoA')){
        $articulo=Articulo::findOrFail($id);     
        Storage::delete('public/image'.$articulo->fotoA);
        $articulo->fotoA=$request->file('fotoA');
       }  */
       /* 
        $articulo=Articulo::findOrFail($id);
        $articulo->nombreA=$request->nombreA;
        $articulo->descripcionA=$request->descripcionA;
        $articulo->fotoA=$request->fotoA;
         
         $articulo->save(); */
       /*  Articulo::where('id','=', $id)->update($Datos); */
      
        $articulo=Articulo::findOrFail($id);
        $articulo->nombreA=$request->nombreA;
        $articulo->descripcionA=$request->descripcionA;
        unlink(storage_path('app/public/'.$articulo->fotoA));
        if ($request->hasFile('fotoA')) {
            $path = $request->fotoA->store('public/image');
            $articulo->fotoA = 'image/' . basename(time().'-'.$path);
    
           }
        $articulo->save();
        
        return redirect('/Articulo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $articulo=Articulo::find($id);
        unlink(storage_path('app/public/'.$articulo->fotoA));
        $articulo->delete();
        return redirect('Articulo');
    }
}
