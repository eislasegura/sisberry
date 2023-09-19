<?php

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES 
include_once '../../assest/controlador/TUSUARIO_ADO.php';
include_once '../../assest/controlador/USUARIO_ADO.php';
include_once '../../assest/controlador/EMPRESA_ADO.php';
include_once '../../assest/controlador/PLANTA_ADO.php';
include_once '../../assest/controlador/TEMPORADA_ADO.php';

include_once '../../assest/controlador/VESPECIES_ADO.php';
include_once '../../assest/controlador/PRODUCTOR_ADO.php';
include_once '../../assest/controlador/EEXPORTACION_ADO.php';

include_once '../../assest/controlador/CONDUCTOR_ADO.php';
include_once '../../assest/controlador/TRANSPORTE_ADO.php';
include_once '../../assest/controlador/EXIEXPORTACION_ADO.php';
include_once '../../assest/controlador/PRODUCTOR_ADO.php';
include_once '../../assest/controlador/COMPRADOR_ADO.php';
include_once '../../assest/controlador/TCALIBRE_ADO.php';

include_once '../../assest/controlador/DESPACHOPT_ADO.php';
include_once '../../assest/controlador/EXIEXPORTACION_ADO.php';


//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$TUSUARIO_ADO = new TUSUARIO_ADO();
$USUARIO_ADO = new USUARIO_ADO();
$EMPRESA_ADO =  new EMPRESA_ADO();
$PLANTA_ADO =  new PLANTA_ADO();
$TEMPORADA_ADO =  new TEMPORADA_ADO();

$VESPECIES_ADO =  new VESPECIES_ADO();
$PRODUCTOR_ADO = new PRODUCTOR_ADO();
$EEXPORTACION_ADO =  new EEXPORTACION_ADO();

$TRANSPORTE_ADO =  new TRANSPORTE_ADO();
$CONDUCTOR_ADO =  new CONDUCTOR_ADO();
$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$COMPRADOR_ADO =  new COMPRADOR_ADO();
$TCALIBRE_ADO =  new TCALIBRE_ADO();


$DESPACHOPT_ADO =  new DESPACHOPT_ADO();
$EXIEXPORTACION_ADO =  new EXIEXPORTACION_ADO();
//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$NUMERODESPACHO = "";
$EMPRESA = "";
$EMPRESAURL = "";
$FECHA = "";
$FECHAINGRESO = "";
$FECHAMODIFCACION = "";
$EMPRESA = "";
$PLANTA = "";
$PLANTA2 = "";
$PLANTA3 = "";
$TEMPORADA = "";
$NUMEROSELLO = "";
$NUMEROGUIA = "";
$TDESPACHO = "";
$TRANSPORTE = "";
$PATENTECAMION = "";
$PATENTECARRO = "";
$CONDUCTOR = "";
$PRODUCTOR = "";
$COMPRADOR = "";
$REGALO = "";
$PRECIOPALLET = "";
$TOTALPALLET = "";

$TOTALENVASE = "";
$TOTALNETO = "";
$NUMERO = "";

$IDOP = "";
$OP = "";

//INICIALIZAR ARREGLOS
$ARRAYEMPRESA = "";
$ARRAYPLANTA = "";
$ARRAYTEMPORADA = "";
$ARRAYDESPACHO = "";
$ARRAYEXISTENCIATOMADA = "";

$ARRAYTRANSPORTE = "";
$ARRAYCONDUCTOR = "";
$ARRAYCOMPRADOR = "";
$ARRAYPRODUCTOR = "";
$ARRAYPLANTA2 = "";
$ARRAYPLANTA3 = "";
$ARRAYUSUARIO="";
$ARRAYCALIBRE="";

$ARRAYVERPRODUCTORID = "";
$ARRAYVERVESPECIESID = "";
$ARRAYEVERERECEPCIONID = "";

if (isset($_REQUEST['usuario'])) {
  $USUARIO = $_REQUEST['usuario'];
  $ARRAYUSUARIO = $USUARIO_ADO->ObtenerNombreCompleto($USUARIO);
  $NOMBRE = $ARRAYUSUARIO[0]["NOMBRE_COMPLETO"];
}


