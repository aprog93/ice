<?php

namespace App\Controllers;

use PDO;
use Exception;
use PDOException;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use \PhpOffice\PhpSpreadsheet\Reader\Xls as XLS;
//use CodeIgniter\Files\File;
//use PhpOffice\PhpSpreadsheet\Spreadsheet;
use \PhpOffice\PhpSpreadsheet\Reader\Xlsx as XLSX;
use CodeIgniter\Database\Exceptions\DatabaseException;
use PhpOffice\PhpSpreadsheet\Calculation\TextData\Replace;

class BaseDatoController extends BaseController
{
    protected $helpers = ['form'];

    public function index()
    {
        //$data['titulo'] = 'Sistema de Exportaciones ICE';
        return view('sistema/bd');
    }
//-------------------------------------------------------------------------------------------------------------------------------------
    public function importar() {

        $data = [
            'formato' => date("Y-m-d"),
        ];
        return view('sistema/bd/importar', $data);

    }
//-------------------------------------------------------------------------------------------------------------------------------------
public function importarData() {

    $data = [];
    return view('sistema/bd/importarData', $data);

}
//-------------------------------------------------------------------------------------------------------------------------------------
    public function uploadFile($file) {

        if ($file->isValid() && !$file->hasMoved()) {

            $uploaded_file = WRITEPATH . 'uploads\\' . $file->store('DB\\', $file->getClientName());
            return $uploaded_file;
        }
        return null;
    }
    //--------------------------------------------------------------------------------------------------
    public function insertData($bd, $datos) {

        $count = 0;
        $fechas = [];

        if($bd == 1) { //Caso que la base de datos es colaboradores

            foreach($datos as $key=>$dato) {
                /*--------------------------------------------------------*/
                $valor = strtoupper($dato["CAUSA CIERRE"]);

                $causaCierre = model("CausaCierreContratoModel");
                $findResult = $causaCierre->where('descripcion', $valor)->first();

                if($findResult)
                    $idCausaCierre = $findResult['id'];
                else {
                    $values = [
                        'descripcion' => $valor,
                    ];
                    $idCausaCierre = $causaCierre->insert($values);
                }

                /* else {
                    $data = [
                        'msg' => "No existe la causa de cierre de contrato '$valor'. Asegúrese de importar primero el archivo excel con las Causas de Cierre de Contratos actualizadas.",
                        'type' => 'error',
                    ];
                    return $data;
                } */
                /*--------------------------------------------------------*/
                $valor = strtoupper($dato["PAIS VIAJA"]);

                $pais = model("PaisModel");
                $findResult = $pais->where('nombre', $valor)->first();

                if($findResult)
                    $idPais = $findResult['id'];
                else {
                    $values = [
                        'nombre' => $valor,
                    ];
                    $idPais = $pais->insert($values);
                }

                /*--------------------------------------------------------*/
                $valor = strtoupper($dato["SALE POR"]);

                $salidaPor = model("SalidaPorModel");
                $findResult = $salidaPor->where('descripcion', $valor)->first();

                if($findResult)
                    $idSalidaPor = $findResult['id'];
                else {
                    $data = [
                        'msg' => "No existe el organismo o instituto '$valor'. Asegúrese de importar primero el archivo excel con la lista de Organismos e Institutos actualizada por los que suelen salir los colaboradores.",
                        'type' => 'error',
                    ];
                    return $data;
                }
                /*--------------------------------------------------------*/
                $valor = strtoupper($dato["ACTIVIDAD ESPECIFICA"]);

                if(!isset($valor)) $valor = "-";

                $actividadEspecifica = model("ActividadEspecificaModel");
                $findResult = $actividadEspecifica->where('descripcion', $valor)->first();

                if($findResult)
                    $idActividadEspecifica = $findResult['id'];
                else {
                    $values = [
                        'descripcion' => $valor,
                    ];
                    $idActividadEspecifica = $actividadEspecifica->insert($values);
                }
                /*--------------------------------------------------------*/
                $valor = strtoupper($dato["ESTADO"]);
                if(!isset($valor)) $valor = "-";

                $estado = model("EstadoModel");
                $findResult = $estado->where('estado', $valor)
                                     ->where('idpais', $idPais)->first();

                if($findResult)
                    $idEstado = $findResult['id'];
                else {
                    $values = [
                        'estado' => $valor,
                        'idpais' => $idPais,
                    ];
                    $idEstado = $estado->insert($values);
                }
                /*--------------------------------------------------------*/
                //Convierto en Mayúsculas el texto y elimino posibles espacios en blanco.
                $pcc = str_replace(" ", "", strtoupper($dato["PCC"]));
                $ujc = str_replace(" ", "", strtoupper($dato["UJC"]));

                if(($pcc == "X" || $pcc == "SI") && ($ujc == "X" || $ujc == "SI"))
                    $valor = "UJC Y PCC";
                else if($ujc == "X" || $ujc == "SI")
                    $valor = "UJC";
                else if($pcc == "X" || $pcc == "SI")
                    $valor = "PCC";
                else
                $valor = "-";

                $militancia = model("MilitanciaModel");
                $findResult = $militancia->where('militancia', $valor)->first();
                if($findResult)
                    $idMilitancia = $findResult['id'];
                else {
                    $values = [
                        'militancia' => $valor,
                    ];
                    $idMilitancia = $militancia->insert($values);
                }
                /*--------------------------------------------------------*/
                //Convierto en Mayúsculas el texto y elimino posibles espacios en blanco.
                $titular = str_replace(" ", "", strtoupper($dato["TITULAR"]));
                $auxiliar = str_replace(" ", "", strtoupper($dato["AUXILIAR"]));
                $asistente = str_replace(" ", "", strtoupper($dato["ASISTENTE"]));

                if(($titular == "X" || $titular == "SI"))
                    $valor = "TITULAR";
                else if($auxiliar == "X" || $auxiliar == "SI")
                    $valor = "AUXILIAR";
                else if($asistente == "X" || $pcc == "SI")
                    $valor = "ASISTENTE";
                else
                    $valor = "-";

                $categoria = model("CategoriaDocenteModel");
                $findResult = $categoria->where('categoria', $valor)->first();
                if($findResult)
                    $idCategoria = $findResult['id'];
                else {
                    $data = [
                        'msg' => "No existe la categoría docente '$valor'. Asegúrese de importar primero el archivo excel con las Categorías Docentes actualizadas.",
                        'type' => 'error',
                    ];
                    return $data;
                }
                /*--------------------------------------------------------*/
                //Convierto en Mayúsculas el texto y elimino posibles espacios en blanco.
                $dr = str_replace(" ", "", strtoupper($dato["DR"]));
                $msc = str_replace(" ", "", strtoupper($dato["MSC"]));

                if(($dr == "X" || $dr == "SI"))
                    $valor = "DR";
                else if($msc == "X" || $msc == "SI")
                    $valor = "MSC";
                else
                    $valor = "-";

                $grado = model("GradoCientificoModel");
                $findResult = $grado->where('grado', $valor)->first();
                if($findResult) {
                    $idGrado = $findResult['id'];
                }
                else {
                    $data = [
                        'msg' => "No existe el grado científico '$valor'. Asegúrese de importar primero el archivo excel con los Grados Científicos actualizados.",
                        'type' => 'error',
                    ];
                    return $data;
                }
                /*--------------------------------------------------------*/
                $valor = strtoupper($dato["CARGO SALIR"]);

                $cargo = model("CargoModel");
                $findResult = $cargo->where('cargo', $valor)->first();

                if($findResult)
                    $idCargo = $findResult['id'];
                else {
                    $values = [
                        'cargo' => $valor,
                    ];
                    $idCargo = $cargo->insert($values);
                }
                /*--------------------------------------------------------*/
                $valor = strtoupper($dato["ESPECIALIDAD"]);
                $valor = ($valor == "" ? "-" : $valor);

                $especialidad = model("EspecialidadModel");
                $findResult = $especialidad->where('especialidad', $valor)->first();

                if($findResult)
                    $idEspecialidad = $findResult['id'];
                else {
                    $values = [
                        'especialidad' => $valor,
                    ];
                    $idEspecialidad = $especialidad->insert($values);
                }
                /*--------------------------------------------------------*/
                //Convierto en Mayúsculas el texto y elimino posibles espacios en blanco.
                $dpe = str_replace(" ", "", strtoupper($dato["DPE"]));
                $otros = str_replace(" ", "", strtoupper($dato["OTROS"]));

                if(($dpe == "X" || $dpe == "SI"))
                    $valor = "DPE";
                else if($otros != "")
                    $valor = $otros;
                else
                    $valor = "N/A";

                $tipocentro = model("TipoCentroModel");
                $findResult = $tipocentro->where('tipocentro', $valor)->first();
                if($findResult)
                    $idTipoCentro = $findResult['id'];
                else {
                    $values = [
                        'tipocentro' => $valor,
                    ];
                    $idTipoCentro = $tipocentro->insert($values);
                }
                /*--------------------------------------------------------*/
                $valor = strtoupper($dato["PROVINCIA"]);

                $provincia = model("ProvinciaModel");
                $findResult = $provincia->where('nombre', $valor)->first();

                if($findResult)
                    $idProvincia = $findResult['id'];
                else {
                    $data = [
                        'msg' => "No existe la provincia '$valor'. Asegúrese de importar primero el archivo excel con las Provincias actualizadas.",
                        'type' => 'error',
                    ];
                    return $data;
                }
                /*--------------------------------------------------------*/
                $valor = strtoupper($dato["MUNICIPIO"]);

                $municipio = model("MunicipioModel");
                $findResult = $municipio->where('nombre', $valor)
                                        ->where('idprovincia', $idProvincia)->first();

                if($findResult)
                    $idMunicipio = $findResult['id'];
                else {
                    $data = [
                        'msg' => "No existe el municipio '$valor'. Asegúrese de importar primero el archivo excel con los Municipios por Provincias actualizados.",
                   'type' => 'error',
                    ];
                    return $data;
                }
                /*--------------------------------------------------------*/
                $centrotrabajo = strtoupper($dato["CENTRO TRABAJO"]);
                $direccion = strtoupper($dato["DIRECCION CENTRO"]);

                $centro = model("CentroModel");
                $findResult = $centro->where('centrotrabajo', $centrotrabajo)
                                     ->where('direccioncentro', $direccion)->first();

                if($findResult)
                    $idCentro = $findResult['id'];
                else {
                    $values = [
                        'centrotrabajo' => $centrotrabajo,
                        'direccioncentro' => $direccion,
                        'idtipocentro' => $idTipoCentro,
                        'idmunicipio' => $idMunicipio,
                    ];
                    $idCentro = $centro->insert($values);
                }
                /*--------------------------------------------------------*/
                $valor = strtoupper($dato["SEXO"]);

                $sexo = model("SexoModel");
                if($sexo == 'F') $sexo = "FEMENINO";
                else if($sexo == 'M') $sexo = "MASCULINO";

                $findResult = $sexo->where('sexo', $valor)->first();

                if($findResult)
                    $idSexo = $findResult['id'];
                else {
                    $data = [
                        'msg' => "No existe el sexo '$valor'. Asegúrese de importar primero el archivo excel con los Sexos actualizados.",
                        'type' => 'error',
                    ];
                    return $data;
                }
                /*--------------------------------------------------------*/
                $valor = strtoupper($dato["ESTADO CIVIL"]);

                if($valor == "SOLTERO" || $valor == "SOLTERA") $valor = "SOLTERO(A)";
                else if($valor == "CASADO" || $valor == "CASADA") $valor = "CASADO(A)";
                else if($valor == "SEPARADO" || $valor == "SEPARADA") $valor = "SEPARADO(A)";
                else if($valor == "DIVORCIADO" || $valor == "DIVORCIADA") $valor = "DIVORCIADO(A)";
                else if($valor == "VIUDO" || $valor == "VIUDA") $valor = "VIUDO(A)";

                $estadocivil = model("EstadoCivilModel");
                $findResult = $estadocivil->where('descripcion', $valor)->first();

                if($findResult)
                    $idEstadoCivil = $findResult['id'];
                else {
                    $data = [
                        'msg' => "No existe el estado civil '$valor'. Asegúrese de importar primero el archivo excel con los Estados Civiles actualizados.",
                        'type' => 'error',
                    ];
                    return $data;
                }

                /*--------------------------------------------------------*/
                $valor = strtoupper($dato["PIEL"]);

                if($valor == 'B') $valor = "BLANCA";
                else if($valor == 'M') $valor = "MESTIZA";
                else if($valor == 'N') $valor = "NEGRA";

                $piel = model("ColorPielModel");
                $findResult = $piel->where('descripcion', $valor)->first();

                if($findResult)
                    $idColorPiel = $findResult['id'];
                else {
                    $data = [
                        'msg' => "No existe el color de piel '$valor'. Asegúrese de importar primero el archivo excel con los Colores de Piel actualizados.",
                        'type' => 'error',
                    ];
                    return $data;
                }
                /*--------------------------------------------------------*/
                $valor = str_replace(" ", "", strtoupper($dato["IDIOMA"]));

                $valor = ($valor == "" || $valor == null) ? "Español" : $valor;

                $idioma = model("IdiomaModel");
                $findResult = $idioma->where('idioma', $valor)->first();

                if($findResult)
                    $idIdioma = $findResult['id'];
                else {
                    $data = [
                        'msg' => "No existe el idioma '$valor'. Asegúrese de importar primero el archivo excel con los Idiomas actualizados.",
                        'type' => 'error',
                    ];
                    return $data;
                }
                /*--------------------------------------------------------*/
                $nombre = strtoupper($dato["NOMBRE Y APELLIDOS"]);
                $ci = strtoupper($dato["C IDENTIDAD"]);
                $cuadro = str_replace(" ", "", strtoupper($dato["CUADRO"]));

                if(($cuadro == "X" || $cuadro == "SI"))
                    $valor = 1;
                else
                    $valor = 0;

                $colaborador = model("ColaboradorModel");
                $findResult = $colaborador->where('nombre', $nombre)
                                          ->where('carneidentidad', $ci)->first();

                if($findResult)
                    $idColaborador = $findResult['id'];
                else {
                    $values = [
                        'nombre' => $nombre,
                        'carneidentidad' => $ci,
                        'idsexo' => $idSexo,
                        'edad' => strtoupper($dato["EDAD"]),
                        'idcolorpiel' => $idColorPiel,
                        'telefono' => strtoupper($dato["TELEFONO PART"]),
                        'direccion' => strtoupper($dato["DIRECCION PART"]),
                        'reparto' => strtoupper($dato["REPARTO"]),
                        'idmunicipio' => $idMunicipio,
                        'idestadocivil' => $idEstadoCivil,
                        'cantidadhijos' => intval($dato["CANT HIJOS"]),
                        'nombrepadre' => strtoupper($dato["PADRE"]),
                        'nombremadre' => strtoupper($dato["MADRE"]),
                        'familiaraavisar' => strtoupper($dato["FAMILIAR AVISO"]),
                        'conyugue' => strtoupper($dato["CONYUGE"]),
                        'idcentro' => $idCentro,
                        'idcargosalir' => $idCargo,
                        'idespecialidad' => $idEspecialidad,
                        'telefonolaboral' => $dato["TELEF TRABAJO"],
                        'cuadro' => $valor,
                        'idgradocientifico' => $idGrado,
                        'idcategoriadocente' => $idCategoria,
                        'ididioma' => $idIdioma,
                        'salario' => floatval($dato["SALARIO"]),
                        'idmilitancia' => $idMilitancia,
                    ];
                    $idColaborador = $colaborador->insert($values);
                }
                /*--------------------------------------------------------*/
                $valor = strtoupper($dato["NUMERO CONTRATO"]);

                /* if(empty(strtotime($dato["FECHA CONTRATO"])))
                    $count++;

                if(empty(strtotime($dato["FECHA SALIDA"])))
                    $count++;

                if(empty(strtotime($dato["FECHA REGRESO"])))
                    $count++; */

                $fechacontrato = date('Y-m-d', strtotime($dato["FECHA CONTRATO"]));
                $fechasalida = date('Y-m-d', strtotime($dato["FECHA SALIDA"]));
                $fecharegreso = date('Y-m-d', strtotime($dato["FECHA REGRESO"]));

                $contrato = model("ContratoModel");
                $findResult = $contrato->where('numerocontrato', $valor)->first();

                if($findResult) {

                    if ($findResult['idcolaborador'] != $idColaborador)
                        return [
                            'type' => 'error',
                            'msg' => "El Número de Contrato $valor especificado en el registro ". $key+1 ." ($nombre) ya existe en la Base de Datos y está relacionado con otro colaborador.",
                        ];

                        $idContrato = $findResult['id'];
                }
                else {
                    $values = [
                        'idcolaborador' => $idColaborador,
                        'numerocontrato' => $valor,
                        'fechacontrato' =>  $fechacontrato,
                        'idsalidapor' => $idSalidaPor,
                        'idestado' => $idEstado,
                        'institucion' => strtoupper($dato["INSTITUCION"]),
                        'localizacion' => strtoupper($dato["LOCALIZACION"]),
                        'funcionrealizar' => strtoupper($dato["FUNCION A REALIZAR"]),
                        'fechasalida' => $fechasalida,
                        'fecharegreso' => $fecharegreso,
                        'ingresospt' => floatval($dato["INGRESO SPT"]),
                        'ingresoaporte' => floatval($dato["INGRESO POR APORTE"]),
                        'totalingreso' => floatval($dato["TOTAL INGRESADO"]),
                        'viatico' => floatval($dato["VIATICO"]),
                        'idactividadespecifica' => $idActividadEspecifica,
                        'observaciones' => strtoupper($dato["OBSERVACIONES CONTRATO"]),
                        'entradavacaciones' => strtoupper($dato["ENTRADA VACACIONES"]),
                        'visa' => strtoupper($dato["VISAS"]),
                    ];
                    $idContrato = $contrato->insert($values);
                }
                /*--------------------------------------------------------*/
                $cierrecontrato = model("CierreContratoModel");

               /*  if(empty(strtotime($dato["FECHA CIERRE CONT"])))
                    $count++;

                if(empty(strtotime($dato["FECHA REAL REGRESO"])))
                    $count++; */

                $fechacierre = date('Y-m-d', strtotime($dato["FECHA CIERRE CONT"]));
                $fecharealregreso = date('Y-m-d', strtotime($dato["FECHA REAL REGRESO"]));

                $findResult = $cierrecontrato->where('idcontrato', $idContrato)->first();

                if(!$findResult) {
                    $values = [
                        'idcontrato' => $idContrato,
                        'fechacierre' => $fechacierre,
                        'fecharealregreso' =>$fecharealregreso,
                        'cierra' => boolval($dato["CIERRA"]),
                        'informe' => strtoupper($dato["INFORME"]),
                        'evaluacion' => strtoupper($dato["EVALUACION"]),
                        'idcausa' => $idCausaCierre,
                        'observaciones' => strtoupper($dato["OBSERVACIONES CIERRE"]),
                    ];
                    $idContrato = $cierrecontrato->insert($values);
                }
                /*--------------------------------------------------------*/
                /* if(empty(strtotime($dato["FECHA DESDE"])))
                    $count++;

                if(empty(strtotime($dato["FECHA HASTA"])))
                    $count++;

                if(empty(strtotime($dato["FECHA PRORROGA"])))
                    $count++; */

                $fechainicial = date('Y-m-d', strtotime($dato["FECHA DESDE"]));
                $fechafinal = date('Y-m-d', strtotime($dato["FECHA HASTA"]));
                $fechaprorroga = date('Y-m-d', strtotime($dato["FECHA PRORROGA"]));

                $prorroga = model("ProrrogaModel");
                $findResult = $prorroga->where('idcontrato', $idContrato)->first();

                if(!$findResult) {
                    $values = [
                        'idcontrato' => $idContrato,
                        'numerosuplemento' => strtoupper($dato["NO SUPLEMENTO"]),
                        'fechainicial' => $fechainicial,
                        'fechafinal' => $fechafinal,
                        'fechaprorroga' => $fechaprorroga,
                        'observaciones' => strtoupper($dato["OBSERVACIONES PRORROGA"]),
                    ];
                    $prorroga->insert($values);
                }
                /*--------------------------------------------------------*/
                $valor = strtoupper($dato["TIPO PASAPORTE"]);

                $tipoPasaporte = model("TipoPasaporteModel");
                $findResult = $tipoPasaporte->where('pasaporte', $valor)->first();

                if($findResult)
                    $idTipoPasaporte = $findResult['id'];
                else {
                    $values = [
                        'pasaporte' => $valor,
                    ];
                    $idTipoPasaporte = $tipoPasaporte->insert($values);
                }
                /*--------------------------------------------------------*/
                $ubicacionPasaporte = model("UbicacionPasaporteModel");

                $findResult = $ubicacionPasaporte->where('ubicacion', "")->first();
                if($findResult)
                    $idUbicacion = $findResult['id'];
                else {
                    $values = [
                        'ubicacion' => "",
                    ];
                    $idUbicacion = $ubicacionPasaporte->insert($values);
                }
                /*--------------------------------------------------------*/
                /* if(empty(strtotime($dato["FECHA DE VENCIMIENTO"])))
                    $count++; */

                $numeropasaporte = strtoupper($dato["NUM PASAPORTE"]);

                $fechavencimiento = date('Y-m-d', strtotime($dato["FECHA DE VENCIMIENTO"]));

                $pasaporte = model("PasaporteModel");
                $findResult = $pasaporte->where('idcolaborador', $idColaborador)
                                        ->where('idtipopasaporte', $idTipoPasaporte)->first();

                if($findResult) {

                    if ($findResult['numeropasaporte'] != $numeropasaporte) {

                        return [
                            'type' => 'error',
                            'msg' => "Está intentando asignar un nuevo pasaporte a un colaborador que ya posee uno del mismo tipo. Si es correcto lo que intenta hacer, hágalo manualmente a través del sistema. Consulte el registro No. ". $key+1 ." de la Base de Datos.",
                        ];

                    }

                    $idPasaporte = $findResult['id'];
                }
                else {
                    $values = [
                        'idcolaborador' => $idColaborador,
                        'idtipopasaporte' => $idTipoPasaporte,
                        'numeropasaporte' => $numeropasaporte,
                        'numeroarchivo' => "",
                        'fechavencimiento' => $fechavencimiento,
                        'idubicacion' => $idUbicacion,
                    ];
                    $idPasaporte = $pasaporte->insert($values);
                }
                /*--------------------------------------------------------*/
            }
        }
        else {         //Caso que la base de datos es pasaportes
            foreach($datos as $key=>$dato) {

                $pasaporte = model("PasaporteModel");

                $numeroPasaporte = strtoupper($dato["PASAPORTE #"]);
                $fechavencimiento = date('Y-m-d', strtotime($dato["FECHA VENCIMIENTO"]));

                $findResult = $pasaporte->where('numeropasaporte', $numeroPasaporte)
                                        ->where('fechavencimiento', $fechavencimiento)->first();

                if($findResult) {
                    $values = [
                        'idcolaborador' => $findResult['idcolaborador'],
                        'idtipopasaporte' => $findResult['idtipopasaporte'],
                        'numeropasaporte' => $numeroPasaporte,
                        'numeroarchivo' => strtoupper($dato["NO. ARCHIVO"]),
                        'fechavencimiento' => $fechavencimiento,
                        'idubicacion' =>  $findResult['idubicacion'],
                    ];
                    $idPasaporte = $pasaporte->save($values);
                    //$idPasaporte = $findResult['id'];
                }
                else {
                    $data = [
                        'msg' => "No existe el pasaporte con Número $numeroPasaporte y fecha de Vencimiento $fechavencimiento. Asegúrese de importar primero la base de datos colaboradores correspondiente.",
                        'type' => 'error',
                ];
                    return $data;
                }
                /*--------------------------------------------------------*/
            }
        }
        return null;
    }
    //-------------------------------------------------------------------------------------------------------------------------------------
    public function accionImportar()
    {
        if (!extension_loaded('PDO'))
            exit("No se encentra activado el controlador PDO para PHP.");

        $bd = $this->request->getVar("bd");

        if($bd == 0) {
            $data = [
                'error' => 'Debe seleccionar qué información contiene la Base de datos',
                'formato' => date("Y-m-d"),
            ];
            return view('sistema/bd/importar', $data);
        }
        else if($bd == 1)
            $query = "SELECT * FROM colaboradores";
        else
            $query = "SELECT * FROM pasaportes";

        $validationRule = [
            'fila' => [
                'label' => 'Archivo de Base de Datos',
                'rules' => [
                    'uploaded[fila]',
                    'mime_in[fila,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/msaccess,application/x-msaccess]',
                    'max_size[fila,51200]',
                ],
                'errors' => [
                    'uploaded' => 'No se pudo cargar el {field}.',
                    'mime_in' => 'El {field} no es válido.',
                    'ext_in' => 'El {field} no tiene una extensión válida.',
                ],
            ],
        ];

        if (!$this->validateData([], $validationRule)) {
            $data = [
                'type' => 'error',
                'error' => $this->validator->getErrors(),
            ];

            return view('sistema/bd/importar', $data);
        }

        $fila = $this->request->getFile('fila');
        $mime = $fila->getMimeType();

        $filepath = $this->uploadFile($fila);

        if (file_exists($filepath)) {

            $datos = array();
            $cols = 0;
            $rows = 0;

            if ($mime == "application/msaccess" || $mime == "application/x-msaccess") {

                $user = "";
                $pass = "";

                $dbpath = str_replace("\\/", "\\", $filepath);

                try {

                    $db = new PDO("odbc:Driver={Microsoft Access Driver (*.mdb, *.accdb)};Dbq=$dbpath;Uid=$user;Pwd=$pass;");
                   /*  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); */

                    $sql = $db->prepare($query);
                    $sql->execute();

                    //$datos = $sql->fetchAll(PDO::FETCH_ASSOC);
                    $datos = $sql->fetchAll(PDO::FETCH_ASSOC);

                    $sql=null;
                    $db=null;

                }
                catch (PDOException $e) {
                    $data = [
                        'type' => 'error',
                        'msg' => $e->getMessage(),
                        'formato' => date("Y-m-d"),
                    ];
                    return view('sistema/bd/importar', $data);
                }

            }
            else {

                $reader = ($mime == "application/vnd.ms-excel") ? new XLS() : new XLSX();

                $spreadsheet = $reader->load($filepath);
                $alldata = $spreadsheet->getActiveSheet()->toArray();
                $columnas = array();
                $datos = array();

                foreach ($alldata as $key => $registro) {
                    if ($key == 0) {
                        foreach ($registro as $index => $cell) {
                            $columnas[$index] = strtoupper($cell);
                        }
                        $cols = $index+1;
                    }
                    else if ($key > 0) {

                        $datos[$key - 1] = array();
                        for ($i = 0; $i < $cols; $i++) {
                            $datos[$key - 1][$columnas[$i]] = $registro[$i];
                        }
                    }
                }
            }

            @unlink(realpath($filepath));

            $data = $this->insertData($bd,$datos);

            $data['title'] = 'Importar base de datos';
            $data['accept_link'] = 'sistema/bd/import';

            if (!empty($data['type'])) {

                if ($data['type'] == 'error')
                    return view('mensajes/error', $data);
            }

            $data['msg'] = 'Base de datos importada con éxito. ¿Desea importar otra base de datos?';
            $data['cancel_link'] = 'sistema/bd';

            return view('mensajes/success-question', $data);
        }

        $data = ['error' => 'El archivo ha sido eliminado o movido del lugar.'];
        return view('sistema/bd/importar', $data);
    }
    //----------------------------------------------------------------------------------------------
    public function insertDataTable($dbTable, $tbdata)
    {
        $db = \Config\Database::connect();
        try {
            $builder = $db->table($dbTable);

            foreach ($tbdata as $keys => $datos) {

                $data = array();
                foreach ($datos as $key => $dato) {
                    if ($key != 'id') {
                        $data[$key] = $dato;
                    }
                }
                //print_r($data);
                $findResult = $builder->getWhere($data)->getResult();

                if(!$findResult) {
                    $builder->insert($data);
                }
            }
            $data = null;
        }
        catch(DatabaseException $e) {
            $data = [
                'msg' => "Error insertando los datos en la base de datos. El nombre del archivo no es correcto, se han modificado los encabezados de columnas o los datos no son válidos. Verifique también que está importando datos en el orden correcto.",
                'type' => 'error',
            ];
        }
        return $data;
    }
    //-----------------------------------------------------------------------------------------------------
    public function accionImportarDatos()
    {
        $validationRule = [
            'fila' => [
                'label' => 'Archivo de Datos',
                'rules' => [
                    'uploaded[fila]',
                    'mime_in[fila,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet]',
                    'max_size[fila,4096]',
                ],
                'errors' => [
                    'uploaded' => 'No se pudo cargar el {field}.',
                    'mime_in' => 'El {field} no es válido.',
                    'ext_in' => 'El {field} no tiene una extensión válida.',
                    'max_size' => 'El {field} es demasiado grande para la información que debe contener.',
                ],
            ],
        ];

        if (!$this->validateData([], $validationRule)) {
            $data = [
                'type' => 'error',
                'error' => $this->validator->getErrors(),
            ];

            return view('sistema/bd/importarDatos', $data);
        }

        $fila = $this->request->getFile('fila');
        $dbTable = explode(".", $fila->getClientName())[0];
        $dbTable = str_replace(" ","",$dbTable);

         $mime = $fila->getMimeType();

        $filepath = $this->uploadFile($fila);

        if (file_exists($filepath)) {

            $datos = array();
            $cols = 0;

            $reader = ($mime == "application/vnd.ms-excel") ? new XLS() : new XLSX();

            $spreadsheet = $reader->load($filepath);
            $alldata = $spreadsheet->getActiveSheet()->toArray();
            $columnas = array();
            $datos = array();

            foreach ($alldata as $key => $registro) {
                if ($key == 0) {
                    foreach ($registro as $index => $cell) {
                        if(!empty($cell))
                            $columnas[$index] = $cell;
                    }
                    $cols = $index+1;
                }
                else if ($key > 0) {

                    $datos[$key - 1] = array();
                    for ($i = 0; $i < $cols; $i++) {
                        if(!empty($columnas[$i]))
                            $datos[$key - 1][$columnas[$i]] = $registro[$i];
                    }
                }
            }

            @unlink(realpath($filepath));

           $data = $this->insertDataTable($dbTable, $datos);

            $data['title'] = 'Importación de datos';
            $data['accept_link'] = 'sistema/bd/importdata';

            if (!empty($data['type'])) {

                if ($data['type'] == 'error')
                    return view('mensajes/error', $data);
            }

            $data['msg'] = 'Base de datos importada con éxito. ¿Desea importar otra base de datos?';
            $data['cancel_link'] = 'sistema/bd';

            return view('mensajes/success-question', $data);
        }

        $data = ['error' => 'El archivo ha sido eliminado o movido del lugar.'];
        return view('sistema/bd/importar', $data);
    }
    //----------------------------------------------------------------------------------------------
    function vaciarBD() {
        $data = [
            'title' => 'Vaciar base de datos',
            'msg' => 'Se eliminará toda la información guardada en la Base de datos. Este proceso es irreversible. ¿Desea continuar de todos modos?',
            'accept_link' => 'sistema/bd/cleanAll',
            'cancel_link' => 'sistema/bd',
        ];
        return view('mensajes/question', $data);
    }
    //----------------------------------------------------------------------------------------------
    function accionVaciarBD()
    {
        $db = \Config\Database::connect();

        $builder = $db->table('visas');
        $builder->emptyTable('visas');

        $builder = $db->table('gastostramites');
        $builder->emptyTable('gastostramites');

        $builder = $db->table('tiposgastos');
        $builder->emptyTable('tiposgastos');

        $builder = $db->table('estadostramites');
        $builder->emptyTable('estadostramites');

        $builder = $db->table('tramitespasaportes');
        $builder->emptyTable('tramitespasaportes');

        $builder = $db->table('pasaportes');
        $builder->emptyTable('pasaportes');

        $builder = $db->table('prestamospasaportes');
        $builder->emptyTable('prestamospasaportes');

        $builder = $db->table('notas');
        $builder->emptyTable('notas');

        $builder = $db->table('expedientes');
        $builder->emptyTable('expedientes');

        $builder = $db->table('motivosviajes');
        $builder->emptyTable('motivosviajes');

        $builder = $db->table('tiposactividades');
        $builder->emptyTable('tiposactividades');

        $builder = $db->table('ubicacionespasaportes');
        $builder->emptyTable('ubicacionespasaportes');

        $builder = $db->table('tipospasaporte');
        $builder->emptyTable('tipospasaporte');

        $builder = $db->table('prorrogas');
        $builder->emptyTable('prorrogas');

        $builder = $db->table('cierrescontratos');
        $builder->emptyTable('cierrescontratos');

        $builder = $db->table('contratos');
        $builder->emptyTable('contratos');

        $builder = $db->table('bajas');
        $builder->emptyTable('bajas');

        $builder = $db->table('motivosbajas');
        $builder->emptyTable('motivosbajas');

        $builder = $db->table('colaboradores');
        $builder->emptyTable('colaboradores');

        $builder = $db->table('sexos');
        $builder->emptyTable('sexos');

        $builder = $db->table('colorespiel');
        $builder->emptyTable('colorespiel');

        $builder = $db->table('direccionesparticulares');
        $builder->emptyTable('direccionesparticulares');

        $builder = $db->table('municipios');
        $builder->emptyTable('municipios');

        $builder = $db->table('provincias');
        $builder->emptyTable('provincias');

        $builder = $db->table('estadosciviles');
        $builder->emptyTable('estadosciviles');

        $builder = $db->table('centros');
        $builder->emptyTable('centros');

        $builder = $db->table('tiposcentros');
        $builder->emptyTable('tiposcentros');

        $builder = $db->table('especialidades');
        $builder->emptyTable('especialidades');

        $builder = $db->table('cargos');
        $builder->emptyTable('cargos');

        $builder = $db->table('gradoscientificos');
        $builder->emptyTable('gradoscientificos');

        $builder = $db->table('categoriasdocentes');
        $builder->emptyTable('categoriasdocentes');

        $builder = $db->table('idiomas');
        $builder->emptyTable('idiomas');

        $builder = $db->table('militancia');
        $builder->emptyTable('militancia');

        $builder = $db->table('estados');
        $builder->emptyTable('estados');

        $builder = $db->table('actividadesespecificas');
        $builder->emptyTable('actividadesespecificas');

        $builder = $db->table('salidaspor');
        $builder->emptyTable('salidaspor');

        $builder = $db->table('paises');
        $builder->emptyTable('paises');

        $builder = $db->table('causascierrecontratos');
        $builder->emptyTable('causascierrecontratos');

        $data = [
            'title' => 'Vaciar base de datos',
            'msg' => 'La operación se realizó con óxito.',
            'accept_link' => 'sistema/bd',
        ];
        return view('mensajes/success', $data);


        $db->close();

    }
    //----------------------------------------------------------------------
    function prueba() {
        $data = [
            'title' => 'Prueba',
            'error' => 'Operación de prueba.',
            'accept_link' => '/',
        ];
        return view('mensajes/error', $data);
    }
}