<?php
class EntidadBase{
    private $table;
    private $db;
    private $conectar;
    
    
    public function __construct($table) {
        $this->table=(string) $table;
        
        require_once 'Conectar.php';
        $this->conectar=new Conectar();
        $this->db=$this->conectar->conexion();

        $this->fluent=$this->getConetar()->startFluent();
        $this->con=$this->getConetar()->conexion();
        
    }
    
    public function fluent(){
    	return $this->fluent;
    }
    
    public function con(){
    	return $this->con;
    }
    
    
    public function getConetar(){
        return $this->conectar;
    }
    
    public function db(){
        return $this->db;
    }
    
    
    
    public function getAll($id){
        
    	$query=pg_query($this->con, "SELECT * FROM $this->table ORDER BY $id ASC");
    	$resultSet = array();
    	
           while ($row = pg_fetch_object($query)) {
             $resultSet[]=$row;
           }
        return $resultSet;
    }
    
    public function getContador($contador){
    
    	$query=pg_query($this->con, "SELECT $contador FROM $this->table ");
    	$resultSet = array();
    	 
    	while ($row = pg_fetch_object($query)) {
    		$resultSet[]=$row;
    	}
    	return $resultSet;
    }
    
    public function getCantidad($columna,$tabla,$where){
    
    	//parametro $columna puede ser todo (*) o una columna especifica
    	$query=pg_query($this->con, "SELECT COUNT($columna) AS total FROM $tabla WHERE $where ");
    	$resultSet = array();
    
    	while ($row = pg_fetch_object($query)) {
    		$resultSet[]=$row;
    	}
    	return $resultSet;
    }    
    
    public function getById($id){
    	
    	$query=pg_query($this->con, "SELECT * FROM $this->table WHERE id=$id");
        $resultSet = array();
    	
           while ($row = pg_fetch_object($query)) {
             $resultSet[]=$row;
           }
        return $resultSet;
    }
    
    public function getBy($where){
    	
    	$query=pg_query($this->con, "SELECT * FROM $this->table WHERE   $where ");
        $resultSet = array();
    	
           while ($row = pg_fetch_object($query)) {
             $resultSet[]=$row;
           }
        return $resultSet;
    }
    
    public function deleteById($id){
    	
        $query=pg_query($this->con,"DELETE FROM $this->table WHERE $id"); 
        return $query;
    }
    
    public function deleteBy($column,$value){

    	try 
    	{
    		$query=pg_query($this->con,"DELETE FROM $this->table WHERE $column='$value' ");
    	}
    	catch (Exeption $Ex)
    	{
    		
    		
    	} 
    	
        return $query;
    }
    
     public function deleteByWhere($where){
    
    	try
    	{
    		$query=pg_query($this->con,"DELETE FROM $this->table WHERE $where ");
    	}
    	catch (Exeption $Ex)
    	{
    
    
    	}
    
    	return $query;
    }
    
    

    public function getCondiciones($columnas ,$tablas , $where, $id){
    	
    	$query=pg_query($this->con, "SELECT $columnas FROM $tablas WHERE $where ORDER BY $id  ASC");
    	$resultSet = array();
    	while ($row = pg_fetch_object($query)) {
    		$resultSet[]=$row;
    	}
    
    	return $resultSet;
    }
    
    public function getCondiciones_noind($columnas ,$tablas , $where){
    	 
    	$query=pg_query($this->con, "SELECT $columnas FROM $tablas WHERE $where ");
    	$resultSet = array();
    	while ($row = pg_fetch_object($query)) {
    		$resultSet[]=$row;
    	}
    
    	return $resultSet;
    }
    
    public function getCondiciones_GrupBy_OrderBy($columnas ,$tablas , $where , $grupo, $orden){
    
    	$query=pg_query($this->con, "SELECT $columnas FROM $tablas WHERE $where GROUP BY $grupo ORDER BY $orden  ASC");
    	$resultSet = array();
    	while ($row = pg_fetch_object($query)) {
    		$resultSet[]=$row;
    	}
    
    	return $resultSet;
    }
    
    
   
    
    public function getCondicionesDesc($columnas ,$tablas , $where, $id){
    	 
    	$query=pg_query($this->con, "SELECT $columnas FROM $tablas WHERE $where ORDER BY $id  DESC");
    	$resultSet = array();
    	while ($row = pg_fetch_object($query)) {
    		$resultSet[]=$row;
    	}
    
    	return $resultSet;
    }
  
    public function getCondicionesPag($columnas ,$tablas , $where, $id, $limit){
    	 
    	$query=pg_query($this->con, "SELECT $columnas FROM $tablas WHERE $where ORDER BY $id  ASC  $limit");
    	$resultSet = array();
    	while ($row = pg_fetch_object($query)) {
    		$resultSet[]=$row;
    	}
    
    	return $resultSet;
    }
    
    
    public function UpdateBy($colval ,$tabla , $where){
    	try 
    	{ 
    	     $query=pg_query($this->con, "UPDATE $tabla SET  $colval   WHERE $where ");
    	     
    	}
    	catch (Exeption  $Ex)
    	{
    		
    		
    	}
    }
    
    
    
    public function getByPDF($columnas, $tabla , $where){
    
    	if ($tabla == "")
    	{
    		$query=pg_query($this->con, "SELECT $columnas FROM $this->table WHERE   $where ");
    	}
    	else
    	{
    		$query=pg_query($this->con, "SELECT $columnas FROM $tabla WHERE   $where ");
    	}
    	
    	return $query;
    }
    
    public function getCondicionesPDF($columnas ,$tablas , $where, $id){
    	 
    	$query=pg_query($this->con, "SELECT $columnas FROM $tablas WHERE $where ORDER BY $id  ASC");
    
    	return $query;
    }
    
    
    
    /*
     * Aqui podemos montarnos un monton de métodos que nos ayuden
     * a hacer operaciones con la base de datos de la entidad
     */
    
