<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use PDO;
use PDOException;
//use CodeIgniter\Files\File;
//use PhpOffice\PhpSpreadsheet\Spreadsheet;
use \PhpOffice\PhpSpreadsheet\Reader\Xls as XLS;
use \PhpOffice\PhpSpreadsheet\Reader\Xlsx as XLSX;

use \App\Models\ActividadEspecificaModel;
use \App\Models\CargoModel;
use \App\Models\CategoriaCientificaModel;
use \App\Models\CategoriaDocenteModel;
use \App\Models\CausaCierreContratoModel;
use \App\Models\CentroModel;
use \App\Models\CierreContratoModel;
use \App\Models\ColaboradorModel;
use \App\Models\ColorPielModel;
use \App\Models\ContratoModel;
use \App\Models\DepositoModel;
use \App\Models\DireccionModel;
use \App\Models\EspecialidadModel;
use \App\Models\EstadoCivilModel;
use \App\Models\EstadoColaboradorModel;
use \App\Models\EstadoModel;
use \App\Models\EstadoTramiteModel;
use \App\Models\ExpedienteModel;
use \App\Models\IdiomaModel;
use \App\Models\MilitanciaModel;
use \App\Models\MotivoViajeModel;
use \App\Models\MunicipioModel;
use \App\Models\NotaModel;
use \App\Models\PaisModel;
use \App\Models\PasaporteModel;
use \App\Models\ProfesionModel;
use \App\Models\ProrrogaModel;
use \App\Models\ProvinciaModel;
use \App\Models\SalidaPorModel;
use \App\Models\SexoModel;
use \App\Models\TipoActividadModel;
use \App\Models\TipoCentroModel;
use \App\Models\TipoPasaporteModel;
use \App\Models\UbicacionPasaporteModel;
use DateTime;
use Exception;

class AppController extends BaseController
{
    protected $helpers = ['form'];

    public function index()
    {
        //$data['titulo'] = 'Sistema de Exportaciones ICE';
        return view('app/home');
    }

