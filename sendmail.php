<?php
// Inicialización de Variables
$error = false;
$errormsj = "";
$mailmsj = "";
$informsj = "Su mensaje se ha enviado correctamente. En breve uno de nuestros ejecutivos se estará comunicando con usted. Muchas gracias por su preferencia.";

//Comprobamos que se haya presionado el boton enviar
if (isset($_POST['submit'])) {
    try {
		//Guardamos en variables los datos enviados
		$nombre = $_POST['nombre'];
		$email = $_POST['email'];
        $telefono = $_POST['telefono'];
		$mensaje = $_POST['mensaje'];
		
		// Validamos la información introducida
		// if($nombre == ''){
		// 	echo "Debe ingresar su nombre";
		// }
		// else if($email == ''){
		// 	echo "Debe ingresar su email";

		$para = "espinosadelrio@outlook.com";				//Email al que se enviará
		$asunto = "Contacto de sitio web";			//Puedes cambiar el asunto del mensaje desde aqui

		//Este sería el cuerpo del mensaje
        $mailmsj = "<strong>Contacto desde la página web.</strong><br/><br/><br/>";
		$mailmsj .= "
					<table border='0' cellspacing='3' cellpadding='2'>
						<tr>
							<td width='30%' align='left'><strong>Nombre:</strong></td>
							<td width='80%' align='left'>$nombre</td>
						</tr>
						<tr>
							<td align='left'><strong>E-mail:</strong></td>
							<td align='left'>$email</td>
						</tr>
                        <tr>
                            <td align='left'><strong>Telefóno:</strong></td>
                            <td align='left'>$telefono</td>
                        </tr>
						<tr>
							<td align='left'><strong>Comentario:</strong></td>
							<td align='left'>$mensaje</td>
						</tr>
					</table>";	
		
		//Cabeceras del correo
	    $headers = "From: $nombre <$email>\r\n";
	    // $headers .= "X-Mailer: PHP5\n";
	    // $headers .= 'MIME-Version: 1.0' . "\n";
	    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		
		//Comprobamos que los datos enviados a la función MAIL de PHP estén bien y si es correcto enviamos
		if(mail($para, $asunto, $mailmsj, $headers)){
			// echo "Su mensaje se ha enviado correctamente";
			// echo "<br />";
			// echo '<a href="../formulario_contacto.html">Volver</a>';
		}else{
			// echo "Hubo un error en el envío inténtelo más tarde";
			$error = true; 
			$errormsj = "Hubo un error en el envío. Por favor inténtelo más tarde. <br/><br/> O comuníquese a nuestros números telefónicos para poder atenderlo cuanto antes.";
		}
    } catch(Exception $e){ 
        // echo "Hubo un error en el envío inténtelo más tarde";
        $error = true; 
        $errormsj = "Hubo un error en el envío. Por favor inténtelo más tarde. <br/><br/> O comuníquese a nuestros números telefónicos para poder atenderlo cuanto antes.";
    }
}	
?>
<!doctype html>
<html lang="es">
  <head>
    <title>ERA. Contacto.</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Estilos CSS -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body style="padding-top: 10px">
    <!-- Contenedor principal de la página web -->
    <div id="divpaginaweb" class="container">
        <!-- Banner -->
        <div id="divbanner" class="row">
            <div class="col-md-12" >
                <center>
                    <a href="index.html">
                    	<img src="assets/img/banner.jpg" class="rounded mx-auto d-block img-fluid" alt="Espinosa del Rio Administraciones" width="100%" height="auto" />
                    </a>
                </center>
            </div>
        </div>
    </div>

    <div class="container">
    	<br/>
    	<?php if ($error) { ?> 
	    	<div class="alert alert-danger" role="alert">
				<?php echo $errormsj; ?>
			</div>
    	<?php }  else { ?>
	    	<div class="alert alert-info" role="alert">
				<?php echo $informsj; ?>
			</div>
    	<?php } ?>

		<center>
			<a href="index.html" class="btn btn-skin">
				Regresar
			</a>
		</center>
    </div>

    <!-- Footer -->
    <div class="separador"></div>
    <div id="divfooter" class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <center>
                    <h4>Mariana Murcio</h4>
                    <p>
                        <img class="d-inline-block align-top img-fluid" src="assets/img/whatsapp.png" width="24px" height="auto" alt="Espinosa del Rio Administraciones" />
                            +52 1 (55) 6324 - 2049
                    </p>
                </center>
            </div>
            <!-- <div class="col-md-8 d-none d-md-block"> -->
            <div class="col-md-8">
                <!--
                <p class="text-center">
                    <img class="d-inline-block align-buttom img-fluid" src="assets/img/ico_mail1.png" width="20px" height="auto" alt="Espinosa del Rio Administraciones" />   www.espinosadelrio.com
                </p> 
                -->
                <p class="text-center">
                    <img class="d-inline-block align-buttom img-fluid" src="assets/img/ico_dir.png" width="20px" height="auto" alt="Espinosa del Rio Administraciones" />   Blvd. Adolfo López Mateos No. 88 Local 7B. 
                    Col. Jardines de Atizapán CP. 52923. 
                    Atizapán, Edo. De México.
                </p>
                <p class="text-center">
                    <img class="d-inline-block align-buttom img-fluid" src="assets/img/ico_mail1.png" width="20px" height="auto" alt="Espinosa del Rio Administraciones" />   espinosadelrio@outlook.com
                </p>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>