if (isset($_REQUEST['parametro'])) {
  $IDOP = $_REQUEST['parametro'];
  $NUMERODESPACHO = $IDOP;
}
$ARRAYDESPACHO = $DESPACHOPT_ADO->verDespachopt3($IDOP);
if($ARRAYDESPACHO){

  $ARRAYDESPACHOTOTAL = $DESPACHOPT_ADO->obtenerTotalesDespachoptPorDespachoCBX2($IDOP);

  $ARRAYDESPACHOTOTAL2 = $EXIEXPORTACION_ADO->obtenerTotalesDespacho2($IDOP);
  $ARRAYEXISTENCIATOMADA = $EXIEXPORTACION_ADO->buscarPordespacho2($IDOP);
  
  $TOTALENVASE = $ARRAYDESPACHOTOTAL2[0]['ENVASE'];
  $TOTALNETO = $ARRAYDESPACHOTOTAL2[0]['NETO'];
  $TOTALPRECIO = $ARRAYDESPACHOTOTAL2[0]['TOTAL_PRECIO'];
  
  
  $NUMERO = $ARRAYDESPACHO[0]['NUMERO_DESPACHO'];
  $FECHA = $ARRAYDESPACHO[0]['FECHA'];
  $FECHAINGRESO = $ARRAYDESPACHO[0]['INGRESO'];
  $FECHAMODIFCACION = $ARRAYDESPACHO[0]['MODIFICACION'];
  $TDESPACHO = $ARRAYDESPACHO[0]['TDESPACHO'];
  $PATENTECAMION = $ARRAYDESPACHO[0]['PATENTE_CAMION'];
  $PATENTECARRO = $ARRAYDESPACHO[0]['PATENTE_CARRO'];
  $OBSERVACIONES = $ARRAYDESPACHO[0]['OBSERVACION_DESPACHO'];
  
  $ESTADO = $ARRAYDESPACHO[0]['ESTADO'];
  if ($ARRAYDESPACHO[0]['ESTADO'] == 1) {
    $ESTADO = "Abierto";
  }else if ($ARRAYDESPACHO[0]['ESTADO'] == 0) {
    $ESTADO = "Cerrado";
  }else{
    $ESTADO="Sin Datos";
  }  
  
  
  $IDUSUARIOI = $ARRAYDESPACHO[0]['ID_USUARIOI'];  
  $ARRAYUSUARIO2 = $USUARIO_ADO->ObtenerNombreCompleto($IDUSUARIOI);
  $NOMBRERESPONSABLE = $ARRAYUSUARIO2[0]["NOMBRE_COMPLETO"];
  
  
  if ($TDESPACHO == "1") {
    $TDESPACHON = "Interplanta";
    $NUMEROGUIA = $ARRAYDESPACHO[0]['NUMERO_GUIA_DESPACHO'];
    $NUMEROSELLO = $ARRAYDESPACHO[0]['NUMERO_SELLO_DESPACHO'];
    $ARRAYPLANTA2 = $PLANTA_ADO->verPlanta($ARRAYDESPACHO[0]['ID_PLANTA2']);
    if ($ARRAYPLANTA2) {
      $DESTINO = $ARRAYPLANTA2[0]['NOMBRE_PLANTA'];
    } else {
      $DESTINO = "Sin Datos";
    }
  }
  if ($TDESPACHO == "2") {
    $TDESPACHON = "Devolución Productor";
    $NUMEROGUIA = $ARRAYDESPACHO[0]['NUMERO_GUIA_DESPACHO'];
    $NUMEROSELLO = $ARRAYDESPACHO[0]['NUMERO_SELLO_DESPACHO'];
    $ARRAYPRODUCTOR = $PRODUCTOR_ADO->verProductor($ARRAYDESPACHO[0]['ID_PRODUCTOR']);
    if ($ARRAYPRODUCTOR) {
      $CODIGOPRODUCTOR = $ARRAYPRODUCTOR[0]['CODGIGO_PRODUCTOR'];
      $DESTINO = $ARRAYPRODUCTOR[0]['NOMBRE_PRODUCTOR'];
    } else {
      $CODIGOPRODUCTOR = "";
      $DESTINO = "";
    }
  }
  if ($TDESPACHO == "3") {
    $TDESPACHON = "Venta";
    $NUMEROGUIA = $ARRAYDESPACHO[0]['NUMERO_GUIA_DESPACHO'];
    $NUMEROSELLO = $ARRAYDESPACHO[0]['NUMERO_SELLO_DESPACHO'];
    $ARRAYCOMPRADOR = $COMPRADOR_ADO->verComprador($ARRAYDESPACHO[0]['ID_COMPRADOR']);
    if ($ARRAYCOMPRADOR) {
      $DESTINO = $ARRAYCOMPRADOR[0]['NOMBRE_COMPRADOR'];
    } else {
      $DESTINO = "";
    }
  }
  if ($TDESPACHO == "4") {
    $TDESPACHON = "Despacho de Descarte(R)";
    $NUMEROGUIA = "No Aplica";
    $NUMEROSELLO = "No Aplica";
    $DESTINO = $ARRAYDESPACHO[0]['REGALO_DESPACHO'];
  }
  if ($TDESPACHO == "5") {
    $TDESPACHON = "Planta Externa";
    $NUMEROGUIA = $ARRAYDESPACHO[0]['NUMERO_GUIA_DESPACHO'];
    $NUMEROSELLO = $ARRAYDESPACHO[0]['NUMERO_SELLO_DESPACHO'];
    $ARRAYPLANTA3= $PLANTA_ADO->verPlanta($ARRAYDESPACHO[0]['ID_PLANTA3']);
    if ($ARRAYPLANTA3) {
      $DESTINO = $ARRAYPLANTA3[0]['NOMBRE_PLANTA'];
    } else {
      $DESTINO = "";
    }
  } 
  
  
  $ARRAYTRANSPORTE = $TRANSPORTE_ADO->verTransporte($ARRAYDESPACHO[0]['ID_TRANSPORTE']);
  $ARRAYCONDUCTOR = $CONDUCTOR_ADO->verConductor($ARRAYDESPACHO[0]['ID_CONDUCTOR']);;
  
  $TRANSPORTE = $ARRAYTRANSPORTE[0]['NOMBRE_TRANSPORTE'];
  $CONDUCTOR = $ARRAYCONDUCTOR[0]['NOMBRE_CONDUCTOR'];
  
  $ARRAYPLANTA = $PLANTA_ADO->verPlanta($ARRAYDESPACHO[0]['ID_PLANTA']);
  $ARRAYTEMPORADA = $TEMPORADA_ADO->verTemporada($ARRAYDESPACHO[0]['ID_TEMPORADA']);
  $ARRAYEMPRESA = $EMPRESA_ADO->verEmpresa($ARRAYDESPACHO[0]['ID_EMPRESA']);
  
  $TEMPORADA = $ARRAYTEMPORADA[0]['NOMBRE_TEMPORADA'];
  $PLANTA = $ARRAYPLANTA[0]['NOMBRE_PLANTA'];
  $EMPRESA = $ARRAYEMPRESA[0]['NOMBRE_EMPRESA'];
  $EMPRESAURL = $ARRAYEMPRESA[0]['LOGO_EMPRESA'];
  
  if ($EMPRESAURL == "") {
    $EMPRESAURL = "img/empresa/no_disponible.png";
  }
}


