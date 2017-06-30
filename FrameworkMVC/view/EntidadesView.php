<?php //include("view/modulos/modal.php"); ?>
<?php include("view/modulos/head.php"); ?>
<!DOCTYPE HTML>
<html lang="es">
     <head>
         <meta charset="utf-8"/>
        <title>Entidades - Control Entrega - 2017</title>
        
          <link rel="stylesheet" href="view/css/bootstrap.css">
          <script src="view/js/jquery.js"></script>
		  <script src="view/js/bootstrapValidator.min.js"></script>
		  <script src="view/js/ValidarEntidad.js"></script>
		  
		  
		  
		  
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
		  
		  <script >
		$(document).ready(function(){

		    // cada vez que se cambia el valor del combo
		    $("#id_paises").change(function() {
				
               // 
                var $provincias = $("#id_provincias");

               // lo vaciamos
               
				///obtengo el id seleccionado
				

               var id_paises = $(this).val();


               $provincias.empty();

               
               if(id_paises > 0)
               {
            	   
            	   var datos = {
            			   id_paises : $(this).val()
                   };

                  $provincias.append("<option value= " +"0" +" > --SIN ESPECIFICAR--</option>");
            	           
                   
                  
            	   $.post("<?php echo $helper->url("Entidades","devuelveProvincias"); ?>", datos, function(resultProv) {

            		 		$.each(resultProv, function(index, value) {
            		 		$provincias.append("<option value= " +value.id_provincias +" >" + value.nombre_provincias  + "</option>");	
                       		 });

            		 		 	 		   
            		  }, 'json');


               }
               else
               {
            	  
               }
               
		    });


		   
		   
		    
		}); 

	</script>
	
	
	<script >
		$(document).ready(function(){

		    // cada vez que se cambia el valor del combo
		    $("#id_provincias").change(function() {
				
               // 
                var $cantones = $("#id_cantones");

               // lo vaciamos
               
				///obtengo el id seleccionado
				

               var id_provincias = $(this).val();


               $cantones.empty();

               
               if(id_provincias > 0)
               {
            	   
            	   var datos = {
            			   id_provincias : $(this).val()
                   };

                  $cantones.append("<option value= " +"0" +" > --SIN ESPECIFICAR--</option>");
            	           
                   
                  
            	   $.post("<?php echo $helper->url("Entidades","devuelveCanton"); ?>", datos, function(resultCan) {

            		 		$.each(resultCan, function(index, value) {
            		 		$cantones.append("<option value= " +value.id_cantones +" >" + value.nombre_cantones  + "</option>");	
                       		 });

            		 		 	 		   
            		  }, 'json');


               }
               else
               {
            	  
               }
               
		    });


		   
		   
		    
		}); 

	</script>
	
	
	
	<script >
		$(document).ready(function(){

		    // cada vez que se cambia el valor del combo
		    $("#id_cantones").change(function() {
				
               // 
                var $parroquias = $("#id_parroquias");

               // lo vaciamos
               
				///obtengo el id seleccionado
				

               var id_cantones = $(this).val();


               $parroquias.empty();

               
               if(id_cantones > 0)
               {
            	   
            	   var datos = {
            			   id_cantones : $(this).val()
                   };

                  $parroquias.append("<option value= " +"0" +" > --SIN ESPECIFICAR--</option>");
            	           
                   
                  
            	   $.post("<?php echo $helper->url("Entidades","devuelveParroquia"); ?>", datos, function(resultParro) {

            		 		$.each(resultParro, function(index, value) {
            		 		$parroquias.append("<option value= " +value.id_parroquias +" >" + value.nombre_parroquias  + "</option>");	
                       		 });

            		 		 	 		   
            		  }, 'json');


               }
               else
               {
            	  
               }
               
		    });


		   
		   
		    
		}); 

	</script>
	
	
	
	
	
	
		  
	</head>
    <body class="cuerpo">
    
       
       <?php include("view/modulos/menu.php"); ?>
  
 	    <div class="container">
  		<div class="row" style="background-color: #FAFAFA;">
        <form id="form-entidades" action="<?php echo $helper->url("Entidades","InsertaEntidades"); ?>" method="post" enctype="multipart/form-data" class="col-lg-6">
            <br>
            
            <?php if ($resultEdit !="" ) { foreach($resultEdit as $resEdit) {?>
	       
	       <br>
	        <div class="col-lg-12">
	         <div class="panel panel-info">
	         <div class="panel-heading">
	         <h4><i class='glyphicon glyphicon-edit'></i> Registrar Entidades</h4>
	         </div>
	         <div class="panel-body">
  			
		      <div class="row">
		    <div class="col-xs-6 col-md-6">
		    <div class="form-group">
                                  <label for="ruc_entidades" class="control-label">Ruc</label>
                                  <input type="text" class="form-control" id="ruc_entidades" name="ruc_entidades" value="<?php echo $resEdit->ruc_entidades; ?>" onkeypress="return numeros(event)" placeholder="Ruc">
                                  <span class="help-block"></span>
            </div>
		    </div>
		    
		    <div class="col-xs-6 col-md-6">
		    <div class="form-group">
                                  <label for="nombre_entidades" class="control-label">Nombre</label>
                                  <input type="text" class="form-control" id="nombre_entidades" name="nombre_entidades" value="<?php echo $resEdit->nombre_entidades; ?>"  placeholder="Nombre">
                                  <span class="help-block"></span>
            </div>
            </div>
			</div>
	         
	         
	        <div class="row">
	        <div class="col-xs-6 col-md-6">
		    <div class="form-group">
                                  <label for="id_paises" class="control-label">País</label>
                                  <select name="id_paises" id="id_paises"  class="form-control" >
			  	       					 <option value="" selected="selected">--Seleccione--</option>
									<?php foreach($resultPais as $resPais) {?>
										<option value="<?php echo $resPais->id_paises; ?>" <?php if ($resPais->id_paises == $resEdit->id_paises )  echo  ' selected="selected" '  ;  ?> ><?php echo $resPais->nombre_paises; ?> </option>
			        				<?php } ?>
									</select> 
                                   <span class="help-block"></span>
            </div>
            </div>
            
            <div class="col-xs-6 col-md-6">
		    <div class="form-group">
                                  <label for="id_provincias" class="control-label">Provincias</label>
                                  <select name="id_provincias" id="id_provincias"  class="form-control" >
			  	       					 <option value="" selected="selected">--Seleccione--</option>
									<?php foreach($resultProv as $resProv) {?>
										<option value="<?php echo $resProv->id_provincias; ?>" <?php if ($resProv->id_provincias == $resEdit->id_provincias )  echo  ' selected="selected" '  ;  ?> ><?php echo $resProv->nombre_provincias; ?> </option>
			        				<?php } ?>
									</select> 
                                   <span class="help-block"></span>
            </div>
            </div>

	         </div>
	         
	         
	         <div class="row">
	        <div class="col-xs-6 col-md-6">
		    <div class="form-group">
                                  <label for="id_cantones" class="control-label">Cantones</label>
                                  <select name="id_cantones" id="id_cantones"  class="form-control" >
			  	       					 <option value="" selected="selected">--Seleccione--</option>
									<?php foreach($resultCant as $resCant) {?>
										<option value="<?php echo $resCant->id_cantones; ?>" <?php if ($resCant->id_cantones == $resEdit->id_cantones )  echo  ' selected="selected" '  ;  ?> ><?php echo $resCant->nombre_cantones; ?> </option>
			        				<?php } ?>
									</select> 
                                   <span class="help-block"></span>
            </div>
            </div>
            
            <div class="col-xs-6 col-md-6">
		    <div class="form-group">
                                  <label for="id_parroquias" class="control-label">Parroquias</label>
                                  <select name="id_parroquias" id="id_parroquias"  class="form-control" >
			  	       					 <option value="" selected="selected">--Seleccione--</option>
									<?php foreach($resultParro as $resParro) {?>
										<option value="<?php echo $resParro->id_parroquias; ?>" <?php if ($resParro->id_parroquias == $resEdit->id_parroquias )  echo  ' selected="selected" '  ;  ?> ><?php echo $resParro->nombre_parroquias; ?> </option>
			        				<?php } ?>
									</select> 
                                   <span class="help-block"></span>
            </div>
            </div>
            </div>
	         
 
	        
	        <div class="row">
	        <div class="col-xs-12 col-md-12">
		    <div class="form-group">
                                  <label for="direccion_entidades" class="control-label">Dirección</label>
                                  <textarea class="form-control" id="direccion_entidades" name="direccion_entidades"  placeholder="Dirección"><?php echo $resEdit->direccion_entidades; ?></textarea>
                                  <span class="help-block"></span>
            </div>
            </div>
            </div>
		    
		    <div class="row">
		    <div class="col-xs-12 col-md-12">
		    <div class="form-group">
                                  <label for="actividad_comercial_entidades" class="control-label">Actividad Comercial</label>
                                  <input type="text" class="form-control" id="actividad_comercial_entidades" name="actividad_comercial_entidades" value="<?php echo $resEdit->actividad_comercial_entidades; ?>"  placeholder="Actividad Comercial">
                                  <span class="help-block"></span>
            </div>
            </div>
            </div>
		    
		    <div class="row">
		    <div class="col-xs-6 col-md-6">
		    <div class="form-group">
                                  <label for="telefono_entidades" class="control-label">Teléfono</label>
                                  <input type="text" class="form-control" id="telefono_entidades" name="telefono_entidades" value="<?php echo $resEdit->telefono_entidades; ?>" onkeypress="return numeros(event)" placeholder="Teléfono">
                                  <span class="help-block"></span>
            </div>
		    </div>
		    <div class="col-xs-6 col-md-6">
		    <div class="form-group">
                                  <label for="logo_entidades" class="control-label">Logo</label>
                                  <input type="file" class="form-control" id="logo_entidades" name="logo_entidades">
                                  <span class="help-block"></span>
            </div>
		    </div>	
		    </div>
         	   
         	   
         	<div class="row">
		    <div class="col-xs-12 col-md-12 col-lg-12" style="text-align: center;">
		    <div class="form-group">
                                  <button type="submit" id="Guardar" name="Guardar" class="btn btn-success">Guardar</button>
           
            </div>
		    </div>
		    </div>	 	
		    
		    </div>
	        </div>
	        </div>
	       
	       
	       
	     	
	            	  
            
		     <?php } } else {?>
		    
		    <br>
		    
		    <div class="col-lg-12">
	         <div class="panel panel-info">
	         <div class="panel-heading">
	         <h4><i class='glyphicon glyphicon-edit'></i> Registrar Entidades</h4>
	         </div>
	         <div class="panel-body">
  			
		      
         	   <div class="row">
		    <div class="col-xs-6 col-md-6">
		    <div class="form-group">
                                  <label for="ruc_entidades" class="control-label">Ruc</label>
                                  <input type="text" class="form-control" id="ruc_entidades" name="ruc_entidades" value="" onkeypress="return numeros(event)" placeholder="Ruc">
                                  <span class="help-block"></span>
            </div>
		    </div>
		    
		    <div class="col-xs-6 col-md-6">
		    <div class="form-group">
                                  <label for="nombre_entidades" class="control-label">Nombre</label>
                                  <input type="text" class="form-control" id="nombre_entidades" name="nombre_entidades" value=""  placeholder="Nombre">
                                  <span class="help-block"></span>
            </div>
            </div>
			</div>
	         
	       	        
	        
	        <div class="row">
		   
		    <div class="col-xs-6 col-md-6">
		    <div class="form-group">
                                  <label for="id_paises" class="control-label">País</label>
                                  <select name="id_paises" id="id_paises"  class="form-control" >
			  	       					 <option value="" selected="selected">--Seleccione--</option>
									<?php foreach($resultPais as $resPais) {?>
										<option value="<?php echo $resPais->id_paises; ?>"  ><?php echo $resPais->nombre_paises; ?> </option>
			        				<?php } ?>
									</select> 
                                   <span class="help-block"></span>
            </div>
            </div>
            
             <div class="col-xs-6 col-md-6">
		    <div class="form-group">
                                  <label for="id_provincias" class="control-label">Provincias</label>
                                  <select name="id_provincias" id="id_provincias"  class="form-control" >
			  	       					 <option value="" selected="selected">--Seleccione--</option>
								  </select> 
                                   <span class="help-block"></span>
            </div>
            </div>
            </div>
            
            
               
	        <div class="row">
		   
		  <div class="col-xs-6 col-md-6">
		    <div class="form-group">
                                  <label for="id_cantones" class="control-label">Cantones</label>
                                  <select name="id_cantones" id="id_cantones"  class="form-control" >
			  	       				<option value="" selected="selected">--Seleccione--</option>	
								  </select> 
                                   <span class="help-block"></span>
            </div>
            </div>
            
            
             <div class="col-xs-6 col-md-6">
		    <div class="form-group">
                                  <label for="id_parroquias" class="control-label">Parroquias</label>
                                  <select name="id_parroquias" id="id_parroquias"  class="form-control" >
			  	       			    <option value="" selected="selected">--Seleccione--</option> 
									</select> 
                                   <span class="help-block"></span>
            </div>
            </div>
            
            
            
            </div>
            
		    <div class="row">
		    		    
		    <div class="col-xs-12 col-md-12">
		    <div class="form-group">
                                  <label for="direccion_entidades" class="control-label">Dirección</label>
                                  <textarea class="form-control" id="direccion_entidades" name="direccion_entidades" value=""  placeholder="Dirección"></textarea>
                                  <span class="help-block"></span>
            </div>
            </div>
			</div>
		   
		    <div class="row">
		    <div class="col-xs-12 col-md-12">
		    <div class="form-group">
                                  <label for="actividad_comercial_entidades" class="control-label">Actividad Comercial</label>
                                  <input type="text" class="form-control" id="actividad_comercial_entidades" name="actividad_comercial_entidades" value=""  placeholder="Actividad Comercial">
                                  <span class="help-block"></span>
            </div>
            </div>
			</div>
		   
		   <div class="row">
		   <div class="col-xs-6 col-md-6">
		    <div class="form-group">
                                  <label for="telefono_entidades" class="control-label">Teléfono</label>
                                  <input type="text" class="form-control" id="telefono_entidades" name="telefono_entidades" value="" onkeypress="return numeros(event)" placeholder="Teléfono">
                                  <span class="help-block"></span>
            </div>
		    </div>
		   
		    <div class="col-xs-6 col-md-6">
		    <div class="form-group">
                                  <label for="logo_entidades" class="control-label">Logo</label>
                                  <input type="file" class="form-control" id="logo_entidades" name="logo_entidades">
                                  <span class="help-block"></span>
            </div>
		    </div>
		    </div>
		    
		    	 	
		    <div class="row">
		    <div class="col-xs-12 col-md-12 col-lg-12" style="text-align: center;">
		    <div class="form-group">
                                  <button type="submit" id="Guardar" name="Guardar" class="btn btn-success">Guardar</button>
           
            </div>
		    </div>
		    </div>
		    </div>
	        </div>
	        </div>
		    
		    
		    
		    
		     <?php } ?>
		     
		    
            
            
            </form>
       
       
            
            <form action="<?php echo $helper->url("Entidades","index"); ?>" method="post" enctype="multipart/form-data"  class="col-lg-6">
     		<br>
     		
     			
     		 <div class="col-lg-12">
	         <br>
	         <div class="panel panel-info">
	         <div class="panel-heading">
	         <h4><i class='glyphicon glyphicon-edit'></i> Entidades Registradas</h4>
	         </div>
	         <div class="panel-body">
  			
		       <div class="row">
		    <div class="col-xs-4 col-md-4 col-lg-4">
		    <div class="form-group">
                                  
                                  <input type="text" class="form-control" id="contenido" name="contenido" value="">
                                  
            </div>
		    </div>
		    <div class="col-xs-4 col-md-4 col-lg-4">
		    <div class="form-group">
                                  
                                  <select name="criterio" id="criterio"  class="form-control">
                                    <?php foreach($resultMenu as $val=>$desc) {?>
                                         <option value="<?php echo $val ?>" ><?php echo $desc ?> </option>
                                    <?php } ?>
                                  </select>
            </div>
		    </div>
		    <div class="col-xs-4 col-md-4 col-lg-4">
		    <div class="form-group">
                                  
                                  <button type="submit" id="Buscar" name="Buscar" class="btn btn-info">Buscar</button>
            </div>
		    </div>
			</div>  
             
       
       <div class="datagrid"> 
       <section style="height:380px; overflow-y:scroll;">
       <table class="table table-hover ">
       
       <thead>
           <tr>
                    <th style="font-size:100%;"></th>
		    		<th style="font-size:100%;">Ruc</th>
		    		<th style="font-size:100%;">Nombre</th>
		    		<th style="font-size:100%;">Telefono</th>
		    		<th style="font-size:100%;">Direccion</th>
		    		<th style="font-size:100%;">Paises</th>
		    		<th style="font-size:100%;">Provincias</th>
		    		<th style="font-size:100%;">Cantones</th>
		    		<th style="font-size:100%;">Parroquias</th>
		    		<th style="font-size:100%;">Actividad Comercial</th>
		    		  <th style="font-size:100%;"></th>
		    		    <th style="font-size:100%;"></th>
		    		
	  		</tr>
	   </thead>
       <tfoot>
       		<tr>
					<td colspan="12">
						<div id="paging">
							<ul>
								<li>
									<a href="#">
						<span>Previous</span>
									</a>
								</li>
								<li>
									<a href="#" class="active">
						<span>1</span>
									</a>
								</li>
								<li>
									<a href="#">
						<span>2</span>
									</a>
								</li>
								<li>
									<a href="#">
						<span>3</span>
									</a>
								</li>
								<li>
									<a href="#">
						<span>4</span>
									</a>
								</li>
								<li>
									<a href="#">
						<span>5</span>
									</a>
								</li>
								<li>
									<a href="#">
						<span>Next</span>
									</a>
								</li>
								</ul>
						</div>
					
			</tr>
       				
       </tfoot>
       
                <?php if (!empty($resultSet)) {  foreach($resultSet as $res) {?>
	        	 
               
	   <tbody>
	   		<tr>
	   					 <td> <input type="image" name="image" src="view/DevuelveImagen.php?id_valor=<?php echo $res->id_entidades; ?>&id_nombre=id_entidades&tabla=entidades&campo=logo_entidades"  alt="<?php echo $res->id_entidades; ?>" width="50" height="55" >      </td>
		                 <td style="font-size:80%;" > <?php echo $res->ruc_entidades; ?>     </td> 
		                <td style="font-size:80%;"> <?php echo $res->nombre_entidades; ?>     </td>
		                <td style="font-size:80%;"> <?php echo $res->telefono_entidades; ?>     </td>  
		                <td style="font-size:80%;"> <?php echo $res->direccion_entidades; ?>     </td> 
		                 <td style="font-size:80%;"> <?php echo $res->nombre_paises; ?>     </td> 
		                 <td style="font-size:80%;"> <?php echo $res->nombre_provincias; ?>     </td> 		                 
		                 <td style="font-size:80%;"> <?php echo $res->nombre_cantones; ?>     </td>
		                 <td style="font-size:80%;"> <?php echo $res->nombre_parroquias; ?>     </td>
		                 <td style="font-size:80%;"> <?php echo $res->actividad_comercial_entidades; ?>     </td>
		                 
		                
		                <td>
			           		<div class="right">
			                    <a href="<?php echo $helper->url("Entidades","index"); ?>&id_entidades=<?php echo $res->id_entidades; ?>" class="btn btn-warning" style="font-size:65%;">Editar</a>
			                </div>
			            
			            </td>
			            <td>   
			               	<div class="right">
			                    <a href="<?php echo $helper->url("Entidades","borrarId"); ?>&id_entidades=<?php echo $res->id_entidades; ?>" class="btn btn-danger" style="font-size:65%;">Borrar</a>
			                </div>
			            </td>
	   		</tr>
	   
	   </tbody>	
	        		
		        <?php } }else{ ?>
            <tr>
            <td></td>
            <td></td>
	                   <td colspan="5" style="color:#ec971f;font-size:8;"> <?php echo '<span id="snResult">No existen resultados</span>' ?></td>
	        <td></td>
		               
		    </tr>
            <?php 
		}
            //echo "<script type='text/javascript'> alert('Hola')  ;</script>";
            
            ?>
            
       	</table>     
		</section>
        </div>
		     
		     		 
		    
		    </div>
	        </div>
	        </div>
     		

        </form>
        </div>
        </div>
  
             <br>
			 <br>
			 <br> 

       
             <footer class="col-lg-12">
			 <?php include("view/modulos/footer.php"); ?>
			 </footer>
        
    </body>  
    </html>          