    public function encriptar($cadena){
    	$key='rominajasonrosabal';  // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
    	$encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $cadena, MCRYPT_MODE_CBC, md5(md5($key))));
    	return $encrypted; //Devuelve el string encriptado
    
    }
    
    public function desencriptar($cadena){
    	$key='rominajasonrosabal';  // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
    	$decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($cadena), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
    	return $decrypted;  //Devuelve el string desencriptado
    }
    
    public function registrarSesion($id_usuario, $usuario_usuario, $id_rol, $nombre_usuario, $correo_usuario, $ip_usuario)
    {
    	session_start();
    	
    	$_SESSION["id_usuarios"]=$id_usuario;
    	$_SESSION["usuario_usuarios"]=$usuario_usuario;
    	$_SESSION["id_rol"]=$id_rol;
    	$_SESSION["nombre_usuarios"]=$nombre_usuario;
    	$_SESSION["correo_usuarios"]=$correo_usuario;
    	$_SESSION["ip_usuarios"]=$ip_usuario; 	

    	if (substr($ip_usuario, 0, 3) == "192" )
    	{
    		$_SESSION["tipo_usuario"]="usuario_local";
    	}
    	else   ///usuarios externo 
    	{
    		
    		$_SESSION["tipo_usuario"]="usuario_externo";
    	}
    		
    	
    }
    
    
    public function getPermisosVer($where){
    	 
    	$query=pg_query($this->con, "SELECT permisos_rol.ver_permisos_rol FROM public.controladores, public.permisos_rol WHERE  controladores.id_controladores = permisos_rol.id_controladores AND  ver_permisos_rol = 'TRUE'   AND   $where ");
    	$resultSet = array();
    	while ($row = pg_fetch_object($query)) {
    		$resultSet[]=$row;
    	}
    
    	return $resultSet;
    }

    
    public function getPermisosEditar($where){
    
    	$query=pg_query($this->con, "SELECT permisos_rol.editar_permisos_rol FROM public.controladores, public.permisos_rol WHERE  controladores.id_controladores = permisos_rol.id_controladores AND  editar_permisos_rol = 'TRUE'   AND   $where ");
    	$resultSet = array();
    	while ($row = pg_fetch_object($query)) {
    		$resultSet[]=$row;
    	}
    
    	return $resultSet;
    }
    

    public function getPermisosBorrar($where){
    
    	$query=pg_query($this->con, "SELECT permisos_rol.borrar_permisos_rol FROM public.controladores, public.permisos_rol WHERE  controladores.id_controladores = permisos_rol.id_controladores AND  borrar_permisos_rol = 'TRUE'   AND   $where ");
    	$resultSet = array();
    	while ($row = pg_fetch_object($query)) {
    		$resultSet[]=$row;
    	}
    
    	return $resultSet;
    }
    
    
    public  function  SendMail($para, $titulo, $listaCartones)
    {
    	// Varios destinatarios
    	$para  = 'x.villamar@digitalworld.ec' . ', '; // atención a la coma
    	$para .= 'manuel@masoft.net';
    	
    	
    	// título
    	$título = 'Cartones Registrados en el Sistema Coopseguros';
    	
    	// mensaje
    	$mensaje_cabeza = '
				<html>
				<head>
				  <title>Cartones Registrados en Coopseguros</title>
				</head>
				<body>
				  <p>Listado de Cartones Registrados!</p>
				  <table>
				    <tr>
				      <th>Número Carton</th>
				    </tr>';
    	
    	$mensaje_detalle = "";
    		for ($i=0;$i<count($listaCartones);$i++)
			
              {
	    		  $mensaje_detalle .=  '<tr> <td>'. $listaCartones[$i] .'   </td></tr>' ;
              }
				  
		$mensaje_pie =  '</table>
				</body>
				</html>
				';
    	$mensaje = $mensaje_cabeza . $mensaje_detalle . $mensaje_pie;
    	// Para enviar un corre=o HTML, debe establecerse la cabecera Content-type
    	$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
    	$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    	
    	// Cabeceras adicionales
    	$cabeceras .= 'To: Manuel <desarrollo@masoft.net>, Kelly <manuel@masoft.net>' . "\r\n";
    	$cabeceras .= 'From: aDocument <info@masoft.net>' . "\r\n";
    	
    	// Enviarlo
    	mail($para, $título, $mensaje, $cabeceras );
    	
    	
    	
    }
    
    function getRealIP() {
    	if (!empty($_SERVER['HTTP_CLIENT_IP']))
    		return $_SERVER['HTTP_CLIENT_IP'];
    	 
    	if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
    		return $_SERVER['HTTP_X_FORWARDED_FOR'];
    	 
    	return $_SERVER['REMOTE_ADDR'];
    }
    
    
    
    
    
    public function AuditoriaControladores($_accion_trazas, $_parametros_trazas, $_nombre_controlador)
    {
    
    
    	$traza=new TrazasModel();
    		
    	$funcion = "ins_trazas";
    
    	$_id_usuarios=$_SESSION['id_usuarios'];
    
    	
    	$parametros = "'$_id_usuarios', '$_accion_trazas', '$_parametros_trazas', '$_nombre_controlador'  ";
    
    	$traza->setFuncion($funcion);
    		
    	$traza->setParametros($parametros);
    		
    	$resultadoT=$traza->Insert();
    
    }
    
   
 
  

    public function InsertaErroresImportacion( $_origen_errores_importacion , $_error_errores_importacion, $_detalle_errores_importacion)
    {
    
    	//ins_errores_importacion(_origen_errores_importacion , _error_errores_importacion , _detalle_errores_importacion , _id_usuarios)
    
    	$errores_importacion = new ErroresImportacionModel();
    	
    
    	$funcion = "ins_errores_importacion";
    
    	$_id_usuarios=$_SESSION['id_usuarios'];
    
    	 
    	$parametros = " '$_origen_errores_importacion' , '$_error_errores_importacion' , '$_detalle_errores_importacion' ,  '$_id_usuarios'  ";
    
    	$errores_importacion->setFuncion($funcion);
    
    	$errores_importacion->setParametros($parametros);
    
    	$resultadoT=$errores_importacion->Insert();
    
    }
    
    
    function myFunctionErrorHandler($errno, $errstr, $errfile, $errline)
    {
    	/* Según el típo de error, lo procesamos */
    	switch ($errno) {
    		case E_WARNING:
    			echo "Hay un WARNING.<br />\n";
    			echo "El warning es: ". $errstr ."<br />\n";
    			echo "El fichero donde se ha producido el warning es: ". $errfile ."<br />\n";
    			echo "La línea donde se ha producido el warning es: ". $errline ."<br />\n";
    			/* No ejecutar el gestor de errores interno de PHP, hacemos que lo pueda procesar un try catch */
    			return true;
    			break;
    
    		case E_NOTICE:
    			echo "Hay un NOTICE:<br />\n";
    			/* No ejecutar el gestor de errores interno de PHP, hacemos que lo pueda procesar un try catch */
    			return true;
    			break;
    
    		default:
    			/* Ejecuta el gestor de errores interno de PHP */
    			return false;
    			break;
    	}
    }
    
    
   
    
    public function MenuDinamico($_id_rol)
    {
    	$resultPermisos=array();
    	$perimisos_rol = new PermisosRolesModel();
    	 
    	$columnas="controladores.nombre_controladores,
				  permisos_rol.id_rol,
				  permisos_rol.ver_permisos_rol";
    	 
    	$tablas="public.permisos_rol,
  				 public.controladores";
    	 
    	$where="controladores.id_controladores = permisos_rol.id_controladores
    	AND permisos_rol.ver_permisos_rol=TRUE AND permisos_rol.id_rol='$_id_rol'";
    	 
    	$id="controladores.id_controladores";
    	 
    	$resultPermisos = $perimisos_rol->getCondiciones($columnas, $tablas, $where, $id);
    	 
    	$_SESSION['controladores']=$resultPermisos;
    }
    
    
    public  function Mayoriza($_id_plan_cuentas, $_id_ccomprobantes, $_fecha_actual, $_debe_mayor, $_haber_mayor, $_saldo_ini)
    {
    	$mayor = new MayorModel();
    	$plan_cuentas = new PlanCuentasModel();
    	$_saldo_mayor = 0;
    	$_n_plan_cuentas = '';
    	$_saldo_fin_plan_cuentas = 0;
    	$_id_entidades = 0;
    	
    	///buscamos la naturaleza e la cuenta
    	$where =  "id_plan_cuentas= '$_id_plan_cuentas' ";
   		$resultCuenta =  $plan_cuentas->getBy($where);
   		foreach($resultCuenta as $res)
   		{
   			$_n_plan_cuentas =  $res->n_plan_cuentas;
   			$_saldo_fin_plan_cuentas =  $res->saldo_fin_plan_cuentas;
   		    $_id_entidades = 	$res->id_entidades; 
   		}
    	if ($_n_plan_cuentas == 'D')
    	{
    		//deudora
    		$_saldo_fin_plan_cuentas = $_saldo_fin_plan_cuentas + $_debe_mayor - $_haber_mayor ;
    	}
    	If ($_n_plan_cuentas == 'A')
    	{
    		//acreedora	
    		$_saldo_fin_plan_cuentas = $_saldo_fin_plan_cuentas - $_debe_mayor + $_haber_mayor ;
    	}

    	$_saldo_mayor = $_saldo_fin_plan_cuentas;
    	
     	///actualizo el saldo de la cuenta

    	
    	$colval=" saldo_fin_plan_cuentas = '$_saldo_fin_plan_cuentas' ";
    	$tabla="plan_cuentas";
    	$where=" id_plan_cuentas = '$_id_plan_cuentas'  ";
    	 
    	$resultado=$plan_cuentas->UpdateBy($colval, $tabla, $where);
    	
    	
    	
    	$funcion = "ins_mayor";
    
    	//$parametros = " '$_id_plan_cuentas', '$_id_ccomprobantes' , '$_fecha_mayor', '$_debe_mayor', '$_haber_mayor', '$_saldo_mayor' ";
    	$parametros = " '$_id_plan_cuentas', '$_id_ccomprobantes' , '$_fecha_actual', '$_debe_mayor', '$_haber_mayor', '$_saldo_mayor', '$_saldo_ini' ";
    	//$parametros = " '4', '27' , '2016-01-01', '100', '0', '100' ";
    	
    	
    	$plan_cuentas->setFuncion($funcion);
    
    	$plan_cuentas->setParametros($parametros);
    
    	$resultadoT=$plan_cuentas->Insert();
    	
    	
    	
    	///actualizo saldos de grupo
    	//$resulCuadra = $plan_cuentas->CuadraPlanCuentas($_id_entidades);
    	
    }

    
    
    public  function CuadraPlanCuentas($_id_entidades)
    {
    	$plan_cuentas = new PlanCuentasModel();
    	$_id_plan_cuentas = 0;
    	$_saldo_fin_plan_cuentas = 0;
    	$_nivel_plan_cuentas = 0;
    	$_codigo_plan_cuentas = '';
    	///buscamos el ultimo nivel
    	$where =  "id_entidades= '$_id_entidades' ORDER BY  nivel_plan_cuentas ";
    	$resultNivel =  $plan_cuentas->getBy($where);
    	foreach($resultNivel as $res)
    	{
    		$_nivel_plan_cuentas =  $res->nivel_plan_cuentas;
    	
    	}
    	if ($_nivel_plan_cuentas == 5)
    	{
    		///buscamos los niveles 4
    		$where4 =  "id_entidades= '$_id_entidades' AND nivel_plan_cuentas = '4' ORDER BY  codigo_plan_cuentas ";
    		$resultPlan4 =  $plan_cuentas->getBy($where4);
    		foreach($resultPlan4 as $res)
    		{
    			$_id_plan_cuentas = $res->id_plan_cuentas;
    			$_codigo_plan_cuentas =  $res->codigo_plan_cuentas;
    			
    			
    			///buscamos los 5 de este 4
    			$columna5 = ' SUM(saldo_fin_plan_cuentas) AS saldo_fin_plan_cuentas ';
    			$tabla5 = 'plan_cuentas';
    			$where5 =  "id_entidades= '$_id_entidades' AND nivel_plan_cuentas = '5' AND substring(codigo_plan_cuentas from 1 for 8) = '$_codigo_plan_cuentas' ";
    		
    			////sumamos
    			$resultPlan5 =  $plan_cuentas->getCondiciones_noind($columna5, $tabla5, $where5);
    			foreach($resultPlan5 as $res)
    			{
    				$_saldo_fin_plan_cuentas =  $res->saldo_fin_plan_cuentas;
    			}
    		
    			//actualizamos
    			try {
    				$plan_cuentas->UpdateBy(" saldo_fin_plan_cuentas = '$_saldo_fin_plan_cuentas' " , "plan_cuentas", "id_plan_cuentas = '$_id_plan_cuentas' " );
    				
    			} catch (Exception $e) {
    				
    				echo "Error en 4 ->". $e;
    			}	
    			
    			 
    		}
    		
    		
    		///suo de nivel recorro los 3
    		$where3 =  "id_entidades= '$_id_entidades' AND nivel_plan_cuentas = '3' ORDER BY  codigo_plan_cuentas ";
    		$resultPlan3 =  $plan_cuentas->getBy($where3);
    		foreach($resultPlan3 as $res)
    		{
    			$_id_plan_cuentas = $res->id_plan_cuentas;
    			$_codigo_plan_cuentas =  $res->codigo_plan_cuentas;
    			 
    			 
    			///buscamos los 4 de este 3
    			$columna4 = ' SUM(saldo_fin_plan_cuentas) AS saldo_fin_plan_cuentas ';
    			$tabla4 = 'plan_cuentas';
    			$where4 =  "id_entidades= '$_id_entidades' AND nivel_plan_cuentas = '4' AND substring(codigo_plan_cuentas from 1 for 6) = '$_codigo_plan_cuentas' ";
    		
    			////sumamos
    			$resultPlan4 =  $plan_cuentas->getCondiciones_noind($columna4, $tabla4, $where4);
    			$_saldo_fin_plan_cuentas = 0;
    			foreach($resultPlan4 as $res)
    			{
    				$_saldo_fin_plan_cuentas =  $res->saldo_fin_plan_cuentas;
    			}
    		
    			//actualizamos
    		
    		try {
    				$plan_cuentas->UpdateBy(" saldo_fin_plan_cuentas = '$_saldo_fin_plan_cuentas' " , "plan_cuentas", "id_plan_cuentas = '$_id_plan_cuentas' " );
    				
    			} catch (Exception $e) {
    				
    				echo "Error en 3 ->". $e;
    			}	
    		
    		}
    		

    		///suo de nivel recorro los 2
    		$where2 =  "id_entidades= '$_id_entidades' AND nivel_plan_cuentas = '2' ORDER BY  codigo_plan_cuentas ";
    		$resultPlan2 =  $plan_cuentas->getBy($where2);
    		foreach($resultPlan2 as $res)
    		{
    			$_id_plan_cuentas = $res->id_plan_cuentas;
    			$_codigo_plan_cuentas =  $res->codigo_plan_cuentas;
    		
    		
    			///buscamos los 3 de este 2
    			$columna3 = ' SUM(saldo_fin_plan_cuentas) AS saldo_fin_plan_cuentas ';
    			$tabla3 = 'plan_cuentas';
    			$where3 =  "id_entidades= '$_id_entidades' AND nivel_plan_cuentas = '3' AND substring(codigo_plan_cuentas from 1 for 4) = '$_codigo_plan_cuentas' ";
    		
    			////sumamos
    			$resultPlan3 =  $plan_cuentas->getCondiciones_noind($columna3, $tabla3, $where3);
    			$_saldo_fin_plan_cuentas = 0;
    			foreach($resultPlan3 as $res)
    			{
    				$_saldo_fin_plan_cuentas =  $res->saldo_fin_plan_cuentas;
    			}
    		
    			//actualizamos
    		
    			try {
    				$plan_cuentas->UpdateBy(" saldo_fin_plan_cuentas = '$_saldo_fin_plan_cuentas' " , "plan_cuentas", "id_plan_cuentas = '$_id_plan_cuentas' " );
    			
    			} catch (Exception $e) {
    			
    				echo "Error en 2 ->". $e;
    			}
    		
    		}
    		
    		///suo de nivel recorro los 1
    		$where1 =  "id_entidades= '$_id_entidades' AND nivel_plan_cuentas = '1' ORDER BY  codigo_plan_cuentas ";
    		$resultPlan1 =  $plan_cuentas->getBy($where1);
    		foreach($resultPlan1 as $res)
    		{
    			$_id_plan_cuentas = $res->id_plan_cuentas;
    			$_codigo_plan_cuentas =  $res->codigo_plan_cuentas;
    		
    		
    			///buscamos los 3 de este 2
    			$columna2 = ' SUM(saldo_fin_plan_cuentas) AS saldo_fin_plan_cuentas ';
    			$tabla2 = 'plan_cuentas';
    			$where2 =  "id_entidades= '$_id_entidades' AND nivel_plan_cuentas = '2' AND substring(codigo_plan_cuentas from 1 for 2) = '$_codigo_plan_cuentas' ";
    		
    			////sumamos
    			$resultPlan2 =  $plan_cuentas->getCondiciones_noind($columna2, $tabla2, $where2);
    			$_saldo_fin_plan_cuentas = 0;
    			foreach($resultPlan2 as $res)
    			{
    				$_saldo_fin_plan_cuentas =  $res->saldo_fin_plan_cuentas;
    			}
    		
    			//actualizamos
    		
    			try {
    				//$plan_cuentas->UpdateBy(" saldo_fin_plan_cuentas = '$_saldo_fin_plan_cuentas' " , "plan_cuentas", "id_plan_cuentas = '$_id_plan_cuentas' " );
    			
    			} catch (Exception $e) {
    			
    				echo "Error en 1 ->". $e;
    			}
    			}
    			
    	}
    	
    		
    }
    
   
    public  function CierrePlanCuentas($_id_entidades, $_year)
    {
    	$plan_cuentas = new PlanCuentasModel();
    	$_id_plan_cuentas = 0;
    	$_saldo_fin_plan_cuentas = 0;
    	$_nivel_plan_cuentas = 0;
    	$_codigo_plan_cuentas = '';
    	$_id_cuentas_cierre_mes = 0;
    	///buscamos el ultimo nivel
    	
    	$_saldo_final_ene  = 0;
    	$_saldo_final_feb = 0;
    	$_saldo_final_mar = 0;
    	$_saldo_final_abr = 0;
    	$_saldo_final_may = 0;
    	$_saldo_final_jun = 0;
    	$_saldo_final_jul = 0;
    	$_saldo_final_ago = 0;
    	$_saldo_final_sep = 0;
    	$_saldo_final_oct = 0;
    	$_saldo_final_nov = 0;
    	$_saldo_final_dic = 0;
    	
    	
    	$columnas = 'plan_cuentas.nivel_plan_cuentas';
    	$tablas = 'plan_cuentas, cuentas_cierre_mes'; 
    	$id = "plan_cuentas.nivel_plan_cuentas";
    	$where =  "plan_cuentas.id_plan_cuentas = cuentas_cierre_mes.id_plan_cuentas AND plan_cuentas.id_entidades= '$_id_entidades' AND cuentas_cierre_mes.year = '$_year' ";
    	
    	
    	$resultNivel =  $plan_cuentas->getCondiciones($columnas, $tablas, $where, $id);
    	foreach($resultNivel as $res)
    	{
    		$_nivel_plan_cuentas =  $res->nivel_plan_cuentas;
    		 
    	}
    	
    	
    	if ($_nivel_plan_cuentas == 5)
    	{
    		///buscamos los niveles 4
    		
    		$columnas4 = 'plan_cuentas.codigo_plan_cuentas, cuentas_cierre_mes.id_cuentas_cierre_mes, plan_cuentas.nivel_plan_cuentas';
    		$tablas4 = 'plan_cuentas, cuentas_cierre_mes';
    		$id4 = "plan_cuentas.codigo_plan_cuentas";
    		$where4 =  "plan_cuentas.id_plan_cuentas = cuentas_cierre_mes.id_plan_cuentas AND plan_cuentas.id_entidades= '$_id_entidades' AND plan_cuentas.nivel_plan_cuentas = '4' AND plan_cuentas.id_plan_cuentas = cuentas_cierre_mes.id_plan_cuentas  AND cuentas_cierre_mes.year = '$_year'";
    
    		$resultPlan4 = $plan_cuentas->getCondiciones($columnas4, $tablas4, $where4, $id4);
    		foreach($resultPlan4 as $res)
    		{
    			$_id_cuentas_cierre_mes = $res->id_cuentas_cierre_mes;
    			$_codigo_plan_cuentas =  $res->codigo_plan_cuentas;
    			 
    			 
    			///buscamos los 5 de este 4
    			
    			$columna5 = 'SUM(cuentas_cierre_mes.saldo_final_ene) AS saldo_final_ene, SUM(cuentas_cierre_mes.saldo_final_feb) AS saldo_final_feb, SUM(cuentas_cierre_mes.saldo_final_mar) AS saldo_final_mar , SUM(cuentas_cierre_mes.saldo_final_abr) AS saldo_final_abr, SUM(cuentas_cierre_mes.saldo_final_may) AS saldo_final_may, SUM(cuentas_cierre_mes.saldo_final_jun) AS saldo_final_jun, SUM(cuentas_cierre_mes.saldo_final_jul) AS saldo_final_jul, SUM(cuentas_cierre_mes.saldo_final_ago) AS saldo_final_ago, SUM(cuentas_cierre_mes.saldo_final_sep) AS saldo_final_sep, SUM(cuentas_cierre_mes.saldo_final_oct) AS saldo_final_oct, SUM(cuentas_cierre_mes.saldo_final_nov) AS saldo_final_nov, SUM(cuentas_cierre_mes.saldo_final_dic) AS saldo_final_dic    ';
    			$tabla5 = 'plan_cuentas, cuentas_cierre_mes';
    			$where5 =  "plan_cuentas.id_entidades= '$_id_entidades' AND plan_cuentas.nivel_plan_cuentas = '5' AND substring(plan_cuentas.codigo_plan_cuentas from 1 for 8) = '$_codigo_plan_cuentas' AND  plan_cuentas.id_plan_cuentas = cuentas_cierre_mes.id_plan_cuentas AND  cuentas_cierre_mes.year = '$_year'  ";
    			
    			////sumamos
    			$resultPlan5 =  $plan_cuentas->getCondiciones_noind($columna5, $tabla5, $where5);
    			foreach($resultPlan5 as $res)
    			{
    				$_saldo_final_ene  = $res->saldo_final_ene;
    				$_saldo_final_feb = $res->saldo_final_feb;
			    	$_saldo_final_mar = $res->saldo_final_mar;
			    	$_saldo_final_abr = $res->saldo_final_abr;
			    	$_saldo_final_may = $res->saldo_final_may;
			    	$_saldo_final_jun = $res->saldo_final_jun;
			    	$_saldo_final_jul = $res->saldo_final_jul;
			    	$_saldo_final_ago = $res->saldo_final_ago;
			    	$_saldo_final_sep = $res->saldo_final_sep;
			    	$_saldo_final_oct = $res->saldo_final_oct;
			    	$_saldo_final_nov = $res->saldo_final_nov;
			    	$_saldo_final_dic = $res->saldo_final_dic;
    			}
    
    			//actualizamos
    			try {
    				//" saldo_fin_plan_cuentas = '$_saldo_fin_plan_cuentas' " , "plan_cuentas", "id_plan_cuentas = '$_id_plan_cuentas' " 
    				$colval = "   saldo_final_ene = '$_saldo_final_ene', saldo_final_feb = '$_saldo_final_feb' , saldo_final_mar = '$_saldo_final_mar' , saldo_final_abr = '$_saldo_final_abr' , saldo_final_may = '$_saldo_final_may' , saldo_final_jun = '$_saldo_final_jun' , saldo_final_jul = '$_saldo_final_jul' , saldo_final_ago = '$_saldo_final_ago' , saldo_final_sep = '$_saldo_final_sep' , saldo_final_oct = '$_saldo_final_oct' , saldo_final_nov = '$_saldo_final_nov' , saldo_final_dic = '$_saldo_final_dic'               ";
    				$tabla  = "cuentas_cierre_mes";
    				$where  = " id_cuentas_cierre_mes = '$_id_cuentas_cierre_mes' AND year = '$_year' "; 
    				$plan_cuentas->UpdateBy($colval, $tabla, $where);
    
    			} catch (Exception $e) {
    
    				echo "Error en 4 ->". $e;
    			}
    		
    		}
    
    		///suo de nivel recorro los 3
    
    		$_saldo_final_ene  = 0;
    		$_saldo_final_feb = 0;
    		$_saldo_final_mar = 0;
    		$_saldo_final_abr = 0;
    		$_saldo_final_may = 0;
    		$_saldo_final_jun = 0;
    		$_saldo_final_jul = 0;
    		$_saldo_final_ago = 0;
    		$_saldo_final_sep = 0;
    		$_saldo_final_oct = 0;
    		$_saldo_final_nov = 0;
    		$_saldo_final_dic = 0;
    		
    		
    		$columnas3 = 'plan_cuentas.codigo_plan_cuentas, cuentas_cierre_mes.id_cuentas_cierre_mes, plan_cuentas.nivel_plan_cuentas';
    		$tablas3 = 'plan_cuentas, cuentas_cierre_mes';
    		$id3 = "plan_cuentas.codigo_plan_cuentas";
    		$where3 =  "plan_cuentas.id_plan_cuentas = cuentas_cierre_mes.id_plan_cuentas AND plan_cuentas.id_entidades= '$_id_entidades' AND plan_cuentas.nivel_plan_cuentas = '3'   AND cuentas_cierre_mes.year = '$_year'";
    
    		$resultPlan3 = $plan_cuentas->getCondiciones($columnas3, $tablas3, $where3, $id3);
    		
    		foreach($resultPlan3 as $res)
    		{
    			$_id_cuentas_cierre_mes = $res->id_cuentas_cierre_mes;
    			$_codigo_plan_cuentas =  $res->codigo_plan_cuentas;
    			 
    		
    		
    			///buscamos los 5 de este 4
    			 
    			$columnas4 = 'SUM(cuentas_cierre_mes.saldo_final_ene) AS saldo_final_ene, SUM(cuentas_cierre_mes.saldo_final_feb) AS saldo_final_feb, SUM(cuentas_cierre_mes.saldo_final_mar) AS saldo_final_mar , SUM(cuentas_cierre_mes.saldo_final_abr) AS saldo_final_abr, SUM(cuentas_cierre_mes.saldo_final_may) AS saldo_final_may, SUM(cuentas_cierre_mes.saldo_final_jun) AS saldo_final_jun, SUM(cuentas_cierre_mes.saldo_final_jul) AS saldo_final_jul, SUM(cuentas_cierre_mes.saldo_final_ago) AS saldo_final_ago, SUM(cuentas_cierre_mes.saldo_final_sep) AS saldo_final_sep, SUM(cuentas_cierre_mes.saldo_final_oct) AS saldo_final_oct, SUM(cuentas_cierre_mes.saldo_final_nov) AS saldo_final_nov, SUM(cuentas_cierre_mes.saldo_final_dic) AS saldo_final_dic    ';
    			$tablas4 = 'plan_cuentas, cuentas_cierre_mes';
    			$where4 =  "plan_cuentas.id_entidades= '$_id_entidades' AND plan_cuentas.nivel_plan_cuentas = '4' AND substring(plan_cuentas.codigo_plan_cuentas from 1 for 6) = '$_codigo_plan_cuentas' AND  plan_cuentas.id_plan_cuentas = cuentas_cierre_mes.id_plan_cuentas AND  cuentas_cierre_mes.year = '$_year'  ";
    			 
    			////sumamos
    			$resultPlan4 =  $plan_cuentas->getCondiciones_noind($columnas4, $tablas4, $where4);
    			foreach($resultPlan4 as $res)
    			{
    		
    				$_saldo_final_ene = (float)$res->saldo_final_ene;
    				$_saldo_final_feb = (float)$res->saldo_final_feb;
    				$_saldo_final_mar = (float)$res->saldo_final_mar;
    				$_saldo_final_abr = (float)$res->saldo_final_abr;
    				$_saldo_final_may = (float)$res->saldo_final_may;
    				$_saldo_final_jun = (float)$res->saldo_final_jun;
    				$_saldo_final_jul = (float)$res->saldo_final_jul;
    				$_saldo_final_ago = (float)$res->saldo_final_ago;
    				$_saldo_final_sep = (float)$res->saldo_final_sep;
    				$_saldo_final_oct = (float)$res->saldo_final_oct;
    				$_saldo_final_nov = (float)$res->saldo_final_nov;
    				$_saldo_final_dic = (float)$res->saldo_final_dic;
    		
    			}
    		
    			//actualizamos
    			try {
    				//" saldo_fin_plan_cuentas = '$_saldo_fin_plan_cuentas' " , "plan_cuentas", "id_plan_cuentas = '$_id_plan_cuentas' "
    				$colval = " saldo_final_ene = '$_saldo_final_ene', saldo_final_feb = '$_saldo_final_feb' , saldo_final_mar = '$_saldo_final_mar' , saldo_final_abr = '$_saldo_final_abr' , saldo_final_may = '$_saldo_final_may' , saldo_final_jun = '$_saldo_final_jun' , saldo_final_jul = '$_saldo_final_jul' , saldo_final_ago = '$_saldo_final_ago' , saldo_final_sep = '$_saldo_final_sep' , saldo_final_oct = '$_saldo_final_oct' , saldo_final_nov = '$_saldo_final_nov' , saldo_final_dic = '$_saldo_final_dic'               ";
    				$tabla  = "cuentas_cierre_mes";
    				$where  = " id_cuentas_cierre_mes = '$_id_cuentas_cierre_mes' AND year = '$_year' ";
    				$plan_cuentas->UpdateBy($colval, $tabla, $where);
    		
    			} catch (Exception $e) {
    		
    				echo "Error en 3 ->". $e;
    			}
    		
    			
    		}
    		
    		
    		///suo de nivel recorro los 2
    
    		$_saldo_final_ene  = 0;
    		$_saldo_final_feb = 0;
    		$_saldo_final_mar = 0;
    		$_saldo_final_abr = 0;
    		$_saldo_final_may = 0;
    		$_saldo_final_jun = 0;
    		$_saldo_final_jul = 0;
    		$_saldo_final_ago = 0;
    		$_saldo_final_sep = 0;
    		$_saldo_final_oct = 0;
    		$_saldo_final_nov = 0;
    		$_saldo_final_dic = 0;
    		 
    		
    		$columnas2 = 'plan_cuentas.codigo_plan_cuentas, cuentas_cierre_mes.id_cuentas_cierre_mes, plan_cuentas.nivel_plan_cuentas';
    		$tablas2 = 'plan_cuentas, cuentas_cierre_mes';
    		$id2 = "plan_cuentas.codigo_plan_cuentas";
    		$where2 =  "plan_cuentas.id_plan_cuentas = cuentas_cierre_mes.id_plan_cuentas AND plan_cuentas.id_entidades= '$_id_entidades' AND plan_cuentas.nivel_plan_cuentas = '2' AND plan_cuentas.id_plan_cuentas = cuentas_cierre_mes.id_plan_cuentas  AND cuentas_cierre_mes.year = '$_year'";
    
    		$resultPlan2 = $plan_cuentas->getCondiciones($columnas2, $tablas2, $where2, $id2);
    		
    		foreach($resultPlan2 as $res)
    		{
    			$_id_cuentas_cierre_mes = $res->id_cuentas_cierre_mes;
    			$_codigo_plan_cuentas =  $res->codigo_plan_cuentas;
    		
    		
    			///buscamos los 5 de este 4
    			 
    			$columnas3 = 'SUM(cuentas_cierre_mes.saldo_final_ene) AS saldo_final_ene, SUM(cuentas_cierre_mes.saldo_final_feb) AS saldo_final_feb, SUM(cuentas_cierre_mes.saldo_final_mar) AS saldo_final_mar , SUM(cuentas_cierre_mes.saldo_final_abr) AS saldo_final_abr, SUM(cuentas_cierre_mes.saldo_final_may) AS saldo_final_may, SUM(cuentas_cierre_mes.saldo_final_jun) AS saldo_final_jun, SUM(cuentas_cierre_mes.saldo_final_jul) AS saldo_final_jul, SUM(cuentas_cierre_mes.saldo_final_ago) AS saldo_final_ago, SUM(cuentas_cierre_mes.saldo_final_sep) AS saldo_final_sep, SUM(cuentas_cierre_mes.saldo_final_oct) AS saldo_final_oct, SUM(cuentas_cierre_mes.saldo_final_nov) AS saldo_final_nov, SUM(cuentas_cierre_mes.saldo_final_dic) AS saldo_final_dic    ';
    			$tablas3 = 'plan_cuentas, cuentas_cierre_mes';
    			$where3 =  "plan_cuentas.id_entidades= '$_id_entidades' AND plan_cuentas.nivel_plan_cuentas = '3' AND substring(plan_cuentas.codigo_plan_cuentas from 1 for 4) = '$_codigo_plan_cuentas' AND  plan_cuentas.id_plan_cuentas = cuentas_cierre_mes.id_plan_cuentas AND  cuentas_cierre_mes.year = '$_year'  ";
    			 
    			////sumamos
    			$resultPlan3 =  $plan_cuentas->getCondiciones_noind($columnas3, $tablas3, $where3);
    			foreach($resultPlan3 as $res)
    			{
    		
    				$_saldo_final_ene  = (float)$res->saldo_final_ene;
    				$_saldo_final_feb = (float)$res->saldo_final_feb;
    				$_saldo_final_mar = (float)$res->saldo_final_mar;
    				$_saldo_final_abr = (float)$res->saldo_final_abr;
    				$_saldo_final_may = (float)$res->saldo_final_may;
    				$_saldo_final_jun = (float)$res->saldo_final_jun;
    				$_saldo_final_jul = (float)$res->saldo_final_jul;
    				$_saldo_final_ago = (float)$res->saldo_final_ago;
    				$_saldo_final_sep = (float)$res->saldo_final_sep;
    				$_saldo_final_oct = (float)$res->saldo_final_oct;
    				$_saldo_final_nov = (float)$res->saldo_final_nov;
    				$_saldo_final_dic = (float)$res->saldo_final_dic;
    		
    			}
    		
    			//actualizamos
    			try {
    				//" saldo_fin_plan_cuentas = '$_saldo_fin_plan_cuentas' " , "plan_cuentas", "id_plan_cuentas = '$_id_plan_cuentas' "
    				$colval = "   saldo_final_ene = '$_saldo_final_ene', saldo_final_feb = '$_saldo_final_feb' , saldo_final_mar = '$_saldo_final_mar' , saldo_final_abr = '$_saldo_final_abr' , saldo_final_may = '$_saldo_final_may' , saldo_final_jun = '$_saldo_final_jun' , saldo_final_jul = '$_saldo_final_jul' , saldo_final_ago = '$_saldo_final_ago' , saldo_final_sep = '$_saldo_final_sep' , saldo_final_oct = '$_saldo_final_oct' , saldo_final_nov = '$_saldo_final_nov' , saldo_final_dic = '$_saldo_final_dic'               ";
    				$tabla  = "cuentas_cierre_mes";
    				$where  = " id_cuentas_cierre_mes = '$_id_cuentas_cierre_mes' AND year = '$_year' ";
    				$plan_cuentas->UpdateBy($colval, $tabla, $where);
    		
    			} catch (Exception $e) {
    		
    				echo "Error en 3 ->". $e;
    			}
    		
    		}
    		
    		///suo de nivel recorro los 1
    		
    		$_saldo_final_ene  = 0;
    		$_saldo_final_feb = 0;
    		$_saldo_final_mar = 0;
    		$_saldo_final_abr = 0;
    		$_saldo_final_may = 0;
    		$_saldo_final_jun = 0;
    		$_saldo_final_jul = 0;
    		$_saldo_final_ago = 0;
    		$_saldo_final_sep = 0;
    		$_saldo_final_oct = 0;
    		$_saldo_final_nov = 0;
    		$_saldo_final_dic = 0;
    		 
    		
    		$columnas1 = 'plan_cuentas.codigo_plan_cuentas, cuentas_cierre_mes.id_cuentas_cierre_mes, plan_cuentas.nivel_plan_cuentas';
    		$tablas1 = 'plan_cuentas, cuentas_cierre_mes';
    		$id1 = "plan_cuentas.codigo_plan_cuentas";
    		$where1 =  "plan_cuentas.id_plan_cuentas = cuentas_cierre_mes.id_plan_cuentas AND plan_cuentas.id_entidades= '$_id_entidades' AND plan_cuentas.nivel_plan_cuentas = '1' AND plan_cuentas.id_plan_cuentas = cuentas_cierre_mes.id_plan_cuentas  AND cuentas_cierre_mes.year = '$_year'";
    
    		$resultPlan1 = $plan_cuentas->getCondiciones($columnas1, $tablas1, $where1, $id1);
    		
    		foreach($resultPlan1 as $res)
    		{
    			$_id_cuentas_cierre_mes = $res->id_cuentas_cierre_mes;
    			$_codigo_plan_cuentas =  $res->codigo_plan_cuentas;
    		
    		
    		
    			///buscamos los 5 de este 4
    			 
    			$columnas2 = 'SUM(cuentas_cierre_mes.saldo_final_ene) AS saldo_final_ene, SUM(cuentas_cierre_mes.saldo_final_feb) AS saldo_final_feb, SUM(cuentas_cierre_mes.saldo_final_mar) AS saldo_final_mar , SUM(cuentas_cierre_mes.saldo_final_abr) AS saldo_final_abr, SUM(cuentas_cierre_mes.saldo_final_may) AS saldo_final_may, SUM(cuentas_cierre_mes.saldo_final_jun) AS saldo_final_jun, SUM(cuentas_cierre_mes.saldo_final_jul) AS saldo_final_jul, SUM(cuentas_cierre_mes.saldo_final_ago) AS saldo_final_ago, SUM(cuentas_cierre_mes.saldo_final_sep) AS saldo_final_sep, SUM(cuentas_cierre_mes.saldo_final_oct) AS saldo_final_oct, SUM(cuentas_cierre_mes.saldo_final_nov) AS saldo_final_nov, SUM(cuentas_cierre_mes.saldo_final_dic) AS saldo_final_dic    ';
    			$tablas2 = 'plan_cuentas, cuentas_cierre_mes';
    			$where2 =  "plan_cuentas.id_entidades= '$_id_entidades' AND plan_cuentas.nivel_plan_cuentas = '2' AND substring(plan_cuentas.codigo_plan_cuentas from 1 for 2) = '$_codigo_plan_cuentas' AND  plan_cuentas.id_plan_cuentas = cuentas_cierre_mes.id_plan_cuentas AND  cuentas_cierre_mes.year = '$_year'  ";
    			 
    			////sumamos
    			$resultPlan2 =  $plan_cuentas->getCondiciones_noind($columnas2, $tablas2, $where2);
    			foreach($resultPlan2 as $res)
    			{
    		
    				$_saldo_final_ene  = (float)$res->saldo_final_ene;
    				$_saldo_final_feb = (float)$res->saldo_final_feb;
    				$_saldo_final_mar = (float)$res->saldo_final_mar;
    				$_saldo_final_abr = (float)$res->saldo_final_abr;
    				$_saldo_final_may = (float)$res->saldo_final_may;
    				$_saldo_final_jun = (float)$res->saldo_final_jun;
    				$_saldo_final_jul = (float)$res->saldo_final_jul;
    				$_saldo_final_ago = (float)$res->saldo_final_ago;
    				$_saldo_final_sep = (float)$res->saldo_final_sep;
    				$_saldo_final_oct = (float)$res->saldo_final_oct;
    				$_saldo_final_nov = (float)$res->saldo_final_nov;
    				$_saldo_final_dic = (float)$res->saldo_final_dic;
    		
    			}
    		
    			//actualizamos
    			try {
    				//" saldo_fin_plan_cuentas = '$_saldo_fin_plan_cuentas' " , "plan_cuentas", "id_plan_cuentas = '$_id_plan_cuentas' "
    				$colval = "   saldo_final_ene = '$_saldo_final_ene', saldo_final_feb = '$_saldo_final_feb' , saldo_final_mar = '$_saldo_final_mar' , saldo_final_abr = '$_saldo_final_abr' , saldo_final_may = '$_saldo_final_may' , saldo_final_jun = '$_saldo_final_jun' , saldo_final_jul = '$_saldo_final_jul' , saldo_final_ago = '$_saldo_final_ago' , saldo_final_sep = '$_saldo_final_sep' , saldo_final_oct = '$_saldo_final_oct' , saldo_final_nov = '$_saldo_final_nov' , saldo_final_dic = '$_saldo_final_dic'               ";
    				$tabla  = "cuentas_cierre_mes";
    				$where  = " id_cuentas_cierre_mes = '$_id_cuentas_cierre_mes' AND year = '$_year' ";
    				$plan_cuentas->UpdateBy($colval, $tabla, $where);
    		
    			} catch (Exception $e) {
    		
    				echo "Error en 2 ->". $e;
    			}
    		
    		
    		}
    
    	
    	}
    
    
    	
    }
    	
    	 
    
    
}
?>
