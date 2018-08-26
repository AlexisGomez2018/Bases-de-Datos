<!doctype html>
<html lang="en">
  <head>
    <?php 
   session_start();
    if (!isset($_SESSION["usr"]) || !isset($_SESSION["psw"]))
        header("Location: php/form-login.php");

    include("class/class-conexion.php");
    $conexion = new Conexion();
     $sql =   sprintf( "SELECT B.CODIGO_USUARIO, B.NOMBRE_USUARIO, B.CONTRASENA, A.CORREO ".
                "FROM TBL_CORREOS A ".
                "INNER JOIN TBL_USUARIO B ". 
                "ON(B.CODIGO_CORREO = A.CODIGO_CORREO) ".
                "WHERE(A.CORREO = '%s' AND B.CONTRASENA = '%s')",
                $_SESSION['correo'],
                $_SESSION['psw']
              );
    //echo $sql;
    //exit;
    $resp = $conexion->prepararConsulta($sql);
    $resultado = $conexion->ejecutarConsulta($resp);
    $respuesta = array();
    if ($conexion->cantidadRegistros($resp)!=0){
           header("Location: php/form-login.php");
    }
?>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="img/logo.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link href="css/simple-sidebar.css" rel="stylesheet">

    <style>
    @import url('https://fonts.googleapis.com/css?family=Scada');
    </style>
    <title>Mi Unidad -- Google Drive!</title>
  </head>
  <body>
    
  <nav class="navbar navbar-light bg-light">

   
      <a style="" class="navbar-brand"><img src="img/logo.png" width="50" height="40">&nbsp;&nbsp;Drive</a>
    
    <form class="form-inline align-items-right">
      <input class="form-control mr-sm-2" size="80" type="search" placeholder="Buscar en la unidad" aria-label="Search" style="border-radius: 2px!important;"  readonly>
      <button class="btn btn-outline-default my-2 my-sm-0" type="submit">Buscar</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

      <div class="dropdown">
          <button class="btn dropdown-toggle" type="button" id="dropdownMenu5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-question-circle"></i>
          </button>&nbsp;&nbsp;
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu5">
            <div class="container-fluid">
              <a href="#mdl-menu-modal" class="dropdown-item" data-toggle="modal">Sobre Nosotros</a>
              <a href="#mdl-menu-modal" class="dropdown-item" data-toggle="modal">Que es Google Drive</a>
            </div>
          </div>
        </div>

      <div class="dropdown">
          <button class="btn dropdown-toggle" type="button" id="dropdownMenu4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-cog"></i>
          </button>&nbsp;&nbsp;
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu4">
            <div class="container-fluid">
              <a href="#mdl-menu-modal" class="dropdown-item" data-toggle="modal">Configuracion</a>
              <a href="#mdl-menu-modal" class="dropdown-item" data-toggle="modal">Copias de seguridad y sincronizacion</a>
            </div>
          </div>
        </div>&nbsp;&nbsp; &nbsp;&nbsp; 

       <div class="dropdown">
          <button class="btn dropdown-toggle" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-th"></i>
          </button>&nbsp;&nbsp;
          <div class="dropdown-menu dropdown-menu-right" style="padding-right: 25px; padding-top:25px " aria-labelledby="dropdownMenu3">
            <div class="container-fluid">
              
              </div><br>
              
            </div>
            
          </div>
        </div>


        <div class="dropdown">
          <button class="btn dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell"></i>
          </button>&nbsp;&nbsp;
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
            <div class="container-fluid">
              <div class="row">
                <div class="col-12">
                  <h1 >Aqui se mostraran las notificaciones</h1>
                </div>
                <div class="col-12">
                  <h2>Aun no notificaciones</h2>
                </div>
              </div>
              
            </div>
            
          </div>
        </div>
      
        <div class="">
          <button type="button" class="btn btn-danger dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php echo $_SESSION['usr']; ?>
          </button>&nbsp;&nbsp;
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-3">
                    <div>
                      <a href=""><img width="50" height="50" style="border-radius: 10px!important;" value="Cambiar" src="img/logo.png"></a>
                    </div>
                  </div>
                  <div class="col-9">
                    <b><p style="font-size: 15px; margin:-1.0% 0;"><?php echo $_SESSION['usr']; ?></p></b>
                    <p style="font-size: 15px; color: gray; "><?php echo $_SESSION['correo']; ?></p>
                    <a style="font-size: 12px" href="">Perfil de Google+</a>&nbsp;-&nbsp;
                    <a style="font-size: 12px" href="">Privacidad</a><br><br>
                    <button class="btn btn-primary" style="border-radius: 1px">Cuenta de Google</button><br>
                  </div>
                </div><hr>

                
                <div class="row">
                  <div class="col-3">
                     
                  </div>
                  <div class="col-3">
                     
                  </div>
                  <div class="col-3">
                     <a aling="right" href="php/logout.php" class="btn btn-danger">Salir</a>
                  </div><div class="col-3">

                  </div>
                </div>
            </div>
          </div>
        </div>
    </form>
    
  </nav>



  <div id="wrapper" class="toggled">
    <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        <center>
                          <button  type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#mdl-subir-archivo" style="border-radius: 100px; border-width: 2px; background-color: white; border-color: grey; color: black;" class="btn btn-default">
                          <i class="fas fa-plus"></i>&nbsp;&nbsp;Nuevo
                         </button>
                        </center>
                    </a>
                </li>
                <li>
                    <b><a href="#"><i class="fab fa-google-drive"></i>&nbsp;&nbsp;Mi Unidad</a></b>
                </li>
                <li><b>
                    <a href="#"><i class="fas fa-tv"></i>&nbsp;&nbsp;Ordenadores</a></b>
                </li>
                <li>
                    <b><a href="#"><i class="fas fa-user-friends"></i>&nbsp;&nbsp;Compartido Conmigo</a></b>
                </li>
                <li>
                    <b><a href="#"><i class="far fa-clock"></i>&nbsp;&nbsp;Reciente</a></b>
                </li>
                <li>
                    <b><a href="#mdl-crear-destacado" data-toggle="modal" onclick="cargarArchivos(<?php echo $_SESSION['codigo_usuario']; ?>)"><i class="fas fa-star"></i>&nbsp;&nbsp;Crear Destacado</a></b>
                </li>
                <li>
                    <b><button type="button" class="btn btn-defalut" id="btn-ver-archivos"></button></b><hr>
                </li>
                <li>
                    <b><a href="" onclick="verPapelera(<?php echo $_SESSION['codigo_usuario']; ?>)"><i class="fas fa-trash"></i>&nbsp;&nbsp;Ver Papelera</a></b>
                </li>
                <li>
                    <b><a href="#mdl-papelera" data-toggle="modal" onclick="cargarArchivos(<?php echo $_SESSION['codigo_usuario']; ?>)"><i class="fas fa-trash"></i>&nbsp;&nbsp;Anadir a Papelera</a></b><hr>
                </li>
                <li>
                    <b><a href="#"><i class="fas fa-cloud"></i>&nbsp;&nbsp;Copias de Seguridad</a></b><hr>
                </li>
                <li>
                    <b><a href="#mdl-planes" data-toggle="modal"> <i class="far fa-credit-card"></i></i>&nbsp;&nbsp;Suscribirse a Premium</a></b><hr>
                </li>
            </ul>
        </div>
  
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
    <div id="page-content-wrapper">
    <div class="row" id="div-carpetas">
      <div class="col">
        <div class="dropdown">
        <button id="btn-mi-unidad" style="background-color: white;" class="btn btn-defalut dropdown-toggle" type="button" id="drop-mi-unidad" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Mi Unidad
         </button><hr>
          <div class="dropdown-menu" aria-labelledby="drop-mi-unidad"><br>
            <a href="#mdl-menu-modal" class="dropdown-item" data-toggle="modal" ><i class="fas fa-folder"></i>&nbsp;Carpeta Nueva</a><hr>
            <a href="#mdl-subir-archivo" class="dropdown-item" data-toggle="modal"><i class="fas fa-file-upload"></i>&nbsp;Subir Archivo</a>
            <a href="#mdl-menu-modal" class="dropdown-item" data-toggle="modal"><i class="fas fa-folder-open"></i>&nbsp;Subir Carpeta</a><hr>
            <a href="#mdl-menu-modal" class="dropdown-item" data-toggle="modal"><i style="font-color: blue;" class="fas fa-file-word"></i>&nbsp;Documentos de Google</a>
            <button href="#mdl-menu-modal" class="dropdown-item" data-toggle="modal"><i style="font-color: red;" class="fas fa-image"></i>&nbsp;Imagenes de Google</a>
          </div>
        </div>
      </div>
      
      </div>
    </div>
  
        <div class="container-fluid">
          <div id="div-contenido"> 
            
          </div>
            

      
        </div>
    </div>
