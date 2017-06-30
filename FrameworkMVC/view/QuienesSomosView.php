<?php include("view/modulos/head_home.php"); ?>
<!DOCTYPE HTML>
<html lang="es">
   	 <head>
        <meta charset="utf-8"/>
        <title>Quienes Somos - Cooperativa 2017</title>
         <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://maps.googleapis.com/maps/api/js"></script>
    
  
  
      <script>
 
      function initialize() {
        var mapa = document.getElementById('mapa');
 
        var mapOptions = {
          center: new google.maps.LatLng(40.413740, -3.6921),
 
          zoom: 18,
          mapTypeId: google.maps.MapTypeId.ROADMAP
 
        }
        var mapa = new google.maps.Map(mapa, mapOptions)
 
      }
      google.maps.event.addDomListener(window, 'load', initialize);
 
    </script>
  
  
   
	
        <style>
            input{
                margin-top:5px;
                margin-bottom:5px;
            }
            .right{
                float:right;
            } 
        </style>
       
   	 </head>
   
   
   
     <body class="cuerpo" >
    
   	
   			<div class="container" style="margin-top: 20px">
            <div class="row" style="background-color: #FAFAFA;">
            
           	  <div class="col-xs-6 col-md-6" style="margin-top: 20px; " >
				  	<div style="text-align:justify; ">
				    	<div class="media">
				
						  <div class="media-body">
						    <div>
						    	<h4 class="media-heading">Quienes Somos </h4>
						    </div>
						    	<p>
								    Somos un equipo de trabajo comprometido en <strong> PROMOVER SU NEGOCIO AGROPECUARIO  </strong> 
								    como página de contacto y donde usted y su empresa pueden promover  e 
								    informar sus productos y servicios generando un beneficio entre la oferta 
								    y la demanda, a nuestros clientes. 
								    Queremos ser facilitadores de negocios, con Actitud positiva, 
								    Disfrutamos de lo que hacemos y permanecemos en una permanente 
								    <strong>  búsqueda de oportunidades para usted </strong>, trabajamos en equipo con 
								    actitud de servicio integrado y organizado, que comienza con la evaluación 
								    de sus necesidades de promoción empresarial y concluye en la satisfacción 
								    de sus requerimientos, nuestros profesionales exponen su información en las 
								    mejores condiciones de presentación e imagen corporativa, ingenieros de sistemas
								     y representantes de ventas permanentemente mantienen con amabilidad, oportunidad
								      y eficiencia, el servicio de <strong>promoción empresarial</strong> en nuestro portal.
								    
							    </p>
						  </div>
						</div>
				    	
					</div>   
					<hr> 
					 <div class="row">
		            	<div class="col-xs-6 col-md-6">
		            	  <div id="mapa" name="mapa" style=" width: 620px; height: 400px; border: #000000 solid 1px; margin-top: 10px;"></div>
		
		            	</div>
		            	<div class="col-xs-6 col-md-6">
		            		<hr>
		            	  	<p class="contacto">   <span class="glyphicon glyphicon-road" aria-hidden="true"></span>  Dir. El telegrafo y Shirys</p>
					  		<p class="contacto">   <span class="glyphicon glyphicon-globe" aria-hidden="true"></span> Quito – Ecuador</p>
					  		<p class="contacto">   <span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span> (+59)2 436 4566 - (+59)3 987 968 467</p>
					  		<p class="contacto">   <span class="glyphicon glyphicon-comment" aria-hidden="true"></span> Skype: masoft</p>
					  		<p class="contacto">  <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> info@masoft.net</p>
					        <hr>    	  	
		            	</div>
		            </div>	
				  	<hr>
				  </div>
				  
				  <?php include("view/modulos/contacto.php"); ?>
				  </div>
				  </div>
			
			
			
   	
   	
   		 
   	 	<div style="background-color: #7acb5a;">
   	 	 
    	 <footer class="col-lg-12" >
     	 	<?php include("view/modulos/footer.php"); ?>
    	 </footer>     
    	</div>
    </body>
</html>