    public function bd()
    {
        //$data['titulo'] = 'Sistema de Exportaciones ICE';
        return view('app/bd');
    }
//-------------------------------------------------------------------------------------------------------------------------------------
    public function importar() {

        $data = [
            'formato' => date("Y-m-d"),
        ];
        return view('app/bd/importar', $data);

    }
//-------------------------------------------------------------------------------------------------------------------------------------
    public function invalidAccess()
    {
        $data['message'] = 'Usted no se ha autenticado en el sistema.';
        return view('app/invalid_access', $data);
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

        if($bd == 1) { //Caso que la base de datos es colaboradores

            foreach($datos as $key=>$val) {
                /*--------------------------------------------------------*/
                $valor = strtoupper($datos[$key]["CAUSA CIERRE"]);

                $causaCierre = model("CausaCierreContratoModel");
                $findResult = $causaCierre->where('descripcion', $valor)->first();

                if($findResult)
                    $idCausaCierre = $findResult['id'];
                else {
                    $data = [
                        'descripcion' => $valor,
                    ];
                    $idCausaCierre = $causaCierre->insert($data);
                }
                /*--------------------------------------------------------*/
                $valor = strtoupper($datos[$key]["PAIS VIAJA"]);

                $pais = model("PaisModel");
                $findResult = $pais->where('nombre', $valor)->first();

                if($findResult)
                    $idPais = $findResult['id'];
                else {
                    $data = [
                        'nombre' => $valor,
                    ];
                    $idPais = $pais->insert($data);
                }

                /*--------------------------------------------------------*/
                $valor = strtoupper($datos[$key]["SALE POR"]);

                $salidaPor = model("SalidaPorModel");
                $findResult = $salidaPor->where('descripcion', $valor)->first();

                if($findResult)
                    $idSalidaPor = $findResult['id'];
                else {
                    $data = [
                        'descripcion' => $valor,
                    ];
                    $idSalidaPor = $salidaPor->insert($data);
                }
                /*--------------------------------------------------------*/
                $valor = strtoupper($datos[$key]["ACTIVIDAD ESPECIFICA"]);

                $actividadEspecifica = model("ActividadEspecificaModel");
                $findResult = $actividadEspecifica->where('descripcion', $valor)->first();

                if($findResult)
                    $idActividadEspecifica = $findResult['id'];
                else {
                    $data = [
                        'descripcion' => $valor,
                    ];
                    $idActividadEspecifica = $actividadEspecifica->insert($data);
                }
                /*--------------------------------------------------------*/
                $valor = strtoupper($datos[$key]["ESTADO"]);

                $estado = model("EstadoModel");
                $findResult = $estado->where('estado', $valor)
                                     ->where('idpais', $idPais)->first();

                if($findResult)
                    $idEstado = $findResult['id'];
                else {
                    $data = [
                        'estado' => $valor,
                        'idpais' => $idPais,
                    ];
                    $idEstado = $estado->insert($data);
                }
                /*--------------------------------------------------------*/
                //Convierto en Mayúsculas el texto y elimino posibles espacios en blanco.
                $pcc = str_replace(" ", "", strtoupper($datos[$key]["PCC"]));
                $ujc = str_replace(" ", "", strtoupper($datos[$key]["UJC"]));

                if(($pcc == "X" || $pcc == "SI") && ($ujc == "X" || $ujc == "SI"))
                    $valor = "UJC/PCC";
                else if($ujc == "X" || $ujc == "SI")
                    $valor = "UJC";
                else if($pcc == "X" || $pcc == "SI")
                    $valor = "PCC";
                else
                $valor = "NO";

                $militancia = model("MilitanciaModel");
                $findResult = $militancia->where('militancia', $valor)->first();
                if($findResult)
                    $idMilitancia = $findResult['id'];
                else {
                    $data = [
                        'militancia' => $valor,
                    ];
                    $idMilitancia = $militancia->insert($data);
                }
                /*--------------------------------------------------------*/
                $valor = strtoupper($datos[$key]["IDIOMA"]);

                $idioma = model("IdiomaModel");
                $findResult = $idioma->where('idioma', $valor)->first();

                if($findResult)
                    $idIdioma = $findResult['id'];
                else {
                    $data = [
                        'idioma' => $valor,
                    ];
                    $idIdioma = $idioma->insert($data);
                }
                /*--------------------------------------------------------*/
                //Convierto en Mayúsculas el texto y elimino posibles espacios en blanco.
                $titular = str_replace(" ", "", strtoupper($datos[$key]["TITULAR"]));
                $auxiliar = str_replace(" ", "", strtoupper($datos[$key]["AUXILIAR"]));
                $asistente = str_replace(" ", "", strtoupper($datos[$key]["ASISTENTE"]));

                if(($titular == "X" || $titular == "SI"))
                    $valor = "TITULAR";
                else if($auxiliar == "X" || $auxiliar == "SI")
                    $valor = "AUXILIAR";
                else if($asistente == "X" || $pcc == "SI")
                    $valor = "ASISTENTE";
                else
                $valor = "NO";

                $categoria = model("CategoriaDocenteModel");
                $findResult = $categoria->where('categoria', $valor)->first();
                if($findResult)
                    $idCategoria = $findResult['id'];
                else {
                    $data = [
                        'categoria' => $valor,
                    ];
                    $idCategoria = $categoria->insert($data);
                }
                /*--------------------------------------------------------*/
                //Convierto en Mayúsculas el texto y elimino posibles espacios en blanco.
                $dr = str_replace(" ", "", strtoupper($datos[$key]["DR"]));
                $msc = str_replace(" ", "", strtoupper($datos[$key]["MSC"]));

                if(($dr == "X" || $dr == "SI"))
                    $valor = "DR";
                else if($msc == "X" || $msc == "SI")
                    $valor = "MSC";
                else
                $valor = "NO";

                $categoria = model("CategoriaCientificaModel");
                $findResult = $categoria->where('categoria', $valor)->first();
                if($findResult)
                    $idGrado = $findResult['id'];
                else {
                    $data = [
                        'categoria' => $valor,
                    ];
                    $idGrado = $categoria->insert($data);
                }
                /*--------------------------------------------------------*/
                $valor = strtoupper($datos[$key]["CARGO SALIR"]);

                $cargo = model("CargoModel");
                $findResult = $cargo->where('cargo', $valor)->first();

                if($findResult)
                    $idCargo = $findResult['id'];
                else {
                    $data = [
                        'cargo' => $valor,
                    ];
                    $idCargo = $cargo->insert($data);
                }
                /*--------------------------------------------------------*/
                $valor = strtoupper($datos[$key]["ESPECIALIDAD"]);

                $especialidad = model("EspecialidadModel");
                $findResult = $especialidad->where('especialidad', $valor)->first();

                if($findResult)
                    $idEspecialidad = $findResult['id'];
                else {
                    $data = [
                        'especialidad' => $valor,
                    ];
                    $idEspecialidad = $especialidad->insert($data);
                }
                /*--------------------------------------------------------*/
                //Convierto en Mayúsculas el texto y elimino posibles espacios en blanco.
                $dpe = str_replace(" ", "", strtoupper($datos[$key]["DPE"]));
                $otros = str_replace(" ", "", strtoupper($datos[$key]["OTROS"]));

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
                    $data = [
                        'tipocentro' => $valor,
                    ];
                    $idTipoCentro = $tipocentro->insert($data);
                }
                /*--------------------------------------------------------*/
                $centrotrabajo = strtoupper($datos[$key]["CENTRO TRABAJO"]);
                $direccion = strtoupper($datos[$key]["DIRECCION CENTRO"]);

                $centro = model("CentroModel");
                $findResult = $centro->where('centrotrabajo', $centrotrabajo)
                                     ->where('direccion', $direccion)->first();

                if($findResult)
                    $idCentro = $findResult['id'];
                else {
                    $data = [
                        'centrotrabajo' => $centrotrabajo,
                        'direccion' => $direccion,
                        'idtipocentro' => $idTipoCentro,
                    ];
                    $idCentro = $centro->insert($data);
                }
                /*--------------------------------------------------------*/
                $valor = strtoupper($datos[$key]["ESTADO CIVIL"]);

                $estadocivil = model("EstadoCivilModel");
                $findResult = $estadocivil->where('descripcion', $valor)->first();

                if($findResult)
                    $idEstadoCivil = $findResult['id'];
                else {
                    $data = [
                        'descripcion' => $valor,
                    ];
                    $idEstadoCivil = $estadocivil->insert($data);
                }
                /*--------------------------------------------------------*/
                $valor = strtoupper($datos[$key]["PROVINCIA"]);

                $provincia = model("ProvinciaModel");
                $findResult = $provincia->where('nombre', $valor)->first();

                if($findResult)
                    $idProvincia = $findResult['id'];
                else {
                    $data = [
                        'nombre' => $valor,
                    ];
                    $idProvincia = $provincia->insert($data);
                }
                /*--------------------------------------------------------*/
                $valor = strtoupper($datos[$key]["MUNICIPIO"]);

                $municipio = model("MunicipioModel");
                $findResult = $municipio->where('nombre', $valor)
                                        ->where('idprovincia', $idProvincia)->first();

                if($findResult)
                    $idMunicipio = $findResult['id'];
                else {
                    $data = [
                        'nombre' => $valor,
                        'idprovincia' => $idProvincia,
                    ];
                    $idMunicipio = $municipio->insert($data);
                }
                /*--------------------------------------------------------*/
                $valor = strtoupper($datos[$key]["DIRECCION PART"]);
                $reparto = strtoupper($datos[$key]["REPARTO"]);

                $direccion = model("DireccionModel");
                $findResult = $direccion->where('descripcion', $valor)
                                        ->where('reparto', $reparto)->first();

                if($findResult)
                    $idDireccion = $findResult['id'];
                else {
                    $data = [
                        'descripcion' => $valor,
                        'reparto' => $idProvincia,
                    ];
                    $idDireccion = $direccion->insert($data);
                }
                /*--------------------------------------------------------*/
                $valor = strtoupper($datos[$key]["PIEL"]);

                $piel = model("ColorPielModel");
                $findResult = $piel->where('descripcion', $valor)->first();

                if($findResult)
                    $idColorPiel = $findResult['id'];
                else {
                    $data = [
                        'descripcion' => $valor,
                    ];
                    $idColorPiel = $piel->insert($data);
                }
                /*--------------------------------------------------------*/
                $valor = strtoupper($datos[$key]["SEXO"]);

                $sexo = model("SexoModel");
                $findResult = $sexo->where('sexo', $valor)->first();

                if($findResult)
                    $idSexo = $findResult['id'];
                else {
                    $data = [
                        'sexo' => $valor,
                    ];
                    $idSexo = $sexo->insert($data);
                }
                /*--------------------------------------------------------*/
                $nombre = strtoupper($datos[$key]["NOMBRE Y APELLIDOS"]);
                $ci = strtoupper($datos[$key]["C IDENTIDAD"]);
                $cuadro = str_replace(" ", "", strtoupper($datos[$key]["CUADRO"]));

                if(($cuadro == "X" || $cuadro == "SI"))
                    $valor = true;
                else
                    $valor = false;

                $colaborador = model("ColaboradorModel");
                $findResult = $colaborador->where('nombre', $nombre)
                                          ->where('carneidentidad', $ci)->first();

                if($findResult)
                    $idColaborador = $findResult['id'];
                else {
                    $data = [
                        'nombre' => $nombre,
                        'carneidentidad' => $ci,
                        'idsexo' => $idSexo,
                        'edad' => strtoupper($datos[$key]["EDAD"]),
                        'idcolorpiel' => $idColorPiel,
                        'telefono' => strtoupper($datos[$key]["TELEFONO PART"]),
                        'iddireccion' => $idDireccion,
                        'idmunicipio' => $idMunicipio,
                        'idestadocivil' => $idEstadoCivil,
                        'cantidadhijos' => intval($datos[$key]["CANT HIJOS"]),
                        'nombrepadre' => strtoupper($datos[$key]["PADRE"]),
                        'nombremadre' => strtoupper($datos[$key]["MADRE"]),
                        'familiaraavisar' => strtoupper($datos[$key]["FAMILIAR AVISO"]),
                        'conyugue' => strtoupper($datos[$key]["CONYUGE"]),
                        'idcentro' => $idCentro,
                        'idcargosalir' => $idCargo,
                        'idespecialidad' => $idEspecialidad,
                        'telefonolaboral' => $datos[$key]["TELEF TRABAJO"],
                        'cuadro' => $valor,
                        'idcategoriacientifica' => $idGrado,
                        'idcategoriadocente' => $idCategoria,
                        'ididioma' => $idIdioma,
                        'salario' => floatval($datos[$key]["SALARIO"]),
                        'idmilitancia' => $idMilitancia,
                    ];
                    $idColaborador = $colaborador->insert($data);
                }
                /*--------------------------------------------------------*/
                $valor = strtoupper($datos[$key]["NUMERO CONTRATO"]);

                try {

                   // $fechacontrato = ;
                    $fechacontrato = (new DateTime($datos[$key]["FECHA CONTRATO"]))->format('Y-m-d');

                    //$fechasalida = ;
                    $fechasalida = (new DateTime($datos[$key]["FECHA SALIDA"]))->format('Y-m-d');

                    //$fecharegreso = ;
                    $fecharegreso = (new DateTime($datos[$key]["FECHA REGRESO"]))->format('Y-m-d');
                } catch (Exception $e) {
                    $data = [
                        'error' => $e->getMessage(),
                        'formato' => date("Y-m-d"),
                    ];
                    return view('app/bd/importar', $data);
                }

                $contrato = model("ContratoModel");
                $findResult = $contrato->where('numerocontrato', $valor)->first();

                if($findResult)
                    $idContrato = $findResult['id'];
                else {
                    $data = [
                        'idcolaborador' => $idColaborador,
                        'numerocontrato' => $valor,
                        'fechacontrato' =>  $fechacontrato,
                        'idsalidapor' => $idSalidaPor,
                        'idestado' => $idEstado,
                        'institucion' => strtoupper($datos[$key]["INSTITUCION"]),
                        'localizacion' => strtoupper($datos[$key]["LOCALIZACION"]),
                        'funcionrealizar' => strtoupper($datos[$key]["FUNCION A REALIZAR"]),
                        'fechasalida' => $fechasalida,
                        'fecharegreso' => $fecharegreso,
                        'ingresospt' => floatval($datos[$key]["INGRESO SPT"]),
                        'ingresoaporte' => floatval($datos[$key]["INGRESO POR APORTE"]),
                        'totalingreso' => floatval($datos[$key]["TOTAL INGRESADO"]),
                        'viatico' => floatval($datos[$key]["VIATICO"]),
                        'idactividadespecifica' => $idActividadEspecifica,
                        'observaciones' => strtoupper($datos[$key]["OBSERVACIONES CONTRATO"]),
                        'entradavacaciones' => strtoupper($datos[$key]["ENTRADA VACACIONES"]),
                        'visa' => strtoupper($datos[$key]["VISAS"]),
                    ];
                    $idContrato = $contrato->insert($data);
                }
                /*--------------------------------------------------------*/
                $cierrecontrato = model("CierreContratoModel");

                try {

                    //$fechacierre = ;
                    $fechacierre = (new DateTime($datos[$key]["FECHA CIERRE CONT"]))->format('Y-m-d');

                    //$fecharealregreso = ;
                    $fecharealregreso = (new DateTime($datos[$key]["FECHA REAL REGRESO"]))->format('Y-m-d');

                } catch (Exception $e) {
                    $data = [
                        'error' => $e->getMessage(),
                        'formato' => date("Y-m-d"),
                    ];
                    return view('app/bd/importar', $data);
                }

                $findResult = $cierrecontrato->where('idcontrato', $idContrato)->first();
                //echo $datos[$key]["FECHA CIERRE CONT"];
                if(!$findResult) {
                    $data = [
                        'idcontrato' => $idContrato,
                        'fechacierre' => $fechacierre,
                        'fecharealregreso' =>$fecharealregreso,
                        'cierra' => boolval($datos[$key]["CIERRA"]),
                        'informe' => strtoupper($datos[$key]["INFORME"]),
                        'evaluacion' => strtoupper($datos[$key]["EVALUACION"]),
                        'idcausa' => $idCausaCierre,
                        'observaciones' => strtoupper($datos[$key]["OBSERVACIONES CIERRE"]),
                    ];
                    $idContrato = $cierrecontrato->insert($data);
                }
                /*--------------------------------------------------------*/
                try {

                    //$fechainicial = ;
                    $fechainicial = (new DateTime($datos[$key]["FECHA DESDE"]))->format('Y-m-d');

                    //$fechafinal = ;
                    $fechafinal = (new DateTime($datos[$key]["FECHA HASTA"]))->format('Y-m-d');

                    //$fechaprorroga = ;
                    $fechaprorroga = (new DateTime($datos[$key]["FECHA PRORROGA"]))->format('Y-m-d');

                } catch (Exception $e) {
                    $data = [
                        'error' => $e->getMessage(),
                        'formato' => date("Y-m-d"),
                    ];
                    return view('app/bd/importar', $data);
                }

                $prorroga = model("ProrrogaModel");
                $findResult = $prorroga->where('idcontrato', $idContrato)->first();

                if(!$findResult) {
                    $data = [
                        'idcontrato' => $idContrato,
                        'numerosuplemento' => strtoupper($datos[$key]["NO SUPLEMENTO"]),
                        'fechainicial' => $fechainicial,
                        'fechafinal' => $fechafinal,
                        'fechaprorroga' => $fechaprorroga,
                        'observaciones' => strtoupper($datos[$key]["OBSERVACIONES PRORROGA"]),
                    ];
                    $prorroga->insert($data);
                }
                /*--------------------------------------------------------*/
                $valor = strtoupper($datos[$key]["TIPO PASAPORTE"]);

                $tipoPasaporte = model("TipoPasaporteModel");
                $findResult = $tipoPasaporte->where('pasaporte', $valor)->first();

                if($findResult)
                    $idTipoPasaporte = $findResult['id'];
                else {
                    $data = [
                        'pasaporte' => $valor,
                    ];
                    $idTipoPasaporte = $tipoPasaporte->insert($data);
                }
                /*--------------------------------------------------------*/
                $ubicacionPasaporte = model("UbicacionPasaporteModel");

                $findResult = $ubicacionPasaporte->where('ubicacion', "")->first();
                if($findResult)
                    $idUbicacion = $findResult['id'];
                else {
                    $data = [
                        'ubicacion' => "",
                    ];
                    $idUbicacion = $ubicacionPasaporte->insert($data);
                }
                /*--------------------------------------------------------*/
                $pasaporte = model("PasaporteModel");

                try {

                    //$fechavencimiento = ;
                    $fechavencimiento = (new DateTime($datos[$key]["FECHA DE VENCIMIENTO"]))->format('Y-m-d');

                } catch (Exception $e) {
                    $data = [
                        'error' => $e->getMessage(),
                        'formato' => date("Y-m-d"),
                    ];
                    return view('app/bd/importar', $data);
                }

                $findResult = $pasaporte->where('idcolaborador', $idColaborador)
                                        ->where('idtipopasaporte', $idTipoPasaporte)->first();

                if($findResult)
                    $idPasaporte = $findResult['id'];
                else {
                    $data = [
                        'idcolaborador' => $idColaborador,
                        'idtipopasaporte' => $idTipoPasaporte,
                        'numeropasaporte' => strtoupper($datos[$key]["NUM PASAPORTE"]),
                        'numeroarchivo' => "",
                        'fechavencimiento' => $fechavencimiento,
                        'idubicacion' => $idUbicacion,
                    ];
                    $idPasaporte = $pasaporte->insert($data);
                }
                /*--------------------------------------------------------*/
            }
        }
        else {         //Caso que la base de datos es pasaportes

        }
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
            return view('app/bd/importar', $data);
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
            $data = ['error' => $this->validator->getErrors()];