//OBTENCION DE LA FECHA
date_default_timezone_set('America/Santiago');
//SE LE PASA LA FECHA ACTUAL A UN ARREGLO
$ARRAYFECHADOCUMENTO = getdate();

//SE OBTIENE INFORMACION RELACIONADA CON LA HORA
$HORA = "" . $ARRAYFECHADOCUMENTO['hours'];
$MINUTO = "" . $ARRAYFECHADOCUMENTO['minutes'];
$SEGUNDO = "" . $ARRAYFECHADOCUMENTO['seconds'];
//EN CASO DE VALORES MENOS A 2 LENGHT, SE LE CONCATENA UN 0
if ($MINUTO < 10) {
  $MINUTO = "0" . $MINUTO;
}
if ($SEGUNDO < 10) {
  $SEGUNDO = "0" . $SEGUNDO;
}

// SE JUNTA LA INFORMAICON DE LA HORA Y SE LE DA UN FORMATO
$HORAFINAL = $HORA . "" . $MINUTO . "" . $SEGUNDO;
$HORAFINAL2 = $HORA . ":" . $MINUTO . ":" . $SEGUNDO;

//SE OBTIENE INFORMACION RELACIONADA CON LA FECHA
$DIA = "" . $ARRAYFECHADOCUMENTO['mday'];

