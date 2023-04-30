<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Vendedor;
class VendedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = DB::SELECT("SELECT 
        Vend,
        Nombre,
        Comision,
        Usuario,
        usuFecha,
        usuHora,
        Activo,
        foraneo
        FROM vends
        ");
        return $query;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            if($request->editar == 1){
                $ven = Vendedor::findOrFail($request->Vend);
            }else{
                $ven = new Vendedor;
                $ven->Vend                = $request->Vend;
            }
            $ven->Nombre                  = $request->Nombre;
            $ven->Comision                = $request->Comision;
            $ven->Usuario                 = $request->Usuario;
            $ven->usuFecha                = $request->usuFecha;
            $ven->usuHora                 = $request->usuHora;
            $ven->Activo                  = $request->Activo;
            $ven->foraneo                 = $request->foraneo;
            $ven->save();
            return $ven;
            } catch (\Exception  $ex) {
                //quitar la variables errors en produccion
                return ["status" => "0","message" => "Hubo problemas para guardar","errors" =>$ex];
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $query = $this->searchxId($id);
        if(empty($query)){
            return ["status" => "0", "message" => "No hay datos que mostrar"];
        }
        return $query;
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
    }
    public function delete($id)
    {
        $query = $this->searchxId($id);
        if(empty($query)){
            return ["status" => "0", "message" => "No se encontro el id del vendedor"];
        }
        DB::DELETE("DELETE FROM vends WHERE Vend = '$id'");
        return ["status" => "1", "message" => "Vendedor eliminado correctamente"];
    }
    public function searchxId($id){
        $query = DB::SELECT("SELECT 
        Vend
        ,Nombre
        ,Comision
        ,Usuario
        ,usuFecha
        ,usuHora
        ,Activo
        ,foraneo
        FROM vends
        WHERE Vend = '$id'
        ");
        return $query;
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
    }
}
