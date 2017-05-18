    <?php include("view/modulos/head.php");?> 
    <?php include("view/modulos/menu.php");?>  
    <?php include("view/modulos/modal.php");?>
    <?php include("view/FACTURACION_COMPRAS/modal/modal_grupos.php");?>
    <?php include("view/FACTURACION_COMPRAS/modal/modal_um.php");?>
    <?php include("view/FACTURACION_COMPRAS/modal/buscar_productos.php");?>
   
   
    
<!DOCTYPE HTML>
<html lang="es">
     <head>
         <meta charset="utf-8"/>
         <title>FC Productos - Contabilidad 2016</title>
          <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
          <link rel="stylesheet" href="view/css/bootstrap.css">
          <link rel="stylesheet" type="text/css" href="css/jquery-ui-1.7.2.custom.css" />
          <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
          <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>  
          <script src="view/js/jquery.js"></script>
		  <script src="view/js/bootstrapValidator.min.js"></script>
		  <script src="view/js/ValidarFc_Productos.js"></script>
	      <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
          <script type="text/javascript" src="view/FACTURACION_COMPRAS/js/VentanaCentrada.js"></script>
          <script type="text/javascript" src="view/FACTURACION_COMPRAS/js/procesos-fc_productos.js"></script>
	      
       
         
    <script >   
    function numeros(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = "0123456789";
    especiales = [8,37,39,46];
 
    tecla_especial = false
    for(var i in especiales){
    if(key == especiales[i]){
     tecla_especial = true;
     break;
        } 
    }
 
    if(letras.indexOf(tecla)==-1 && !tecla_especial)
        return false;
     }
    </script > 
 
	   
	        <script>
		    var loadFileimg = function(event) {
		        var reader = new FileReader();
		        reader.onload = function(){
		          var outputimg = document.getElementById('outputimg');
		          outputimg.src = reader.result;
		        };

		        reader.readAsDataURL(event.target.files[0]);
		      };
            </script>
            
           
            
	         
     </head>
      <body class="cuerpo">
                  
                   
      <?php   
      
       if($_SERVER['REQUEST_METHOD']=='POST' )
       {
        $sel_concepto_ccomprobantes=$_POST['concepto_ccomprobantes'];
        $sel_fecha_ccomprobantes=$_POST['fecha_ccomprobantes'];
       }
        ?>
     
                 
             
    	<div class="container">
        <div class="row" style="background-color: #FAFAFA;">
  		<form id="form-fc_productos" action="<?php echo $helper->url("FC_Productos","index"); ?>" method="post" enctype="multipart/form-data" class="col-lg-12">
            
            <br>	
            
             <div class="col-lg-12">
	         <div class="panel panel-info">
	         <div class="panel-heading">
	         <div class="row">
	         <div class="form-group" style="margin-left: 20px">
			      <label for="nuevo_comprobante" class="control-label"><h4><i class='glyphicon glyphicon-edit'></i> Nuevo Producto</h4></label>
			 </div>
		     </div>
		     
		    
	         </div>
	         </div>
	         </div>
	         
	         
  			 
  			 <div class="col-lg-12">
  			<div class="col-lg-6">
  			<div class="panel panel-info">
	         <div class="panel-body">
	         <div class="row">
	         
	          <div class="form-group" style="margin-top:15px">
             <div class="col-xs-4 col-md-4">
             
                                  <label for="codigo_productos" class="control-label">Codigo:</label>
                                  <input type="text" class="form-control" id="codigo_productos" name="codigo_productos" value=""   placeholder="Codigo" >
                                  <span class="help-block"></span>
             </div>
             </div>
             
              <div class="form-group">
             <div class="col-xs-8 col-md-8">
             
                                  <label for="nombre_productos" class="control-label">Nombre:</label>
                                  <input type="text" class="form-control" id="nombre_productos" name="nombre_productos" value=""  placeholder="Nombre Producto">
                                  <span class="help-block"></span>
             </div>
             </div>
             </div>
             
            <div class="row"> 
	        <div class="form-group" style="margin-top:15px">
            <div class="col-xs-5 col-md-5">
		                          <label for="id_entidades" class="control-label">Entidad:</label>
                                  <select name="id_entidades" id="id_entidades"  class="form-control" readonly>
                                  	<?php foreach($resultEnt as $res) {?>
										<option value="<?php echo $res->id_entidades; ?>"  ><?php echo $res->nombre_entidades; ?> </option>
							        <?php } ?>
								   </select> 
                                  <span class="help-block"></span>
            </div>
            </div>
            
           
           
	        <div class="form-group">
            <div class="col-xs-5 col-md-5">
		                          <label for="id_grupo_productos" class="control-label">Grupo:</label>
                                  <select name="id_grupo_productos" id="id_grupo_productos"  class="form-control" >
                                  <option value="" selected="selected">--Seleccione--</option>
									<?php foreach($result_FC_grupo_productos as $res) {?>
										<option value="<?php echo $res->id_grupo_productos; ?>"  ><?php echo $res->nombre_grupo_productos; ?> </option>
							        <?php } ?>
								   </select> 
                                  <span class="help-block"></span>
            </div>
            </div>
           
			
  			<div class="form-group" style="margin-top:37px">
            <div class="col-xs-2 col-md-2">
		                          
                                  <button type="button" class="btn btn-warning glyphicon glyphicon-plus" data-toggle="modal" data-target="#myModal"></button>
		
			</div>
            </div>
		     
		     
		     <div class="form-group">
             <div class="col-xs-12 col-md-12">
		                          <label for="descripcion_productos" class="control-label">Descripción:</label>
                                  <textarea type="text"  class="form-control" id="descripcion_productos" name="descripcion_productos" value=""  placeholder="Descripción Producto"></textarea>
                                  <span class="help-block"></span>
             </div>
		     </div>
		     
		    
            
		     <div class="form-group">
             <div class="col-xs-6 col-md-6">
		                          <label for="precio_uno_productos" class="control-label">1er Precio:</label>
                                  <input type="text" class="form-control" id="precio_uno_productos" name="precio_uno_productos" value=""  onkeypress="return numeros(event)" placeholder="0.00">
                                  <span class="help-block"></span>
             </div>
		     </div>
		     
		     <div class="form-group">
             <div class="col-xs-6 col-md-6">
		                          <label for="utilidad_uno_productos" class="control-label">1era Utilidad:</label>
                                  <input type="text" class="form-control" id="utilidad_uno_productos" name="utilidad_uno_productos" value=""  onkeypress="return numeros(event)" placeholder="0%">
                                  <span class="help-block"></span>
             </div>
		     </div>
		     
		      <div class="form-group">
             <div class="col-xs-6 col-md-6">
		                          <label for="precio_dos_productos" class="control-label">2do Precio:</label>
                                  <input type="text" class="form-control" id="precio_dos_productos" name="precio_dos_productos" value=""  onkeypress="return numeros(event)" placeholder="0.00">
                                  <span class="help-block"></span>
             </div>
		     </div>
		     
		     <div class="form-group">
             <div class="col-xs-6 col-md-6">
		                          <label for="utilidad_dos" class="control-label">2da Utilidad:</label>
                                  <input type="text" class="form-control" id="utilidad_dos" name="utilidad_dos" value=""  onkeypress="return numeros(event)" placeholder="0%">
                                  <span class="help-block"></span>
             </div>
		     </div>
		     
		     <div class="form-group">
             <div class="col-xs-6 col-md-6">
		                          <label for="precio_tres_productos" class="control-label">3cer Precio:</label>
                                  <input type="text" class="form-control" id="precio_tres_productos" name="precio_tres_productos" value="" onkeypress="return numeros(event)" placeholder="0.00">
                                  <span class="help-block"></span>
             </div>
		     </div>
		     
		     <div class="form-group">
             <div class="col-xs-6 col-md-6">
		                          <label for="utilidad_tres" class="control-label">3era Utilidad:</label>
                                  <input type="text" class="form-control" id="utilidad_tres" name="utilidad_tres" value=""  onkeypress="return numeros(event)" placeholder="0%">
                                  <span class="help-block"></span>
             </div>
		     </div>
		     </div>
		     
		     <div class="row"> 
		     <div class="form-group" style="margin-top:15px">
            <div class="col-xs-5 col-md-5">
		                          <label for="iva_productos" class="control-label">Iva:</label>
                                  <select name="iva_productos" id="iva_productos"  class="form-control" >
                                  <option value="" selected="selected">--Seleccione--</option>
								  <option value="TRUE">Si</option>
						          <option value="FALSE">No</option>
								   </select> 
                                  <span class="help-block"></span>
            </div>
            </div>
		     
		    <div class="form-group">
            <div class="col-xs-5 col-md-5">
		                          <label for="id_unidades_medida" class="control-label">U/M:</label>
                                  <select name="id_unidades_medida" id="id_unidades_medida"  class="form-control" >
                                  <option value="" selected="selected">--Seleccione--</option>
									<?php foreach($result_FC_unidades_medida as $res) {?>
										<option value="<?php echo $res->id_unidades_medida; ?>"  ><?php echo $res->nombre_unidades_medida; ?> </option>
							        <?php } ?>
								   </select> 
                                  <span class="help-block"></span>
            </div>
            </div>
            
		    <div class="form-group" style="margin-top:37px">
            <div class="col-xs-2 col-md-2">
		                          
                                  <button type="button" class="btn btn-warning glyphicon glyphicon-plus" data-toggle="modal" data-target="#UM"></button>
		
			</div>
            </div>
            
            <div class="form-group">
             <div class="col-xs-12 col-md-12">
		                          <label for="observaciones_productos" class="control-label">Observaciones:</label>
                                  <textarea type="text" class="form-control" id="observaciones_productos" name="observaciones_productos" value=""  placeholder="Observaciones Producto"></textarea>
                                  <span class="help-block"></span>
             </div>
		     </div>
		     </div>
  		     </div>                    
			 </div>
  		     	
		     </div>
			
			
			 <div class="col-lg-6">
			  <div class="col-md-12">
					<div class="pull-right">
						<button type="button" class="btn btn-default" data-toggle="modal" data-target="#Productos">
						 <span class="glyphicon glyphicon-search"></span> Buscar Productos
						</button>
					</div>	
			 </div>	
			 <div class="panel panel-info">
	         <div class="panel-body">
	          <div class="row">
	          <div class="col-xs-12 col-md-12" style="text-align: center";>
	           <h2 style="color:#ec971f;">OPCIONAL</h2>
	           </div>
	           </div>
	          <div class="col-lg-6">
	         <div class="row">
			  <div class="form-group" >
		    <div class="col-xs-12 col-md-12">
		                          <label for="archivo_foto_productos" class="control-label">Foto Producto:</label>
                                  <input type="file" class="form-control" id="archivo_foto_productos" accept="image/*" name="archivo_foto_productos" onchange="loadFileimg(event)" multiple/>
                                  <span class="help-block"></span>
            </div>
		    </div>
		    </div>
		    
		     <div class="row">
		     <div class="form-group">
             <div class="col-xs-12 col-md-12">
		                          <label for="descripcion_foto_productos" class="control-label">Descripción:</label>
                                  <textarea type="text" rows="8" class="form-control" id="descripcion_foto_productos" name="descripcion_foto_productos" value=""  placeholder="Descripcion Foto Producto"></textarea>
                                  <span class="help-block"></span>
             </div>
		     </div>
		     </div>
		     
		      <div class="row">
		     <div class="form-group">
		    <div class="col-xs-12 col-md-12">
		                          <label for="archivo_catalogos" class="control-label">Catálogo:</label>
                                  <input type="file" class="form-control" id="archivo_catalogos" accept=".pdf" name="archivo_catalogos" multiple/>
                                  <span class="help-block"></span>
            </div>
		    </div>
		    </div>
		    
		     <div class="row">
		     <div class="form-group">
             <div class="col-xs-12 col-md-12">
		                          <label for="descripcion_catalogos" class="control-label">Descripción:</label>
                                  <textarea type="text" rows="8" class="form-control" id="descripcion_catalogos" name="descripcion_catalogos" value=""  placeholder="Descripción Catálogo"></textarea>
                                  <span class="help-block"></span>
             </div>
		     </div>
			 </div> 
			 </div>
			  
			  <div class="col-lg-6">
			 	
		    
			  <div class="row" style="margin-top:37px">
		      <div class="form-group">
		      <div class="col-xs-6 col-md-12">
			  	<div><img id="outputimg" height="280px" width="220px"/></div>
	         </div>
	         </div>
			 </div>
			</div> 
	         
	         </div>
	         </div> 
	         </div> 
	         </div>
         	
  			 							
	       <div class="row">
		   <div class="col-xs-12 col-md-12 col-lg-12" style="text-align: center; margin-top:20px" > 
           <div class="form-group">
            					  <button type="submit" id="Guardar" name="Guardar" onclick="this.form.action='<?php echo $helper->url("FC_Productos","InsertaFC_Productos"); ?>'" class="btn btn-success" >Guardar</button>
           </div>
           </div>
           </div>
		  
		   </form>
            
         
        </div>
        </div>
        <div class="footer" style="margin-top:50px">
        <?php include("view/modulos/footer.php"); ?>
        </div>
     </body>  
    </html>  
    
            