$MES = "" . $ARRAYFECHADOCUMENTO['mon'];
$ANO = "" . $ARRAYFECHADOCUMENTO['year'];
$NOMBREMES = "" . $ARRAYFECHADOCUMENTO['month'];
$NOMBREDIA = "" . $ARRAYFECHADOCUMENTO['weekday'];
//EN CASO DE VALORES MENOS A 2 LENGHT, SE LE CONCATENA UN 0
if ($DIA < 10) {
  $DIA = "0" . $DIA;
}
//PARA TRAUDCIR EL MES AL ESPAÑOL
$MESESNOMBRES = array(
  "January" => "Enero",
  "February" => "Febrero",
  "March" => "Marzo",
  "April" => "Abril",
  "May" => "Mayo",
  "June" => "Junio",
  "July" => "Julio",
  "August" => "Agosto",
  "September" => "Septiembre",
  "October" => "Octubre",
  "November" => "Noviembre",
  "December" => "Diciembre"
);
//PARA TRAUDCIR EL DIA AL ESPAÑOL
$DIASNOMBRES = array(
  "Monday" => "Lunes",
  "Tuesday" => "Martes",
  "Wednesday" => "Miércoles",
  "Thursday" => "Jueves",
  "Friday" => "Viernes",
  "Saturday" => "Sábado",
  "Sunday" => "Domingo"
);

$NOMBREDIA = $DIASNOMBRES[$NOMBREDIA];
$NOMBREMES = $MESESNOMBRES[$NOMBREMES];
// SE JUNTA LA INFORMAICON DE LA FECHA Y SE LE DA UN FORMATO
$FECHANORMAL = $DIA . "" . $MES . "" . $ANO;
$FECHANORMAL2 = $DIA . "/" . $MES . "/" . $ANO;
$FECHANOMBRE = $NOMBREDIA . ", " . $DIA . " de " . $NOMBREMES . " del " . $ANO;





//ESCTRUTURA DEL DOCUMENTO

$html = '
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Informe Despacho</title>
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
           <img src="../../assest/img/logo.png" width="150px" height="45px"/>
      </div>
      <div id="company">
        <h2 class="name">Go Creative Chile.</h2>
        <div>Los Ángeles, Bio bio, Chile</div>
        <div>Soluciones para la agroindustria desde 2018</div>
        <div>WhatsApp: <a href="https://wa.me/56944627287">+56944627287</a></div>
      </div>
    </header>
    <main>
      <h2 class="titulo" style="text-align: center; color: black;">
        INFORME DESPACHO PRODUCTO TERMINADO
        <br>
        <b> Número Despacho: ' . $NUMERO . '</b>
      </h2>
      <div id="details" class="clearfix">
        
      <div id="invoice">
        <div class="date"><b>Código BRC: </b>REP-DESPPT </div>  
        <div class="date"><b>Fecha Despacho: </b>' . $FECHA . ' </div>
        <div class="date"><b>Empresa: </b>' . $EMPRESA . '  </div>
        <div class="date"><b>Planta: </b>' . $PLANTA . '  </div>
        <div class="date"><b>Temporada: </b>' . $TEMPORADA . '  </div>
      </div>


        <div id="client">
          <div class="address"><b>Número Guía:  </b>' . $NUMEROGUIA . '</div>
          <div class="address"><b>Número Sello:  </b>' . $NUMEROSELLO . '</div>
          <div class="address"><b>Tipo Despacho:  </b>' . $TDESPACHON . '</div>
          ';
if ($TDESPACHO == "1") {
  $html .= '
            <div class="address"><b>Planta Destino:  </b>' . $DESTINO . '</div>
            ';
}
if ($TDESPACHO == "2") {
  $html .= '
            <div class="address"><b>CSG:  </b>' . $CODIGOPRODUCTOR . '</div>
            <div class="address"><b>Productor Destino:  </b>' . $DESTINO . '</div>
            ';
}
if ($TDESPACHO == "3") {
  $html .= '
            <div class="address"><b>Comprador Destino:  </b>' . $DESTINO . '</div>
            ';
}
if ($TDESPACHO == "4") {
  $html .= '
            <div class="address"><b>Destino:  </b>' . $DESTINO . '</div>
            ';
}
if ($TDESPACHO == "5") {
  $html .= '
            <div class="address"><b>Planta Destino:  </b>' . $DESTINO . '</div>
            ';
}

