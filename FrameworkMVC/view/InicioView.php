
<?php include("view/modulos/head_home.php"); ?>
   
<!DOCTYPE HTML>
<html lang="es">
      <head>
        <meta charset="utf-8"/>
        <title>Inicio - Cooperativa 2017</title>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
          <link rel="stylesheet" href="view/css/bootstrap.css">
          <link rel="stylesheet" type="text/css" href="css/jquery-ui-1.7.2.custom.css" />
          <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
          <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>  
          <script src="view/js/jquery.js"></script>
		  
	      <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
          
         
   		  

	
	  <script>
    var imagenes=new Array(

        'view/images/publicidad/1.jpg',
        'view/images/publicidad/2.jpg',
        'view/images/publicidad/3.jpg',
        'view/images/publicidad/4.jpg',
        'view/images/publicidad/5.jpg',
        'view/images/publicidad/6.jpg',
        'view/images/publicidad/7.jpg',
        'view/images/publicidad/8.jpg'

    );

    function rotarImagenes()
    {
        var index=Math.floor((Math.random()*imagenes.length));
        document.getElementById("imagen").src=imagenes[index];
    }

    onload=function()
    {
        rotarImagenes();
        setInterval(rotarImagenes,3000);
    }
    </script>
    
    
    </head>
    <body class="cuerpo">
    	 
      <div class="container" style="margin-top: 20px">
      <div class="row" style="background-color: #FAFAFA;">
      <form action="<?php echo $helper->url("Inicio","index"); ?>" method="post" class="col-lg-12">
            
      
		
		   <div class="col-lg-6">
          </div>
          
          
          <div class="col-lg-6">
            <h4>Informate</h4>
            <hr/>
           <img src="" id="imagen" width="540" height="420">
            </div>
            	
          </form>
           </br>
       </br>
       </br>
       </br>
       </div>
       </div>
       

   	 	<div>
   	 	 
    	 <footer class="col-lg-12" >
     	 	<?php include("view/modulos/footer.php"); ?>
    	 </footer>     
    	</div>
     </body>  
    </html>   