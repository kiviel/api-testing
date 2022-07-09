<?php

namespace Tests\Feature\Http\Controllers\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    /*  
    Códigos Status 2xx:
    200: OK
    201: Created
    202: Accepted
    203: Non-Authoritative Information
    204: No content
    205: Reset Content
    206: Partial Content
    207: Multi Status
    208: Multi Estado
    */
    
    //usamos esta clase, ya que vamos a modificar datos dentro de la base de datos
    //tomar en cuenta que aqui estamos utilizando la base de datos 'databse/database.sqlite' para realizar las pruebas
    use RefreshDatabase;
    public function test_store()
    {
        $this->withoutExceptionHandling(); //metodo que nos ayuda a identificar los errores con mas claridad

        //evniamos la prueba a la ruta 'api/posts' por medio del metodo POST
        $response = $this->json('POST', 'api/posts', [
            'title' => 'El post de prueba'
        ]);

        //debemos obtener los valores aqui especificados
        //recordar que solamente declararemos de manera manual el 'title' porque los otros datos laravel los envia por defecto
        $response->assertJsonStructure(['id', 'title', 'created_at', 'updated_at'])
            //pedimnos que nos devuelva el resultado en json con el envio del parametro title
            ->assertJson(['title' => 'El post de prueba'])
            //esperamos que nos devuelva el estatus 201
            ->assertStatus(201); //status HTTP = OK, Y CREADO UN RECURSO
        
            //comprobamos que la informacion realmente está registrado en la base de datos
            $this->assertDatabaseHas('posts', ['title' => 'El post de prueba']);
    }

    public function test_validate_title(){
        //comprobamos que nuestra api recibe un titulo vacio
        $response = $this->json('POST', 'api/posts', ['title' => '']);

        //el estatus HTTP 422 significa que la solicitus fue creada con exito, pero fue imposible completarla
        //en este caso esta correcto porque estamos enviando un valor vacio
        $response->assertStatus(422)
        ->assertJsonValidationErrors('title');
    }
}
