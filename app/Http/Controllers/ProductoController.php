<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use DB;
class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // return csrf_token();
        $query = DB::SELECT("SELECT TOP 13
         ARTICULO
        ,DESCRIP
        ,LINEA
        ,MARCA
        ,PRECIO1
        ,PRECIO2
        ,PRECIO3
        ,PRECIO4
        ,PRECIO5
        ,PRECIO6
        ,PRECIO7
        ,PRECIO8
        ,PRECIO9
        ,PRECIO10
        ,EXISTENCIA
        ,COSTO_U
        ,COSTO
        ,UNIDAD
        ,POR_RECIB
        ,POR_SURT
        ,IMPUESTO
        ,MINIMO
        ,MAXIMO
        ,OBSERV
        ,COSTO_STD
        ,KIT
        ,SERIE
        ,LOTE
        ,INVENT
        ,IMAGEN
        ,PARAVENTA
        ,URL
        ,Curso
        ,USUARIO
        ,USUHORA
        ,USUFECHA
        ,Exportado
        ,EN_VENTA
        ,Recalcular
        ,Granel
        ,Peso
        ,BajoCosto
        ,Bloqueado
        ,U1
        ,U2
        ,U3
        ,U4
        ,U5
        ,U6
        ,U7
        ,U8
        ,U9
        ,U10
        ,Acaja
        ,MODIFICAPRECIO
        ,Fraccionario
        ,IESPECIAL
        ,UBICACION
        ,C2
        ,C3
        ,C4
        ,C5
        ,C6
        ,C7
        ,C8
        ,C9
        ,C10
        ,Movimientos
        ,Clasificacion
        ,ROP
        ,rotacion
        ,clasifant
        ,eoq
        ,etiquetas
        ,modelo
        ,color
        ,talla
        ,speso
        ,etiqueta
        ,numero
        ,carton
        ,ubicaetiq
        ,unidadrecibe
        ,unidadempaque
        ,sinvolumen
        ,Presentacion
        ,Servicio
        ,numeroservicios
        ,claveproveedor
        ,dp
        ,familia
        ,subfamilia
        ,subfam1
        ,subfam2
        ,Entradas
        ,Salidas
        ,cantent
        ,cantsal
        ,pronostico
        ,oferta
        ,costoentrada
        ,costosalida
        ,unidadesentrada
        ,unidadessalida
        ,donativo
        ,costopeps
        ,costoueps
        ,contenido
        ,presentacionextra
        ,pesoextra
        ,autor
        ,tema
        ,editorial
        ,fabricante
        ,preciousd
        ,costousd
        ,puntos
        ,autocodigo
        ,inventariopiezas
        ,diasstockmaximo
        ,diasstockminimo
        ,requerimiento
        ,tiempoAire
        -- ,SSMA_TimeStamp
        ,ensambladoenlinea
        ,iepslitro
        ,numerodeselecciones
        ,GUID
        ,SStime
        ,version
        ,claveprodserv
        ,claveunidad
        ,impuestocloud
        ,ObjetoImp
        ,fechaventa
        ,Sucventa
        ,expo
        ,importado
        ,ordenar
         FROM prods
         
         ");
        if(empty($query)){
            return ["status" => "0", "message" => "No hay datos que mostrar"];
        }
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
            $prod = Producto::findOrFail($request->ARTICULO);
        }else{
            $prod = new Producto;
            $prod->ARTICULO               = $request->ARTICULO;
        }
        $prod->DESCRIP                = $request->DESCRIP;
        $prod->LINEA                  = $request->LINEA;
        $prod->MARCA                  = $request->MARCA;
        $prod->PRECIO1                = $request->PRECIO1;
        $prod->PRECIO2                = $request->PRECIO2;
        $prod->PRECIO3                = $request->PRECIO3;
        $prod->PRECIO4                = $request->PRECIO4;
        $prod->PRECIO5                = $request->PRECIO5;
        $prod->PRECIO6                = $request->PRECIO6;
        $prod->PRECIO7                = $request->PRECIO7;
        $prod->PRECIO8                = $request->PRECIO8;
        $prod->PRECIO9                = $request->PRECIO9;
        $prod->PRECIO10               = $request->PRECIO10;
        $prod->EXISTENCIA             = $request->EXISTENCIA;
        $prod->COSTO_U                = $request->COSTO_U;
        $prod->COSTO                  = $request->COSTO;
        $prod->UNIDAD                 = $request->UNIDAD;
        $prod->POR_RECIB              = $request->POR_RECIB;
        $prod->POR_SURT               = $request->POR_SURT;
        $prod->IMPUESTO               = $request->IMPUESTO;
        $prod->MINIMO                 = $request->MINIMO;
        $prod->MAXIMO                 = $request->MAXIMO;
        $prod->OBSERV                 = $request->OBSERV;
        $prod->COSTO_STD              = $request->COSTO_STD;
        $prod->KIT                    = $request->KIT;
        $prod->SERIE                  = $request->SERIE;
        $prod->LOTE                   = $request->LOTE;
        $prod->INVENT                 = $request->INVENT;
        $prod->IMAGEN                 = $request->IMAGEN;
        $prod->PARAVENTA              = $request->PARAVENTA;
        $prod->URL                    = $request->URL;
        $prod->Curso                  = $request->Curso;
        $prod->USUARIO                = $request->USUARIO;
        $prod->USUHORA                = $request->USUHORA;
        $prod->USUFECHA               = $request->USUFECHA;
        $prod->Exportado              = $request->Exportado;
        $prod->EN_VENTA               = $request->EN_VENTA;
        $prod->Recalcular             = $request->Recalcular;
        $prod->Granel                 = $request->Granel;
        $prod->Peso                   = $request->Peso;
        $prod->BajoCosto              = $request->BajoCosto;
        $prod->Bloqueado              = $request->Bloqueado;
        $prod->U1                     = $request->U1;
        $prod->U2                     = $request->U2;
        $prod->U3                     = $request->U3;
        $prod->U4                     = $request->U4;
        $prod->U5                     = $request->U5;
        $prod->U6                     = $request->U6;
        $prod->U7                     = $request->U7;
        $prod->U8                     = $request->U8;
        $prod->U9                     = $request->U9;
        $prod->U10                    = $request->U10;
        $prod->Acaja                  = $request->Acaja;
        $prod->MODIFICAPRECIO         = $request->MODIFICAPRECIO;
        $prod->Fraccionario           = $request->Fraccionario;
        $prod->IESPECIAL              = $request->IESPECIAL;
        $prod->UBICACION              = $request->UBICACION;
        $prod->C2                     = $request->C2;
        $prod->C3                     = $request->C3;
        $prod->C4                     = $request->C4;
        $prod->C5                     = $request->C5;
        $prod->C6                     = $request->C6;
        $prod->C7                     = $request->C7;
        $prod->C8                     = $request->C8;
        $prod->C9                     = $request->C9;
        $prod->C10                    = $request->C10;
        $prod->Movimientos            = $request->Movimientos;
        $prod->Clasificacion          = $request->Clasificacion;
        $prod->ROP                    = $request->ROP;
        $prod->rotacion               = $request->rotacion;
        $prod->clasifant              = $request->clasifant;
        $prod->eoq                    = $request->eoq;
        $prod->etiquetas              = $request->etiquetas;
        $prod->modelo                 = $request->modelo;
        $prod->color                  = $request->color;
        $prod->talla                  = $request->talla;
        $prod->speso                  = $request->speso;
        $prod->etiqueta               = $request->etiqueta;
        $prod->numero                 = $request->numero;
        $prod->carton                 = $request->carton;
        $prod->ubicaetiq              = $request->ubicaetiq;
        $prod->unidadrecibe           = $request->unidadrecibe;
        $prod->unidadempaque          = $request->unidadempaque;
        $prod->sinvolumen             = $request->sinvolumen;
        $prod->Presentacion           = $request->Presentacion;
        $prod->Servicio               = $request->Servicio;
        $prod->numeroservicios        = $request->numeroservicios;
        $prod->claveproveedor         = $request->claveproveedor;
        $prod->dp                     = $request->dp;
        $prod->familia                = $request->familia;
        $prod->subfamilia             = $request->subfamilia;
        $prod->subfam1                = $request->subfam1;
        $prod->subfam2                = $request->subfam2;
        $prod->Entradas               = $request->Entradas;
        $prod->Salidas                = $request->Salidas;
        $prod->cantent                = $request->cantent;
        $prod->cantsal                = $request->cantsal;
        $prod->pronostico             = $request->pronostico;
        $prod->oferta                 = $request->oferta;
        $prod->costoentrada           = $request->costoentrada;
        $prod->costosalida            = $request->costosalida;
        $prod->unidadesentrada        = $request->unidadesentrada;
        $prod->unidadessalida         = $request->unidadessalida;
        $prod->donativo               = $request->donativo;
        $prod->costopeps              = $request->costopeps;
        $prod->costoueps              = $request->costoueps;
        $prod->contenido              = $request->contenido;
        $prod->presentacionextra      = $request->presentacionextra;
        $prod->pesoextra              = $request->pesoextra;
        $prod->autor                  = $request->autor;
        $prod->tema                   = $request->tema;
        $prod->editorial              = $request->editorial;
        $prod->fabricante             = $request->fabricante;
        $prod->preciousd              = $request->preciousd;
        $prod->costousd               = $request->costousd;
        $prod->puntos                 = $request->puntos;
        // $prod->autocodigo             = $request->autocodigo;
        $prod->inventariopiezas       = $request->inventariopiezas;
        $prod->diasstockmaximo        = $request->diasstockmaximo;
        $prod->diasstockminimo        = $request->diasstockminimo;
        $prod->requerimiento          = $request->requerimiento;
        $prod->tiempoAire             = $request->tiempoAire;
        $prod->ensambladoenlinea      = $request->ensambladoenlinea;
        $prod->iepslitro              = $request->iepslitro;
        $prod->numerodeselecciones    = $request->numerodeselecciones;
        $prod->GUID                   = $request->GUID;
        $prod->SStime                 = $request->SStime;
        $prod->version                = $request->version;
        $prod->claveprodserv          = $request->claveprodserv;
        $prod->claveunidad            = $request->claveunidad;
        $prod->impuestocloud          = $request->impuestocloud;
        $prod->ObjetoImp              = $request->ObjetoImp;
        $prod->fechaventa             = $request->fechaventa;
        $prod->Sucventa               = $request->Sucventa;
        $prod->expo                   = $request->expo;
        $prod->importado              = $request->importado;
        $prod->ordenar                = $request->ordenar;
        $prod->save();
        return $prod;
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
    public function delete($id)
    {
        $query = $this->searchxId($id);
        if(empty($query)){
            return ["status" => "0", "message" => "No se encontro el id de producto"];
        }
        DB::DELETE("DELETE FROM prods WHERE ARTICULO = '$id'");
        return ["status" => "1", "message" => "Producto eliminado correctamente"];
    }
    public function searchxId($id){
        $query = DB::SELECT("SELECT 
        ARTICULO
       ,DESCRIP
       ,LINEA
       ,MARCA
       ,PRECIO1
       ,PRECIO2
       ,PRECIO3
       ,PRECIO4
       ,PRECIO5
       ,PRECIO6
       ,PRECIO7
       ,PRECIO8
       ,PRECIO9
       ,PRECIO10
       ,EXISTENCIA
       ,COSTO_U
       ,COSTO
       ,UNIDAD
       ,POR_RECIB
       ,POR_SURT
       ,IMPUESTO
       ,MINIMO
       ,MAXIMO
       ,OBSERV
       ,COSTO_STD
       ,KIT
       ,SERIE
       ,LOTE
       ,INVENT
       ,IMAGEN
       ,PARAVENTA
       ,URL
       ,Curso
       ,USUARIO
       ,USUHORA
       ,USUFECHA
       ,Exportado
       ,EN_VENTA
       ,Recalcular
       ,Granel
       ,Peso
       ,BajoCosto
       ,Bloqueado
       ,U1
       ,U2
       ,U3
       ,U4
       ,U5
       ,U6
       ,U7
       ,U8
       ,U9
       ,U10
       ,Acaja
       ,MODIFICAPRECIO
       ,Fraccionario
       ,IESPECIAL
       ,UBICACION
       ,C2
       ,C3
       ,C4
       ,C5
       ,C6
       ,C7
       ,C8
       ,C9
       ,C10
       ,Movimientos
       ,Clasificacion
       ,ROP
       ,rotacion
       ,clasifant
       ,eoq
       ,etiquetas
       ,modelo
       ,color
       ,talla
       ,speso
       ,etiqueta
       ,numero
       ,carton
       ,ubicaetiq
       ,unidadrecibe
       ,unidadempaque
       ,sinvolumen
       ,Presentacion
       ,Servicio
       ,numeroservicios
       ,claveproveedor
       ,dp
       ,familia
       ,subfamilia
       ,subfam1
       ,subfam2
       ,Entradas
       ,Salidas
       ,cantent
       ,cantsal
       ,pronostico
       ,oferta
       ,costoentrada
       ,costosalida
       ,unidadesentrada
       ,unidadessalida
       ,donativo
       ,costopeps
       ,costoueps
       ,contenido
       ,presentacionextra
       ,pesoextra
       ,autor
       ,tema
       ,editorial
       ,fabricante
       ,preciousd
       ,costousd
       ,puntos
       ,autocodigo
       ,inventariopiezas
       ,diasstockmaximo
       ,diasstockminimo
       ,requerimiento
       ,tiempoAire
       -- ,SSMA_TimeStamp
       ,ensambladoenlinea
       ,iepslitro
       ,numerodeselecciones
       ,GUID
       ,SStime
       ,version
       ,claveprodserv
       ,claveunidad
       ,impuestocloud
       ,ObjetoImp
       ,fechaventa
       ,Sucventa
       ,expo
       ,importado
       ,ordenar
        FROM prods
        where prods.ARTICULO = '$id'
        ");
        return $query;
    }
}