            return view('app/bd/importar', $data);
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
                        'error' => $e->getMessage(),
                        'formato' => date("Y-m-d"),
                    ];
                    return view('app/bd/importar', $data);
                }

            }
            else {

                $reader = ($mime == "application/vnd.ms-excel") ? new XLS() : new XLSX();

                $spreadsheet = $reader->load($filepath);
                $alldata = $spreadsheet->getActiveSheet()->toArray();
                $columnas = array();

                foreach ($alldata as $key => $val) {
                    if ($key == 0) {
                        foreach ($val as $index => $cell) {
                            $columnas[$index] = $cell;
                        }
                        $cols = $index+1;
                    }
                    else if ($key > 0) {

                        $datos[$key - 1] = array();
                        for ($i = 0; $i < $cols; $i++) {
                            $datos[$key - 1][$columnas[$i]] = $val[$i];
                        }
                    }
                }
            }

            $this->insertData($bd,$datos);
            @unlink(realpath($filepath));

            $data = [
                'titulo' => 'Importar base de datos',
                'msg' => 'Base de datos importada con éxito. ¿Desea importar otra base de datos?',
                'accept_link' => 'app/import',
                'cancel_link' => '/',
            ];
            return view('mensajes/success-url', $data);
        }

        $data = ['error' => 'El archivo ha sido eliminado o movido del lugar.'];
        return view('app/bd/importar', $data);
    }
    //----------------------------------------------------------------------------------------------
    function vaciarBD() {
        $data = [
            'title' => 'Vaciar base de datos',
            'msg' => 'Se eliminará toda la información guardada en la Base de datos. Este proceso es irreversible. ¿Desea continuar de todos modos?',
            'accept_link' => 'app/cleanAll',
            'cancel_link' => '/',
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

        $builder = $db->table('categoriascientificas');
        $builder->emptyTable('categoriascientificas');

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
            'accept_link' => 'app/bd',
        ];
        return view('mensajes/success', $data);


        $db->close();

    }
    //----------------------------------------------------------------------
    function prueba() {
        $data = [
            'title' => 'Prueba',
            'msg' => 'Operación de prueba.',
            'accept_link' => '/',
        ];
        return view('mensajes/success', $data);
    }
}