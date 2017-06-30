<?php
require_once 'config/global.php';

 
class InicioController extends ControladorBase{
    
    public function __construct() {
        parent::__construct();
    }
    
public function index(){
	
				//Creamos el objeto usuario
	    session_start();
	
		$afiliaciones = new UsuariosModel();

		$resultEdit = "";
		
		$this->view("Inicio",array(
				"resultSet"=>""
				
		));
		
	}
	
	
	
}
?>
