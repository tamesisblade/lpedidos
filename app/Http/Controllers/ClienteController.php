<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Cliente;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = DB::SELECT("SELECT 
            CLIENTE
            ,NOMBRE
            ,CALLE
            ,NUMERO
            ,COLONIA
            ,POBLA
            ,CIUDAD
            ,ESTADO
            ,PAIS
            ,TELEFONO
            ,DIAS
            ,CREDITO
            ,DESC1
            ,DESC2
            ,DESC3
            ,DESC4
            ,DESC5
            ,RFC
            ,TIPO
            ,CONTACTO
            ,COBRADOR
            ,VEND
            ,PRECIO
            ,CP
            ,PROSPECT
            ,REVISION
            ,OBSERV
            ,ZONA
            ,CORREO
            ,URL
            ,SALDO
            ,USUARIO
            ,USUHORA
            ,USUFECHA
            ,PROVEEDOR
            ,CURB
            ,CORTE
            ,COBRO
            ,CONCEPTO
            ,INGRESO
            ,bloqueado
            ,claveweb
            ,emailcobranza
            ,embarcar
            ,foto
            ,puntos
            ,recomendado
            ,comision
            ,nuevo
            ,localidad
            ,numerointerior
            ,numeroexterior
            ,uso
            ,GUID
            ,tiendaAsignada
            ,genero
            ,vigenciaInicial
            ,fechaVencimiento
            ,limitedia
            ,limitemensual
            ,horario
            ,diasServicio
            ,estatus
            ,folio
            ,DiaEnviar
            ,unidaddenegocio
            ,RegimenFiscal
            ,COLONIAR
        FROM clients
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
                $cli = Cliente::findOrFail($request->CLIENTE);
            }else{
                $cli = new Cliente;
                $cli->CLIENTE                = $request->CLIENTE;
            }
            $cli->NOMBRE             = $request->NOMBRE;
            $cli->CALLE              = $request->CALLE;
            $cli->NUMERO             = $request->NUMERO;
            $cli->COLONIA            = $request->COLONIA;
            $cli->POBLA              = $request->POBLA;
            $cli->CIUDAD             = $request->CIUDAD;
            $cli->ESTADO             = $request->ESTADO;
            $cli->PAIS               = $request->PAIS;
            $cli->TELEFONO           = $request->TELEFONO;
            $cli->DIAS               = $request->DIAS;
            $cli->CREDITO            = $request->CREDITO;
            $cli->DESC1              = $request->DESC1;
            $cli->DESC2              = $request->DESC2;
            $cli->DESC3              = $request->DESC3;
            $cli->DESC4              = $request->DESC4;
            $cli->DESC5              = $request->DESC5;
            $cli->RFC                = $request->RFC;
            $cli->TIPO               = $request->TIPO;
            $cli->CONTACTO           = $request->CONTACTO;
            $cli->COBRADOR           = $request->COBRADOR;
            $cli->VEND               = $request->VEND;
            $cli->PRECIO             = $request->PRECIO;
            $cli->CP                 = $request->CP;
            $cli->PROSPECT           = $request->PROSPECT;
            $cli->REVISION           = $request->REVISION;
            $cli->OBSERV             = $request->OBSERV;
            $cli->ZONA               = $request->ZONA;
            $cli->CORREO             = $request->CORREO;
            $cli->URL                = $request->URL;
            $cli->SALDO              = $request->SALDO;
            $cli->USUARIO            = $request->USUARIO;
            $cli->USUHORA            = $request->USUHORA;
            $cli->USUFECHA           = $request->USUFECHA;
            $cli->PROVEEDOR          = $request->PROVEEDOR;
            $cli->CURB               = $request->CURB;
            $cli->CORTE              = $request->CORTE;
            $cli->COBRO              = $request->COBRO;
            $cli->CONCEPTO           = $request->CONCEPTO;
            $cli->INGRESO            = $request->INGRESO;
            $cli->bloqueado          = $request->bloqueado;
            $cli->claveweb           = $request->claveweb;
            $cli->emailcobranza      = $request->emailcobranza;
            $cli->embarcar           = $request->embarcar;
            $cli->foto               = $request->foto;
            $cli->puntos             = $request->puntos;
            $cli->recomendado        = $request->recomendado;
            $cli->comision           = $request->comision;
            $cli->nuevo              = $request->nuevo;
            $cli->localidad          = $request->localidad;
            $cli->numerointerior     = $request->numerointerior;
            $cli->numeroexterior     = $request->numeroexterior;
            $cli->uso                = $request->uso;
            $cli->GUID               = $request->GUID;
            $cli->save();
            return $cli;
            $cli->tiendaAsignada     = $request->tiendaAsignada;
            $cli->genero             = $request->genero;
            $cli->vigenciaInicial    = $request->vigenciaInicial;
            $cli->fechaVencimiento   = $request->fechaVencimiento;
            $cli->limitedia          = $request->limitedia;
            $cli->limitemensual      = $request->limitemensual;
            $cli->horario            = $request->horario;
            $cli->diasServicio       = $request->diasServicio;
            $cli->estatus            = $request->estatus;
            $cli->folio              = $request->folio;
            $cli->DiaEnviar          = $request->DiaEnviar;
            $cli->unidaddenegocio    = $request->unidaddenegocio;
            $cli->RegimenFiscal      = $request->RegimenFiscal;
            $cli->COLONIAR           = $request->COLONIAR;
            $cli->save();
            return $cli;
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
    public function delete($id)
    {
        $query = $this->searchxId($id);
        if(empty($query)){
            return ["status" => "0", "message" => "No se encontro el id del cliente"];
        }
        DB::DELETE("DELETE FROM clients WHERE CLIENTE = '$id'");
        return ["status" => "1", "message" => "Cliente eliminado correctamente"];
    }
    public function searchxId($id){
        $query = DB::SELECT("SELECT 
            CLIENTE
            ,NOMBRE
            ,CALLE
            ,NUMERO
            ,COLONIA
            ,POBLA
            ,CIUDAD
            ,ESTADO
            ,PAIS
            ,TELEFONO
            ,DIAS
            ,CREDITO
            ,DESC1
            ,DESC2
            ,DESC3
            ,DESC4
            ,DESC5
            ,RFC
            ,TIPO
            ,CONTACTO
            ,COBRADOR
            ,VEND
            ,PRECIO
            ,CP
            ,PROSPECT
            ,REVISION
            ,OBSERV
            ,ZONA
            ,CORREO
            ,URL
            ,SALDO
            ,USUARIO
            ,USUHORA
            ,USUFECHA
            ,PROVEEDOR
            ,CURB
            ,CORTE
            ,COBRO
            ,CONCEPTO
            ,INGRESO
            ,bloqueado
            ,claveweb
            ,emailcobranza
            ,embarcar
            ,foto
            ,puntos
            ,recomendado
            ,comision
            ,nuevo
            ,localidad
            ,numerointerior
            ,numeroexterior
            ,uso
            ,GUID
            ,tiendaAsignada
            ,genero
            ,vigenciaInicial
            ,fechaVencimiento
            ,limitedia
            ,limitemensual
            ,horario
            ,diasServicio
            ,estatus
            ,folio
            ,DiaEnviar
            ,unidaddenegocio
            ,RegimenFiscal
            ,COLONIAR
        FROM clients
        WHERE CLIENTE = '$id'
        ");
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
