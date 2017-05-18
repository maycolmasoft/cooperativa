<?php
ini_set('memory_limit','128M');
ini_set('display_errors',1);
ini_set('display_startup_erros',1);


class UsuariosController extends ControladorBase{
    
    public function __construct() {
        parent::__construct();
    }
    //maycol
public function index(){
	
		session_start();
		if (isset(  $_SESSION['usuario_usuarios']) )
		{
			
			    $usuarios=new UsuariosModel();
			    $_id_usuarios = $_SESSION['id_usuarios'];
			
			    $resultMenu=array(0=>'--Seleccione--',1=>'Nombre', 2=>'Usuario', 3=>'Correo', 4=>'Rol');
					
				$estado = new EstadoModel();
				$resultEst = $estado->getAll("nombre_estado");
				
				$rol= new RolesModel();
				$resultRol = $rol->getAll("nombre_rol");
				
				$entidades = new EntidadesModel();
				$columnas_enc = "entidades.id_entidades,
  							entidades.nombre_entidades";
				$tablas_enc ="public.usuarios,
						  public.entidades";
				$where_enc ="entidades.id_entidades = usuarios.id_entidades AND usuarios.id_usuarios='$_id_usuarios'";
				$id_enc="entidades.nombre_entidades";
				$resultEntidad=$entidades->getCondiciones($columnas_enc ,$tablas_enc ,$where_enc, $id_enc);
				
				
				
				
				
				$nombre_controladores = "Usuarios";
				$id_rol= $_SESSION['id_rol'];
				$resultPer = $usuarios->getPermisosEditar("controladores.nombre_controladores = '$nombre_controladores' AND permisos_rol.id_rol = '$id_rol' " );
				
				if (!empty($resultPer))
				{
				
				
					$resultEnt = $usuarios->getBy("id_usuarios='$_id_usuarios'");
					$_id_entidades=$resultEnt[0]->id_entidades;
				
				
					$columnas =  "usuarios.id_usuarios, 
								  entidades.id_entidades, 
								  entidades.nombre_entidades, 
								  usuarios.cedula_usuarios, 
								  usuarios.nombre_usuarios, 
								  usuarios.usuario_usuarios, 
								  usuarios.clave_usuarios, 
								  usuarios.telefono_usuarios, 
								  usuarios.celular_usuarios, 
								  usuarios.correo_usuarios, 
								  paises.id_paises, 
								  paises.nombre_paises, 
								  provincias.id_provincias, 
								  provincias.nombre_provincias, 
								  cantones.id_cantones, 
								  cantones.nombre_cantones, 
								  parroquias.id_parroquias, 
								  parroquias.nombre_parroquias, 
								  usuarios.direccion_usuarios, 
								  rol.id_rol, 
								  rol.nombre_rol, 
								  estado.id_estado, 
								  estado.nombre_estado, 
								  usuarios.imagen_usuarios";
					$tablas   = "public.usuarios, 
								  public.cantones, 
								  public.paises, 
								  public.provincias, 
								  public.parroquias, 
								  public.entidades, 
								  public.rol, 
								  public.estado";
					$where    = "usuarios.id_rol = rol.id_rol AND
								  usuarios.id_estado = estado.id_estado AND
								  cantones.id_cantones = usuarios.id_cantones AND
								  paises.id_paises = usuarios.id_paises AND
								  provincias.id_provincias = usuarios.id_provincias AND
								  parroquias.id_parroquias = usuarios.id_parroquias AND
								  entidades.id_entidades = usuarios.id_entidades AND usuarios.id_entidades=$_id_entidades";
					$id       = "usuarios.id_usuarios";
						
					
					$resultSet=$usuarios->getCondiciones($columnas ,$tablas ,$where, $id);
					
						
					if (isset ($_GET["id_usuarios"])   )
					{
						$_id_usuario = $_GET["id_usuarios"];
				
						$columnas1 = "usuarios.id_usuarios, 
								  entidades.id_entidades, 
								  entidades.nombre_entidades, 
								  usuarios.cedula_usuarios, 
								  usuarios.nombre_usuarios, 
								  usuarios.usuario_usuarios, 
								  usuarios.clave_usuarios, 
								  usuarios.telefono_usuarios, 
								  usuarios.celular_usuarios, 
								  usuarios.correo_usuarios, 
								  paises.id_paises, 
								  paises.nombre_paises, 
								  provincias.id_provincias, 
								  provincias.nombre_provincias, 
								  cantones.id_cantones, 
								  cantones.nombre_cantones, 
								  parroquias.id_parroquias, 
								  parroquias.nombre_parroquias, 
								  usuarios.direccion_usuarios, 
								  rol.id_rol, 
								  rol.nombre_rol, 
								  estado.id_estado, 
								  estado.nombre_estado, 
								  usuarios.imagen_usuarios";
				
						$tablas1   = " public.usuarios, 
								  public.cantones, 
								  public.paises, 
								  public.provincias, 
								  public.parroquias, 
								  public.entidades, 
								  public.rol, 
								  public.estado";
						$where1    = "usuarios.id_rol = rol.id_rol AND
								  usuarios.id_estado = estado.id_estado AND
								  cantones.id_cantones = usuarios.id_cantones AND
								  paises.id_paises = usuarios.id_paises AND
								  provincias.id_provincias = usuarios.id_provincias AND
								  parroquias.id_parroquias = usuarios.id_parroquias AND
								  entidades.id_entidades = usuarios.id_entidades AND usuarios.id_usuarios= '$_id_usuario' ";
						$id1       = "usuarios.id_usuarios";
						$resultEdit = $usuarios->getCondiciones($columnas1 ,$tablas1 ,$where1, $id1);
				
							
						$traza=new TrazasModel();
						$_nombre_controlador = "Usuarios";
						$_accion_trazas  = "Editar";
						$_parametros_trazas = $_id_usuario;
						$resultado = $traza->AuditoriaControladores($_accion_trazas, $_parametros_trazas, $_nombre_controlador);
							
							
					}
					
					if (isset ($_POST["criterio"])  && isset ($_POST["contenido"])  )
					{
					
							
						$columnas =  "usuarios.id_usuarios,
								  entidades.id_entidades,
								  entidades.nombre_entidades,
								  usuarios.cedula_usuarios,
								  usuarios.nombre_usuarios,
								  usuarios.usuario_usuarios,
								  usuarios.clave_usuarios,
								  usuarios.telefono_usuarios,
								  usuarios.celular_usuarios,
								  usuarios.correo_usuarios,
								  paises.id_paises,
								  paises.nombre_paises,
								  provincias.id_provincias,
								  provincias.nombre_provincias,
								  cantones.id_cantones,
								  cantones.nombre_cantones,
								  parroquias.id_parroquias,
								  parroquias.nombre_parroquias,
								  usuarios.direccion_usuarios,
								  rol.id_rol,
								  rol.nombre_rol,
								  estado.id_estado,
								  estado.nombre_estado,
								  usuarios.imagen_usuarios";
						$tablas   = "public.usuarios,
								  public.cantones,
								  public.paises,
								  public.provincias,
								  public.parroquias,
								  public.entidades,
								  public.rol,
								  public.estado";
						$where    = "usuarios.id_rol = rol.id_rol AND
						usuarios.id_estado = estado.id_estado AND
						cantones.id_cantones = usuarios.id_cantones AND
						paises.id_paises = usuarios.id_paises AND
						provincias.id_provincias = usuarios.id_provincias AND
						parroquias.id_parroquias = usuarios.id_parroquias AND
						entidades.id_entidades = usuarios.id_entidades AND usuarios.id_entidades=$_id_entidades";
						$id       = "usuarios.id_usuarios";
							
					
						$criterio = $_POST["criterio"];
						$contenido = $_POST["contenido"];
					
							
						if ($contenido !="")
						{
					
							$where_0 = "";
							$where_1 = "";
							$where_2 = "";
							$where_3 = "";
							$where_4 = "";
							
					
							switch ($criterio) {
								case 0:
									$where_0 = "OR  usuarios.nombre_usuarios LIKE '$contenido'   OR usuarios.usuario_usuarios LIKE '$contenido'  OR  usuarios.correo_usuarios LIKE '$contenido'  OR rol.nombre_rol LIKE '$contenido'";
									break;
								case 1:
									//Ruc Cliente/Proveedor
									$where_1 = " AND  usuarios.nombre_usuarios LIKE '$contenido'  ";
									break;
								case 2:
									//Nombre Cliente/Proveedor
									$where_2 = " AND usuarios.usuario_usuarios LIKE '$contenido'  ";
									break;
								case 3:
									//Número Carton
									$where_3 = " AND usuarios.correo_usuarios LIKE '$contenido' ";
									break;
								case 4:
									//Número Poliza
									$where_4 = " AND rol.nombre_rol LIKE '$contenido' ";
									break;
								
							}
					
					
					
							$where_to  = $where .  $where_0 . $where_1 . $where_2 . $where_3 . $where_4;
							$resultSet=$usuarios->getCondiciones($columnas ,$tablas, $where_to, $id);
					
						}
					}
							$this->view("Usuarios",array(
							"resultSet"=>$resultSet, "resultRol"=>$resultRol, "resultEdit" =>$resultEdit, "resultEst"=>$resultEst,"resultMenu"=>$resultMenu,
							"resultCiu"=>$resultCiu, "resultEntidad"=>$resultEntidad
								
					));
						
				}
				else
				{
					$this->view("Error",array(
							"resultado"=>"No tiene Permisos de Acceso a Usuarios"
		
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
	
	public function InsertaUsuarios(){
		
		
		$resultado = null;
		$usuarios=new UsuariosModel();
	
	
		
		//_nombre_categorias character varying, _path_categorias character varying
		if (isset ($_POST["usuario_usuarios"]) && isset ($_POST["nombre_usuarios"]) && isset ($_POST["clave_usuarios"]) && isset($_POST["id_rol"])  )
		{

			
		    $_id_entidades  = $_POST["id_entidades"];
		    $_cedula_usuarios  = $_POST["cedula_usuarios"];
		    $_nombre_usuarios  = $_POST["nombre_usuarios"];
		    $_usuario_usuarios  = $_POST["usuario_usuarios"];
		    $_clave_usuarios  = $usuarios->encriptar($_POST["clave_usuarios"]);
		    $_telefono_usuarios  = $_POST["telefono_usuarios"];
		    $_celular_usuarios  = $_POST["celular_usuarios"];
		    $_correo_usuarios  = $_POST["correo_usuarios"];
		    $_id_paises  = $_POST["id_paises"];
		    $_id_provincias  = $_POST["id_provincias"];
		    $_id_cantones  = $_POST["id_cantones"];
		    $_id_parroquias  = $_POST["id_parroquias"];
		    $_direccion_usuarios  = $_POST["direccion_usuarios"];
		    $_id_rol  = $_POST["id_rol"];
		    $_id_estado  = $_POST["id_estado"];
		    
		    
		    
		    if ($_FILES['imagen_usuarios']['tmp_name']!="")
		    {
		    
		    	//para la foto
		    	$directorio = $_SERVER['DOCUMENT_ROOT'].'/cooperativa/fotos_usuarios/';
		    	
		    	$nombre = $_FILES['imagen_usuarios']['name'];
		    	$tipo = $_FILES['imagen_usuarios']['type'];
		    	$tamano = $_FILES['imagen_usuarios']['size'];
		    	 
		    	// temporal al directorio definitivo
		    	move_uploaded_file($_FILES['imagen_usuarios']['tmp_name'],$directorio.$nombre);
		    	$data = file_get_contents($directorio.$nombre);
		    	$imagen_usuarios = pg_escape_bytea($data);
		    
		    
	
			$funcion = "ins_usuarios";
			$parametros = " '$_id_entidades' ,'$_cedula_usuarios' , '$_nombre_usuarios', '$_usuario_usuarios', '$_clave_usuarios' , '$_telefono_usuarios', '$_celular_usuarios' , '$_correo_usuarios', '$_id_paises', '$_id_provincias','$_id_cantones','$_id_parroquias','$_direccion_usuarios','$_id_rol','$_id_estado','$imagen_usuarios'";
			$usuarios->setFuncion($funcion);
	        $usuarios->setParametros($parametros);
	        $resultado=$usuarios->Insert();
		    
		    }
			
		    else
		    {
		    
		    	$colval = " nombre_usuarios = '$_nombre_usuario',  clave_usuarios = '$_clave_usuario', telefono_usuarios = '$_telefono_usuario', celular_usuarios = '$_celular_usuario', correo_usuarios = '$_correo_usuario', id_rol = '$_id_rol', id_estado = '$_id_estado', usuario_usuarios = '$_usuario_usuario', id_ciudad = '$_id_ciudad' , id_entidades = '$_id_entidad'  ";
		    	$tabla = "usuarios";
		    	$where = "cedula_usuarios = '$_cedula_usuarios'    ";
		        $resultado=$usuarios->UpdateBy($colval, $tabla, $where);
		    	 
		    }
			
	
		}
		$this->redirect("Usuarios", "index");
	    }
	
	public function borrarId()
	{
		
		if(isset($_GET["id_usuarios"]))
		{
			$id_usuario=(int)$_GET["id_usuarios"];
	        $usuarios=new UsuariosModel();
			$usuarios->deleteBy(" id_usuarios",$id_usuario);
				
			$traza=new TrazasModel();
			$_nombre_controlador = "Usuarios";
			$_accion_trazas  = "Borrar";
			$_parametros_trazas = $id_usuario;
			$resultado = $traza->AuditoriaControladores($_accion_trazas, $_parametros_trazas, $_nombre_controlador);
		}
	
		$this->redirect("Usuarios", "index");
	}
	
    
    
    public function Login(){
    
    	//Creamos el objeto usuario
    	$usuarios=new UsuariosModel();
    
    	//Conseguimos todos los usuarios
    	$allusers=$usuarios->getLogin();
    	 
    	//Cargamos la vista index y l e pasamos valores
    	$this->view("Login",array(
    			"allusers"=>$allusers
    	));
    }
    public function Bienvenida(){
    
    	//Creamos el objeto usuario
    	$usuarios=new UsuariosModel();
    	
    	//Conseguimos todos los usuarios
    	$allusers=$usuarios->getLogin();
    	
    	//Cargamos la vista index y l e pasamos valores
    	$this->view("Bienvenida",array(
    			"allusers"=>$allusers
    	));
    }
    
    
    
    
    public function Loguear()
    {
    	
    
    	if (isset ($_POST["usuarios"]) && ($_POST["clave"] ) )
    	
    	{
    		$usuarios=new UsuariosModel();
    		$_usuario = $_POST["usuarios"];
    		$_clave =   $usuarios->encriptar($_POST["clave"]);
    		 
    		
    		$where = "  usuario_usuarios = '$_usuario' AND  clave_usuarios ='$_clave' ";
    	
    		$result=$usuarios->getBy($where);

    		$usuario_usuarios = "";
    		$id_rol  = "";
    		$nombre_usuarios = "";
    		$correo_usuarios = "";
    		$ip_usuario = "";
    		
    		if ( !empty($result) )
    		{ 
    			foreach($result as $res) 
    			{
    				$id_usuario  = $res->id_usuarios;
    				$usuario_usuario  = $res->usuario_usuarios;
	    			$id_rol           = $res->id_rol;
	    			$nombre_usuario   = $res->nombre_usuarios;
	    			$correo_usuario   = $res->correo_usuarios;
	    			
    			}	
    			//obtengo ip
    			$ip_usuario = $usuarios->getRealIP();
    			
    			
    			///registro sesion
    			$usuarios->registrarSesion($id_usuario, $usuario_usuario, $id_rol, $nombre_usuario, $correo_usuario, $ip_usuario);
    			
    			//inserto en la tabla
    			$_id_usuario = $_SESSION['id_usuarios'];
    			$_ip_usuario = $_SESSION['ip_usuarios'];
    			
    			
    			$_id_rol=$_SESSION['id_rol'];
    			$usuarios->MenuDinamico($_id_rol);
    			
    			$sesiones = new SesionesModel();

    			$funcion = "ins_sesiones";
    			
    			$parametros = " '$_id_usuario' ,'$_ip_usuario' ";
    			$sesiones->setFuncion($funcion);
    			
    			$sesiones->setParametros($parametros);
    			
    			
    			$resultado=$sesiones->Insert();
    			
    		    $this->view("Bienvenida",array(
    				"allusers"=>$_usuario
	    		));
    		}
    		else
    		{
    			
	    		$this->view("Login",array(
	    				"allusers"=>"false"
	    		));
    		}
    		
    	} 
    	else
    	{
    		$this->view("Login",array(
    				"allusers"=>""
    		));
    		
    	}
    	
    }
    
	public function  cerrar_sesion ()
	{
		session_start();
		session_destroy();
		$this->redirect("Usuarios", "Loguear");
	}
	
	
	public function Actualiza ()
	{
		session_start();
		if (isset(  $_SESSION['usuario_usuarios']) )
		{
			//Creamos el objeto usuario
			$usuarios = new UsuariosModel();
			
		
						
					
				$resultEdit = "";
					
				$_id_usuario = $_SESSION['id_usuarios'];
				$where    = " usuarios.id_usuarios = '$_id_usuario' ";
				$resultEdit = $usuarios->getBy($where);
				
				
				

				if ( isset($_POST["Guardar"]) )
				{

					$_nombre_usuario    = $_POST["nombre_usuarios"];
					$_clave_usuario      =$usuarios->encriptar( $_POST["clave_usuarios"]);
					$_telefono_usuario  = $_POST["telefono_usuarios"];
					$_celular_usuario    = $_POST["celular_usuarios"];
					$_correo_usuario     = $_POST["correo_usuarios"];
					$_usuario_usuario     = $_POST["usuario_usuarios"];
					$_cedula_usuarios     = $_POST["cedula_usuarios"];
					
				
					
					
					
					if ($_FILES['imagen_usuarios']['tmp_name']!="")
					{
					
						//para la foto
					
						$directorio = $_SERVER['DOCUMENT_ROOT'].'/contabilidad/fotos_usuarios/';
					
						$nombre = $_FILES['imagen_usuarios']['name'];
						$tipo = $_FILES['imagen_usuarios']['type'];
						$tamano = $_FILES['imagen_usuarios']['size'];
					
						// temporal al directorio definitivo
					
						move_uploaded_file($_FILES['imagen_usuarios']['tmp_name'],$directorio.$nombre);
					
						$data = file_get_contents($directorio.$nombre);
					
						$imagen_usuarios = pg_escape_bytea($data);
					
					
					
				    $colval   = " nombre_usuarios = '$_nombre_usuario' , clave_usuarios = '$_clave_usuario'   , telefono_usuarios = '$_telefono_usuario' ,  celular_usuarios = '$_celular_usuario' , correo_usuarios = '$_correo_usuario' , usuario_usuarios = '$_usuario_usuario', cedula_usuarios = '$_cedula_usuarios', imagen_usuarios = '$imagen_usuarios'  ";
					$tabla    = "usuarios";
					$where    = " id_usuarios = '$_id_usuario' ";
					
					$resultado=$usuarios->UpdateBy($colval, $tabla, $where);
					}
						
					else
					{
					
					$colval   = " nombre_usuarios = '$_nombre_usuario' , clave_usuarios = '$_clave_usuario'   , telefono_usuarios = '$_telefono_usuario' ,  celular_usuarios = '$_celular_usuario' , correo_usuarios = '$_correo_usuario' , usuario_usuarios = '$_usuario_usuario', cedula_usuarios = '$_cedula_usuarios'";
					$tabla    = "usuarios";
					$where    = " id_usuarios = '$_id_usuario' ";
					
					$resultado=$usuarios->UpdateBy($colval, $tabla, $where);
				
					
					}
												
					$this->view("Login",array(
							"allusers"=>""
					));
					
					
				}
				else
				{
					$this->view("ActualizarUsuario",array(
							"resultEdit" =>$resultEdit
							
					));
					
				}
				
				
					
				
			
		
		}
		else
		{
			$this->view("ErrorSesion",array(
			"resultSet"=>""
			));
					
		}
		
	}
	
	public function MostrarMsg(){
		return $this->Mensaje;
	}
	
		
	
}
?>