</div>

     
<!--Div de los modales-->
<div class="modal fade" id="mdl-menu-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Subir Carpeta</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" id="modal-contenido">
				<input type="text"  class="form-control inputs" id="txt-nombre-carpeta" placeholder="Escriba el nombre de la Carpeta">
				<br>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-defalut" data-dismiss="modal" aria-label="Close">Cerrar</button>
				<button onclick="crearCarpeta(<?php echo $_SESSION['codigo_usuario']; ?>)" class="btn btn-primary" type="button">Guardar</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="mdl-planes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Planes Premium</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modal-contenido">
        <label>Selecciona tu metodo de pago</label>
        <div id="div-tipos-pagos">
          
        </div><br>
        <label>Selecciona tu plan</label>
        <div id="div-planes">
          
        </div><br>
        <label>Selecciona el tipo de tarjeta</label>
        <div id="div-tipo-tarjetas">
          
        </div><br>
        <label>Selecciona la marca de tarjeta</label>
        <div id="div-tarjetas">
          
        </div><br>
        <label>Numero de Tarjeta</label>
        <input type="text" class="form-control inputs" id="txt-numero-tarjeta" placeholder="Ingresa el numero de tu tarjeta"><br>
        <label>CSV</label>
        <input type="text" class="form-control inputs" id="txt-csv" placeholder="Ingresa tu CSV">

        <br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-defalut" data-dismiss="modal" aria-label="Close">Cerrar</button>
        <button onclick="suscribirse(<?php echo $_SESSION['codigo_usuario']; ?>);" class="btn btn-primary" type="button">Suscribirse</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="mdl-crear-destacado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Crear Destacado</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modal-destacado">
        
        <br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-defalut" data-dismiss="modal" aria-label="Close">Cerrar</button>
        <button onclick="agregarDestacado();" class="btn btn-primary" type="button">Agregar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="mdl-papelera" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Descartar Archivo</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modal-papelera">
        
        <br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-defalut" data-dismiss="modal" aria-label="Close">Cerrar</button>
        <button onclick="agregarPapelera();" class="btn btn-primary" type="button">Agregar</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="mdl-subir-archivo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Sube tu Archivo</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form enctype="multipart/form-data" action="php/subir.php" method="post">
          <label>Seleccione el tipo de privacidad</label>
          <div id="div-slc-privacidad">
            <select class="form-control inputs" name="slc-privacidad" id="slc-privacidad">
              
            </select>
              
            </div><br>
            <div id="div-archivos">
              <select class="form-control inputs" name ="slc-archivos" id="slc-archivos">
                
              </select>
            </div><br>

           <input type="text"  class="form-control inputs" name="txt-nombre-archivo" placeholder="Escriba el nombre del archivo"><br>
            <input type="file" name="archivo-subir">
            
        <br>
      </div>
      <div class="modal-footer">
        <input class="btn btn-primary" type="submit" value="Guardar"></form>
        <button type="button" class="btn btn-defalut" data-dismiss="modal" aria-label="Close">Cerrar</button>
      </div>
    </div>
  </div>
</div>
    
    


<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
     <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="js/controlador.js"></script>
    
  </body>
</html>