$html .= '
            <div class="address"><b>Estado Despacho: </b> ' . $ESTADO . ' </div>
        </div>        
      </div>
    <table border="0" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                ';
if ($TDESPACHO == "3") {
  $html .= '
                      <th colspan="12" class="center">SELECCIÓN </th>
                      ';
} else {
  $html .= '
                      <th colspan="10" class="center">SELECCIÓN </th>
                      ';
}
$html .= '
                </tr>
                <tr>
                    <th class="color left">Folio</th>
                    <th class="color center">Fecha Embalado</th>
                    <th class="color center">Código Estandar</th>
                    <th class="color center">Envase/Estandar</th>
                    <th class="color center ">CSG </th>
                    <th class="color center ">Productor </th>
                    <th class="color center ">Variedad </th>
                    <th class="color center">Calibre</th>
                    <th class="color center">Cant. Envase</th>
                    <th class="color center">Kilos Neto</th>
';
if ($TDESPACHO == "3") {
  $html .= '
                      <th class="color center">Precio Por Envases</th>
                      <th class="color center">Total Precio</th>
                      ';
}
$html .= '
                </tr>
            </thead>
            <tbody>
    ';
foreach ($ARRAYEXISTENCIATOMADA as $r) :

  $ARRAYVERPRODUCTORID = $PRODUCTOR_ADO->verProductor($r['ID_PRODUCTOR']);
  $ARRAYVERVESPECIESID = $VESPECIES_ADO->verVespecies($r['ID_VESPECIES']);
  $ARRAYEVERERECEPCIONID = $EEXPORTACION_ADO->verEstandar($r['ID_ESTANDAR']);

  $ARRAYCALIBRE = $TCALIBRE_ADO->verCalibre($r['ID_TCALIBRE']);
  if ($ARRAYCALIBRE) {
    $CALIBRE = $ARRAYCALIBRE[0]['NOMBRE_TCALIBRE'];
  } else {
    $CALIBRE  = "Sin Calibre";
  }


  $html = $html . '
        <tr>
            <th class=" left">' . $r['FOLIO_AUXILIAR_EXIEXPORTACION'] . '</th>
            <td class=" left">' . $r['EMBALADO'] . '</td>
            <td class=" left">' . $ARRAYEVERERECEPCIONID[0]['CODIGO_ESTANDAR'] . '</td>
            <td class=" left">' . $ARRAYEVERERECEPCIONID[0]['NOMBRE_ESTANDAR'] . '</td>
            <td class=" center ">' . $ARRAYVERPRODUCTORID[0]['CSG_PRODUCTOR'] . ' </td>
            <td class=" center ">' . $ARRAYVERPRODUCTORID[0]['NOMBRE_PRODUCTOR'] . ' </td>
            <td class=" center ">' . $ARRAYVERVESPECIESID[0]['NOMBRE_VESPECIES'] . ' </td>
            <td class=" center">' . $CALIBRE . '</td>
            <td class=" center">' . $r['ENVASE'] . '</td>
            <td class=" center">' . $r['NETO'] . '</td>
            ';
  if ($TDESPACHO == "3") {
    $html .= '
  <td class=" center">' . $r['PRECIO'] . '</td>
  <td class=" center">' . $r['TOTAL_PRECIO'] . '</td>
                      ';
  }
  $html .= '
        </tr>
        ';
endforeach;
$html = $html . '
        <tr>
            <th class="color left">&nbsp;</th>
            <th class="color left">&nbsp;</th>
            <th class="color center">&nbsp;</th>
            <th class="color center ">&nbsp; </th>
            <th class="color center ">&nbsp; </th>
            <th class="color center">&nbsp;</th>
            <th class="color center">&nbsp;</th>
            <th class="color right">Sub Total</th>
            <th class="color center">' . $TOTALENVASE . '</th>
            <th class="color center">' . $TOTALNETO . '</th>
            ';
