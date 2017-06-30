<?php
class EntidadesController extends ControladorBase{
	public function __construct() {
		parent::__construct();
	}
	public function index(){
		
		session_start();
		
		$resultEdit = "";
			//Creamos el objeto usuario
	     	$entidades=new EntidadesModel();
						//Conseguimos todos los usuarios
			$resultSet=$entidades->getAll("id_entidades");

			
		
			$paises = new PaisesModel();
			$resultPais = $paises->getAll("nombre_paises");
				
				
			$provincias = new ProvinciasModel();
			$resultProv = $provincias->getAll("nombre_provincias");
				
			$cantones =new CantonesModel();
			$resultCant = $cantones->getAll("nombre_cantones");
				
			$parroquias = new ParroquiasModel();
			$resultParro = $parroquias->getAll("nombre_parroquias");
			
			
			
			$entidades = new EntidadesModel();
			$columnas = "  entidades.id_entidades, 
						  entidades.ruc_entidades, 
						  entidades.nombre_entidades, 
						  entidades.telefono_entidades, 
						  entidades.direccion_entidades, 
						  entidades.logo_entidades, 
						  entidades.actividad_comercial_entidades, 
						  paises.id_paises, 
						  paises.nombre_paises, 
						  provincias.id_provincias, 
						  provincias.nombre_provincias, 
						  cantones.id_cantones, 
						  cantones.nombre_cantones, 
						  parroquias.id_parroquias, 
						  parroquias.nombre_parroquias";
			$tablas   = "  public.entidades, 
						  public.paises, 
						  public.cantones, 
						  public.provincias, 
						  public.parroquias";
				$where    = "  paises.id_paises = entidades.id_paises AND
						  cantones.id_cantones = entidades.id_cantones AND
						  provincias.id_provincias = entidades.id_provincias AND
						  parroquias.id_parroquias = entidades.id_parroquias";
			$id       = "id_entidades";
			$resultSet = $entidades->getCondiciones($columnas ,$tablas ,$where, $id);
			
				
		
		
	
		if (isset(  $_SESSION['usuario_usuarios']) )
		{
			//Notificaciones
			
			
			
			$nombre_controladores = "Entidades";
			$id_rol= $_SESSION['id_rol'];
			$resultPer = $entidades->getPermisosVer("   controladores.nombre_controladores = '$nombre_controladores' AND permisos_rol.id_rol = '$id_rol' " );
				
			$usuarios=new UsuariosModel();

			
			if (!empty($resultPer))
			{
				if (isset ($_GET["id_entidades"])   )
				{
					$nombre_controladores = "Entidades";
					$id_rol= $_SESSION['id_rol'];
					$resultPer = $entidades->getPermisosEditar("   controladores.nombre_controladores = '$nombre_controladores' AND permisos_rol.id_rol = '$id_rol' " );
						
					if (!empty($resultPer))
					{
					
						$_id_entidades = $_GET["id_entidades"];
						$columnas = " id_entidades, ruc_entidades, nombre_entidades, telefono_entidades, direccion_entidades, id_paises, id_provincias, id_cantones, id_parroquias, actividad_comercial_entidades";
						$tablas   = "entidades";
						$where    = "id_entidades = '$_id_entidades' "; 
						$id       = "ruc_entidades";
							
						$resultEdit = $entidades->getCondiciones($columnas ,$tablas ,$where, $id);
						
						
						
						$traza=new TrazasModel();
						$_nombre_controlador = "Entidades";
						$_accion_trazas  = "Editar";
						$_parametros_trazas = $_id_entidades;
						$resultado = $traza->AuditoriaControladores($_accion_trazas, $_parametros_trazas, $_nombre_controlador);
					}
					else
					{
						$this->view("Error",array(
								"resultado"=>"No tiene Permisos de Editar entidades"
					
						));
					
					
					}
					
				}
		
				
				$this->view("Entidades",array(
						"resultSet"=>$resultSet, "resultEdit"=>$resultEdit, "resultPais"=>$resultPais, "resultProv"=>$resultProv, "resultCant"=>$resultCant, "resultParro"=>$resultParro
			
				));
		
				
				
			}
			else
			{
				$this->view("Error",array(
						"resultado"=>"No tiene Permisos de Acceso a Entidades"
				
				));
				
				exit();	
			}
				
		}
		else 
		{
				$this->view("ErrorSesion",array(
						"resultSet"=>""
			
				));
		
		}
	
	}
	
