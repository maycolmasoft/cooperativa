<!DOCTYPE html>
<html lang="en">
<head>
  <title>Vademano</title>
  <link rel="shortcut icon" href="favicon.ico" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  

     
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
   		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>   
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		<link rel="stylesheet" href="view/css/estilos.css">
		<link rel="stylesheet" href="http://jqueryvalidation.org/files/demo/site-demos.css">
        <script src="http://jqueryvalidation.org/files/dist/jquery.validate.min.js"></script>
        <script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
	    <link rel="stylesheet" href="view/css/bootstrap.css">
		
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
		<script type="text/javascript" src="https://raw.github.com/HPNeo/gmaps/master/gmaps.js"></script>
			
	 <script>
		 $(document).ready(function() {
				

			$('#myCarousel').carousel({
				interval: 10000
			
			})
		    
		    $('#myCarousel').on('slid.bs.carousel', function() {
		    	alert("slid");
			});
		    
		    
		});
   </script>
	
	
	
	
</head>
<body>


<div class="container"  style=" -webkit-box-shadow: 0px 2px 2px 2px rgba(0,0,0,0.49);-moz-box-shadow: 0px 2px 2px 4px rgba(0,0,0,0.49); box-shadow: 0px 2px 2px 4px rgba(0,0,0,0.49);">
 	
 	<div class="row head">
 	<div class="pull-left" >
    	<img src="view/images/logo.png" class="img-responsive" alt="Responsive image" width="350" height="350">
 	</div>
 	
 	<div class="pull-right" style="margin-top:30px; padding-right: 10px">
   
   		<nav class="navbar navbar-default" style="height: 10px;" >
		  <div class="container-fluid"  >
		    <!-- Brand and toggle get grouped for better mobile display -->
			 <div class="navbar-header" >
		      <button type="button" class="navbar-toggle collapsed"  data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only"    >Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="nav navbar-brand" href="#"></a>
		    </div>
			
		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav" >
		        <li  ><a href="index.php?controller=Inicio&action=index"><span class="glyphicon glyphicon-home" ><?php echo " Inicio" ;?></span> <span class="sr-only">(current)</span></a></li>
		        <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-briefcase" ><?php echo " Nosotros" ;?></span> <span class="caret"></span></a>
		          <ul class="dropdown-menu">
		        	<li><a href="index.php?controller=Usuarios&action=QuienesSomos">Quienes Somos</a>
				    </li>
					<li><a href="index.php?controller=Usuarios&action=PreguntasFrecuentes">Preguntas Frecuentes</a>
				    </li>
				  </ul>
		        </li>
		        <li  ><a href="index.php?controller=Afiliaciones&action=index"><span class="glyphicon glyphicon-folder-open" ><?php echo " Afiliarse" ;?></span> <span class="sr-only">(current)</span></a></li>  
		       	
		       
			 		   	<li><a href="<?php echo $helper->url("Usuarios","Loguear"); ?>"><span class="glyphicon glyphicon-lock" ><?php echo " Iniciar Sesión" ;?></span> </a>
					  	</li>
				 
			 	
		      </ul>
		 
		 	
		 	     
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
   		
   
   
 	
  </div>        
</div>
</div>

</body>
</html>