if ($TDESPACHO == "3") {
  $html .= '
          <th class="color center">&nbsp;</th>
          <th class="color center">' . $TOTALPRECIO . '</th>
                                ';
}
$html .= '
        </tr>
    ';
$html = $html . '
    </tbody>
  </table>
  ';




$html = $html . '
  <div id="details" class="clearfix">
    <div id="client">
      <div class="address"><b>Informacion De Transporte</b></div>
      <div class="address">Empresa Transporte:  ' . $TRANSPORTE . ' </div>
      <div class="address">Conductor: ' . $CONDUCTOR . '</div>
      <div class="address">Patente Camión: ' . $PATENTECAMION . '</div>
      <div class="address">Patente Carro: ' . $PATENTECARRO . '</div>
    </div>
    <div id="client">
      <div class="address"><b>Observaciones</b></div>
      <div class="address">  ' . $OBSERVACIONES . ' </div>
    </div>
    <div id="invoice">
      <div class="date"><b><hr></b></div>
      <div class="date center">  Firma Responsable</div>
      <div class="date center">  ' . $NOMBRERESPONSABLE . '</div>
    </div>
  </div>
  
</main>
</body>
</html>

';



//CREACION NOMBRE DEL ARCHIVO
$NOMBREARCHIVO = "InformeDespachoProductoTerminado_";
$FECHADOCUMENTO = $FECHANORMAL . "_" . $HORAFINAL;
$TIPODOCUMENTO = "Informe";
$FORMATO = ".pdf";
$NOMBREARCHIVOFINAL = $NOMBREARCHIVO . $FECHADOCUMENTO . $FORMATO;

//CONFIGURACIOND DEL DOCUMENTO
$TIPOPAPEL = "LETTER";
$ORIENTACION = "P";
$LENGUAJE = "ES";
$UNICODE = "true";
$ENCODING = "UTF-8";

//DETALLE DEL CREADOR DEL INFORME
$TIPOINFORME = "Informe Despacho";
$CREADOR = "Usuario";
$AUTOR = "Usuario";
$ASUNTO = "Informe";

//API DE GENERACION DE PDF
require_once '../../api/mpdf/mpdf/autoload.php';
//$PDF = new \Mpdf\Mpdf();W
$PDF = new \Mpdf\Mpdf(['format' => 'letter']);

//CONFIGURACION FOOTER Y HEADER DEL PDF
//CONFIGURACION FOOTER Y HEADER DEL PDF
$PDF->SetHTMLHeader('
    <table width="100%" >
        <tbody>
            <tr>
              <th width="55%" class="left f10">' . $EMPRESA . '</th>
              <td width="45%" class="right f10">' . $FECHANORMAL2 . '</td>
              <td width="5%"  class="right f10"><span>{PAGENO}/{nbpg}</span></td>
            </tr>
        </tbody>
    </table>
    <br>
    
');

$PDF->SetHTMLFooter('



<footer>
  Para más información de nuestro sistema, contactar al equipo de Go Creative al WhatsApp: <a href="https://wa.me/56944627287">+56944627287</a>
  <br>
  Control de impresión: <b>' . $NOMBRE . '.</b> Hora impresión: <b>' . $HORAFINAL2 . '</b>
</footer>
    
');



$PDF->SetTitle($TIPOINFORME); //titulo pdf
$PDF->SetCreator($CREADOR); //CREADOR PDF
$PDF->SetAuthor($AUTOR); //AUTOR PDF
$PDF->SetSubject($ASUNTO); //ASUNTO PDF


//CONFIGURACION

//$PDF->simpleTables = true; 
//$PDF->packTableData = true;

//INICIALIZACION DEL CSS
$stylesheet = file_get_contents('../../assest/css/stylePdf.css'); // carga archivo css
$stylesheet2 = file_get_contents('../../assest/css/reset.css'); // carga archivo css

//ENLASAR CSS CON LA VISTA DEL PDF
$PDF->WriteHTML($stylesheet, 1);
$PDF->WriteHTML($stylesheet2, 1);

//GENERAR PDF
$PDF->WriteHTML($html);
//METODO DE SALIDA
$PDF->Output($NOMBREARCHIVOFINAL, \Mpdf\Output\Destination::INLINE);
