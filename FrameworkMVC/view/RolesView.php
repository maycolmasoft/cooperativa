 <?php include("view/modulos/head.php"); ?>

<!DOCTYPE HTML>
<html lang="es">
     <head>
       <meta charset="utf-8"/>
        <title>Roles - Control Entrega - 2017</title>
          <link rel="stylesheet" href="view/css/bootstrap.css">
          <script src="view/js/jquery.js"></script>
		  <script src="view/js/bootstrapValidator.min.js"></script>
		  <script src="view/js/ValidarRoles.js"></script>  
    
    </head>
     <body class="cuerpo">
   
    <?php include("view/modulos/menu.php"); ?>
     
  <div class="container">
  
  <div class="row" style="background-color: #FAFAFA">

<!-- empieza el form -->     
    
      <form id="form-roles" action="<?php echo $helper->url("Roles","InsertaRoles"); ?>" method="post" enctype="multipart/form-data" class="col-lg-6">
    <br>
    
               <?php if (!empty($resultEdit)) { foreach($resultEdit as $resEdit) {?>
               
               
               
               
               
             <div class="col-lg-12">
	         <div class="panel panel-info">
	         <div class="panel-heading">
	         <h4><i class='glyphicon glyphicon-edit'></i> Insertar Tipos de Roles</h4>
	         </div>
	         <div class="panel-body">
				
				<div class="row">
		    <div class="col-xs-6 col-md-6">
		    <div class="form-group">
                                  <label for="nombre_rol" class="control-label">Nombre</label>
                                  <input type="text" class="form-control" id="nombre_rol" name="nombre_rol" value="<?php echo $resEdit->nombre_rol; ?>"  placeholder="Nombre de Rol">
                                  <span class="help-block"></span>
            </div>
		    </div>
            </div>
		   	 
         	   	 	
		    <div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12" style="text-align: center;" > 
            <div class="form-group">
            					  <button type="submit" id="Guardar" name="Guardar" class="btn btn-success">Guardar</button>
            </div>
            </div>
            </div>
		    </div>
	        </div>
	        </div>
            
            
                        
		     <?php } } else {?>
		     
		     
		     
		     <div class="col-lg-12">
	         <div class="panel panel-info">
	         <div class="panel-heading">
	         <h4><i class='glyphicon glyphicon-edit'></i> Insertar Tipos de Roles</h4>
	         </div>
	         <div class="panel-body">
				
				
		   	<div class="row">
		    <div class="col-xs-6 col-md-6">
		    <div class="form-group">
                                  <label for="nombre_rol" class="control-label">Nombre</label>
                                  <input type="text" class="form-control" id="nombre_rol" name="nombre_rol" value=""  placeholder="Nombre de Rol">
                                  <span class="help-block"></span>
            </div>
		    </div>
            </div>
         	   	 	
		    <div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12" style="text-align: center;" > 
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
            
             <form action="<?php echo $helper->url("Roles","index"); ?>" method="post" enctype="multipart/form-data"  class="col-lg-6">
     		
     		
     		
     		
     		<div class="col-lg-12">
	         <br>
	         <div class="panel panel-info">
	         <div class="panel-heading">
	         <h4><i class='glyphicon glyphicon-edit'></i> Roles Registrados	</h4>
	         </div>
	         <div class="panel-body">
  			
		     <div class="datagrid"> 
       <section style="height:380px; overflow-y:scroll;">
       <table class="table table-hover ">
       
       <thead>
           <tr>
                    <th style="font-size:100%;">Id</th>
		    		<th style="font-size:100%;">Nombre</th>
		    		<th></th>
		    		<th></th>
		    		
	  		</tr>
	   </thead>
       <tfoot>
       		<tr>
					<td colspan="10">
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
	   		           <td style="font-size:80%;"> <?php echo $res->id_rol; ?></td>
		               <td style="font-size:80%;"> <?php echo $res->nombre_rol; ?>     </td> 
		               
		               <td>
			           		<div class="right">
			                    <a href="<?php echo $helper->url("Roles","index"); ?>&id_rol=<?php echo $res->id_rol; ?>" class="btn btn-warning" style="font-size:65%;">Editar</a>
			                </div>
			            
			           </td>
			           <td>   
			               	<div class="right">
			                    <a href="<?php echo $helper->url("Roles","borrarId"); ?>&id_rol=<?php echo $res->id_rol; ?>" class="btn btn-danger" style="font-size:65%;">Borrar</a>
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
    
     </body>  
    </html>       