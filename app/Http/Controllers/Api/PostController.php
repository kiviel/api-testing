<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Http\Requests\Post as PostRequest;

class PostController extends Controller
{

    //creo una entidad en donde almacenaremos la informacion que recibiremos de la clase Post
    protected $post;

    public function __construct(Post $post)
    {
        //Al asignar la clase post a una variable, garantizamos que si alguna vez necesitamos cambiar el nombre de la clase por algun motivo 
        //el único lugar donde tendríamos que cambiar el nombre de ese llamado a la clase sería justamente en el constructor.
        //De esta forma es más fácil mantener nuestro código en perfecto funcionamiento y aseguramos escalabilidad.
        $this->post = $post;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        //necesitamos guardar todo lo que nos llega por medio del $request
        $post = $this->post->create( $request->all() );

        //retornamos un json con los datos del post y un estatus HTTP 201
        return response()->json($post, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
