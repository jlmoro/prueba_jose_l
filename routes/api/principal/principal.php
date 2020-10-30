<?php
Route::group(['middleware' =>'auth:api'], function (){
    Route::prefix('personas')->group( function(){
        $controlador = "PersonasController";
        Route::post("registrar-persona","$controlador@registrar_persona");
        Route::post("editar-persona","$controlador@editar_persona");
        Route::post("registrar-ciudad","$controlador@registrar_ciudad");
        Route::get("listar-personas","$controlador@listar_personas");
        Route::get("listar-ciudades","$controlador@listar_ciudades");
        Route::delete("{id_persona}/eliminar-persona","$controlador@eliminar_persona");
    });
});
