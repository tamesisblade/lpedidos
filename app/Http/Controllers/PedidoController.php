<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Pedido;
use App\Models\PedidoPar;
class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Pedido::all();
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
                $pedi = Pedido::findOrFail($request->pedido);
            }else{
                $pedi = new Pedido;
            }
            $pedi->F_EMISION          = $request->F_EMISION;
            $pedi->CLIENTE            = $request->CLIENTE;
            $pedi->VEND               = $request->VEND;
            $pedi->IMPORTE            = $request->IMPORTE;
            $pedi->DESCUENTO          = $request->DESCUENTO;
            $pedi->IMPUESTO           = $request->IMPUESTO;
            $pedi->PRECIO             = $request->PRECIO;
            $pedi->COSTO              = $request->COSTO;
            $pedi->ALMACEN            = $request->ALMACEN;
            $pedi->ESTADO             = $request->ESTADO;
            $pedi->OBSERV             = $request->OBSERV;
            $pedi->TIPO_CAM           = $request->TIPO_CAM;
            $pedi->MONEDA             = $request->MONEDA;
            $pedi->DESC1              = $request->DESC1;
            $pedi->DESC2              = $request->DESC2;
            $pedi->DESC3              = $request->DESC3;
            $pedi->DESC4              = $request->DESC4;
            $pedi->DESC5              = $request->DESC5;
            $pedi->DATOS              = $request->DATOS;
            $pedi->DESGLOSE           = $request->DESGLOSE;
            $pedi->COBRANZA           = $request->COBRANZA;
            $pedi->USUARIO            = $request->USUARIO;
            $pedi->USUFECHA           = $request->USUFECHA;
            $pedi->USUHORA            = $request->USUHORA;
            $pedi->RELACION           = $request->RELACION;
            $pedi->PEDCLI             = $request->PEDCLI;
            $pedi->AplicarDes         = $request->AplicarDes;
            $pedi->Autorizado         = $request->Autorizado;
            $pedi->Entrega            = $request->Entrega;
            $pedi->Tipo               = $request->Tipo;
            $pedi->no_ped             = $request->no_ped;
            $pedi->sucremota          = $request->sucremota;
            $pedi->cotizaremota       = $request->cotizaremota;
            $pedi->auto               = $request->auto;
            $pedi->donativo           = $request->donativo;
            $pedi->ocupado            = $request->ocupado;
            $pedi->save();
            $this->savePedidosPar($pedi,$request);
            return $pedi;
            } catch (\Exception  $ex) {
                //quitar la variables errors en produccion
                return ["status" => "0","message" => "Hubo problemas para guardar","errors" =>$ex];
            }
    }
    public function savePedidosPar($pedi,$request){
        if($request->pedidopar){
            $arreglo = $request->pedidopar;
            if(count($arreglo) > 0){
                foreach($arreglo as $key => $item){
                    $pediP = new PedidoPar; 
                    $pediP->pedido      = $pedi->pedido;
                    $pediP->ARTICULO    = $arreglo[$key]["ARTICULO"];
                    $pediP->CANTIDAD    = $arreglo[$key]["CANTIDAD"];
                    $pediP->SURTIDO     = $arreglo[$key]["SURTIDO"];
                    $pediP->POR_SURT    = $arreglo[$key]["POR_SURT"];
                    $pediP->PRECIO      = $arreglo[$key]["PRECIO"];
                    $pediP->DESCUENTO   = $arreglo[$key]["DESCUENTO"];
                    $pediP->IMPUESTO    = $arreglo[$key]["IMPUESTO"];
                    $pediP->OBSERV      = $arreglo[$key]["OBSERV"];
                    $pediP->Usuario     = $arreglo[$key]["Usuario"];
                    $pediP->UsuFecha    = $arreglo[$key]["UsuFecha"];
                    $pediP->UsuHora     = $arreglo[$key]["UsuHora"];
                    $pediP->Almacen     = $arreglo[$key]["Almacen"];
                    $pediP->Lista       = $arreglo[$key]["Lista"];
                    $pediP->Clave       = $arreglo[$key]["Clave"];
                    $pediP->PRCANTIDAD  = $arreglo[$key]["PRCANTIDAD"];
                    $pediP->PRDESCRIP   = $arreglo[$key]["PRDESCRIP"];
                    $pediP->backorder   = $arreglo[$key]["backorder"];
                    $pediP->donativo    = $arreglo[$key]["donativo"];
                    $pediP->GUID        = $arreglo[$key]["GUID"];
                    $pediP->PUID        = $arreglo[$key]["PUID"];
                    $pediP->save();
                }
            }
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
        $datos = [];
        //traer los pedidos par
        foreach($query as $key => $item){
            $query2 = PedidoPar::Where('pedido',$item->pedido)->get();
            $arregloPar = [];
            $arregloPar = $query2;
            $datos = [
                "pedido"        => $item->pedido,
                "F_EMISION"     => $item->F_EMISION,
                "CLIENTE"       => $item->CLIENTE,
                "VEND"          => $item->VEND,
                "IMPORTE"       => $item->IMPORTE,
                "DESCUENTO"     => $item->DESCUENTO,
                "IMPUESTO"      => $item->IMPUESTO,
                "PRECIO"        => $item->PRECIO,
                "COSTO"         => $item->COSTO,
                "ALMACEN"       => $item->ALMACEN,
                "ESTADO"        => $item->ESTADO,
                "OBSERV"        => $item->OBSERV,
                "TIPO_CAM"      => $item->TIPO_CAM,
                "MONEDA"        => $item->MONEDA,
                "DESC1"         => $item->DESC1,
                "DESC2"         => $item->DESC2,
                "DESC3"         => $item->DESC3,
                "DESC4"         => $item->DESC4,
                "DESC5"         => $item->DESC5,
                "DATOS"         => $item->DATOS,
                "DESGLOSE"      => $item->DESGLOSE,
                "COBRANZA"      => $item->COBRANZA,
                "USUARIO"       => $item->USUARIO,
                "USUFECHA"      => $item->USUFECHA,
                "USUHORA"       => $item->USUHORA,
                "RELACION"      => $item->RELACION,
                "PEDCLI"        => $item->PEDCLI,
                "AplicarDes"    => $item->AplicarDes,
                "Autorizado"    => $item->Autorizado,
                "Entrega"       => $item->Entrega,
                "Tipo"          => $item->Tipo,
                "no_ped"        => $item->no_ped,
                "sucremota"     => $item->sucremota,
                "cotizaremota"  => $item->cotizaremota,
                "auto"          => $item->auto,
                "donativo"      => $item->donativo,
                "ocupado"       => $item->ocupado,
                "pedidopar"     => $arregloPar
            ];
        }
        return $datos;
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
    public function delete($id)
    {
        $query = $this->searchxId($id);
        if(empty($query)){
            return ["status" => "0", "message" => "No se encontro el id del pedido"];
        }
         //validar que no hay pedidos par hijos
         $query2 = PedidoPar::Where('pedido',$id)->get();
         if(count($query2) > 0){
            return ["status" => "0", "message" => "No se puede eliminar por que existe pedidos par asociados a este pedido"];
         }
        DB::DELETE("DELETE FROM pedidos WHERE pedido = '$id'");
        return ["status" => "1", "message" => "Pedido eliminado correctamente"];
    }
    public function deletePedidoPar($id){
        $query = PedidoPar::Where('ID_SALIDA',$id)->get();
        if(count($query) == 0){
            return ["status" => "0", "message" => "No se encontro el id del pedido par"];
        }
        DB::DELETE("DELETE FROM pedpar WHERE ID_SALIDA = '$id'");
        return ["status" => "1", "message" => "Pedido par eliminado correctamente"];
    }
    public function searchxId($id){
        $query = DB::SELECT("SELECT 
          pedido
            ,F_EMISION
            ,CLIENTE
            ,VEND
            ,IMPORTE
            ,DESCUENTO
            ,IMPUESTO
            ,PRECIO
            ,COSTO
            ,ALMACEN
            ,ESTADO
            ,OBSERV
            ,TIPO_CAM
            ,MONEDA
            ,DESC1
            ,DESC2
            ,DESC3
            ,DESC4
            ,DESC5
            ,DATOS
            ,DESGLOSE
            ,COBRANZA
            ,USUARIO
            ,USUFECHA
            ,USUHORA
            ,RELACION
            ,PEDCLI
            ,AplicarDes
            ,Autorizado
            ,Entrega
            ,Tipo
            ,no_ped
            ,sucremota
            ,cotizaremota
            ,auto
            ,donativo
            ,ocupado
        FROM pedidos
        WHERE pedido = '$id'
        ");
        return $query;
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
