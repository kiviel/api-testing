
<p align="center"><img src="https://marsner.com/wp-content/uploads/test-driven-development-TDD.png" width="400"></p>

## TDD (Test-Driven Development) 😃 

Desarrollo Guiado por Pruebas es una práctica de programación que consiste en escribir primero las pruebas (generalmente unitarias), después escribir el código fuente que pase la prueba satisfactoriamente y, por último, refactorizar el código escrito.

## Notas
-204 es un estatus HTTP que indica que no esta enviando nada, pero que la peticion se cumple.
-401 estatus HTTP que indica que el usuario No está autorizado para realizar peticiones a la API

--$this->withoutExceptionHandling(); 
metodo que nos ayuda a identificar los errores con mas claridad

--En la refactorización es importante obtener el verde en el test sin que este sea modificado, ya que ese es el punto de los test

-la autenticacion de una API se realiza mediante token, usando el middleware 'auth:api' en la ruta
--ejemplo: Route::apiResource('posts', PostController::class )->middleware('auth:api');

-para hacer pruebas usando una autenticacion de prueba es necesario crear un usuario y decirle a la ruta que acceda como el usuario creado
--ejemplo: 
//creamos un usuario falso para hacer las pruebas
        $user = User::factory()->create();
//luego usamos el metodo actingAs() para autencar el usuario creado
        $response = $this->actingAs($user, 'api')->json('GET', "api/posts/1000");

* tomar en cuenta que cuando estemos trabajando con pruebas de acceso web, este parametro de autenticación mediante token no debe configurarse