	public function InsertaEntidades(){
			
		session_start();
		$entidades=new EntidadesModel();
		
		$nombre_controladores = "Entidades";
		$id_rol= $_SESSION['id_rol'];
		$resultPer = $entidades->getPermisosEditar("   controladores.nombre_controladores = '$nombre_controladores' AND permisos_rol.id_rol = '$id_rol' " );
						
		if (!empty($resultPer))
		{
		
		
		
			$resultado = null;
			$entidades=new EntidadesModel();
		
			//_nombre_categorias character varying, _path_categorias character varying
			if (isset ($_POST["ruc_entidades"])   )
				
			{
				
				$_ruc_entidades = $_POST["ruc_entidades"];
				$_nombre_entidades = $_POST["nombre_entidades"];
				$_telefono_entidades = $_POST["telefono_entidades"];
				$_direccion_entidades = $_POST["direccion_entidades"];
				$_paises = $_POST["id_paises"];
				$_provincias = $_POST["id_provincias"];
				$_cantones = $_POST["id_cantones"];
				$_parroquias = $_POST["id_parroquias"];
				$_actividad_comercial_entidades = $_POST["actividad_comercial_entidades"];
				//imagen
				$parametros ="";
				if(isset($_FILES["logo_entidades"]))
				{
					$directorio = $_SERVER['DOCUMENT_ROOT'].'/Entregas/logos_entidades/';
					
					$nombre = $_FILES['logo_entidades']['name'];
										
					move_uploaded_file($_FILES['logo_entidades']['tmp_name'],$directorio.$nombre);
					
					$_data_logo_entidades = file_get_contents($directorio.$nombre);
					
					$_logo_entidades = pg_escape_bytea($_data_logo_entidades);
					
					$parametros = "'$_ruc_entidades', '$_nombre_entidades', '$_telefono_entidades', '$_direccion_entidades', '{$_logo_entidades}', '$_paises', '$_provincias', '$_cantones', '$_parroquias', '$_actividad_comercial_entidades' ";
				}else{
					
					$parametros = "'$_ruc_entidades', '$_nombre_entidades', '$_telefono_entidades', '$_direccion_entidades', '{$_logo_entidades}', '$_paises', '$_provincias', '$_cantones', '$_parroquias', '$_actividad_comercial_entidades'";
				}
				
				$funcion = "ins_entidades";
									
				$entidades->setFuncion($funcion);
		
				$entidades->setParametros($parametros);
				
						
				$resultado=$entidades->Insert();
				
		
				//$this->view("Error",array(
				//"resultado"=>"entro"
				//));
				
				$traza=new TrazasModel();
				$_nombre_controlador = "Entidades";
				$_accion_trazas  = "Guardar";
				$_parametros_trazas = $_nombre_entidades;
				$resultado = $traza->AuditoriaControladores($_accion_trazas, $_parametros_trazas, $_nombre_controlador);
				
			}
			$this->redirect("Entidades", "index");
		}
		else
		{
			$this->view("Error",array(
					"resultado"=>"No tiene Permisos de Insertar Entidades"
		
			));
		
		
		}
		
	}
	
	public function borrarId()
	{
		session_start();
		$permisos_rol=new PermisosRolesModel();
		$nombre_controladores = "Roles";
		$id_rol= $_SESSION['id_rol'];
		$resultPer = $permisos_rol->getPermisosEditar("   controladores.nombre_controladores = '$nombre_controladores' AND permisos_rol.id_rol = '$id_rol' " );
			
		if (!empty($resultPer))
		{
			if(isset($_GET["id_entidades"]))
			{
				$id_entidades=(int)$_GET["id_entidades"];
		
				$entidades=new EntidadesModel();
				
				$entidades->deleteBy(" id_entidades",$id_entidades);
				
				
				$traza=new TrazasModel();
				$_nombre_controlador = "Entidades";
				$_accion_trazas  = "Borrar";
				$_parametros_trazas = $id_entidades;
				$resultado = $traza->AuditoriaControladores($_accion_trazas, $_parametros_trazas, $_nombre_controlador);
				
				
			}
			
			$this->redirect("Entidades", "index");
			
			
		}
		else
		{
			$this->view("Error",array(
				"resultado"=>"No tiene Permisos de Borrar Entidades"
			
			));
		}
				
	}
	
	
	public function devuelveProvincias()
	{
		session_start();
		$resultProv = array();
	
		if(isset($_POST["id_paises"]))
		{
	
			$id_pais=(int)$_POST["id_paises"];
	
			$provincias=new ProvinciasModel();
	
			$resultProv = $provincias->getBy("id_paises = '$id_pais'  ");
	
	
		}
	
		echo json_encode($resultProv);
	
	}
	
	public function devuelveCanton()
	{
		session_start();
		$resultCan = array();
	
	
		if(isset($_POST["id_provincias"]))
		{
	
			$id_provincia=(int)$_POST["id_provincias"];
	
			$canton=new CantonesModel();
	
			$resultCan = $canton->getBy("id_provincias = '$id_provincia'  ");
	
	
		}
	
			
		echo json_encode($resultCan);
	
	}
	
	
	public function devuelveParroquia()
	{
		session_start();
		$resultParro = array();
	
	
		if(isset($_POST["id_cantones"]))
		{
	
			$id_cantones=(int)$_POST["id_cantones"];
	
			$parroquias=new ParroquiasModel();
	
			$resultParro = $parroquias->getBy("id_cantones = '$id_cantones'  ");
	
	
		}
	
			
		echo json_encode($resultParro);
	
	}
	
	
	
	
	
}
?>