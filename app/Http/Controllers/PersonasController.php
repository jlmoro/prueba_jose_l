<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\{
  Personas,
  Ciudades
};


class PersonasController extends Controller
{
  public function listar_personas()
  {
    try {

      return DB::table('personas')
      ->join('ciudad', 'personas.id_ciudad', '=', 'ciudad.id')
      ->select('personas.*','ciudad.nombre_ciudad as ciudad',)
      ->orderBy('personas.created_at','DESC')
      ->get();

    } catch (\Exception $e) {
      return $e;
    }
  }

  public function listar_ciudades()
  {
    try {

      return Ciudades::Select('id as value','nombre_ciudad as text')
      ->orderBy('created_at','DESC')
      ->get();

    } catch (\Exception $e) {
      return $e;
    }
  }

  public function registrar_persona(Request $request)
  {
    try {

      return DB::transaction(function() use($request){

        // dd($request->all());

        Personas::create($request->all());

        return 'Creado Correctamente';

      },5);

    } catch (\Exception $e) {
      return $e;
    }

  }

  public function registrar_ciudad(Request $request)
  {
    try {

      return DB::transaction(function() use($request){

        Ciudades::create($request->all());

        return 'Creado Correctamente';

      },5);

    } catch (\Exception $e) {
      return $e;
    }

  }
}
