<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="../img/logo.png"
    <link href="../css/custom.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link href="css/simple-sidebar.css" rel="stylesheet">
     <link rel="stylesheet" type="text/css" href="../css/styles.css">>
    <style>
    @import url('https://fonts.googleapis.com/css?family=Scada');
    </style>
    <style>
    .centrar
    {
      position: absolute;
      /*nos posicionamos en el centro del navegador*/
      top:50%;
      left:50%;
      /*determinamos una anchura*/
      width:400px;
      /*indicamos que el margen izquierdo, es la mitad de la anchura*/
      margin-left:-200px;
      /*determinamos una altura*/
      height:300px;
      /*indicamos que el margen superior, es la mitad de la altura*/
      margin-top:-150px;
      border:2px;
      padding:5px;
      border-color: grey;
    }

    .inputs{
      border-top: none; 
      border-right: none; 
      border-left: none;
    }
    .inputs:active{
      border-color: black;
      border-top: none; 
      border-right: none; 
      border-left: none;
    }
    </style>
    <title>Mi Unidad -- Google Drive!</title>
  </head>
  <body>
    <div class="container-fluid centrar">
      <div class="row">
         <!-- Formulario -->
        <div class="col-12">
           <center>
            <h2>Acceder</h2>
            <a href="" style="color: grey;">Ir a Google Drive</a>
          </center><br><br>
            <form>
             <div class="row">
                <div class="col">
                  <input type="text" id="txt-correo" class="form-control inputs" placeholder="Correo">
                </div>
              </div><br>
              <div class="row">
                <div class="col">
                  <input type="password" id="txt-pass" class="form-control inputs" placeholder="Contrasena">
                </div>
              </div><br>
              <div class="row">
                <div class="col ">
                  <a href="form-registro.php" class="btn btn-default">Crear Cuenta</a>
                </div>
                <div class="col ">
                  
                </div>
                <div class="col ">
                  <button type="button" id="btn-login" class="btn btn-primary">Siguiente</button>
                </div>
              </div><br>
              <div class="row">
                <div class="col">
                  <center><p>¿Esta no es tu computadora? Usa el modo de invitado para navegar de forma privada. Más información</p></center>
                </div>
              </div>
            </form>
        </div>
        
      </div>
    </div>



   <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
     <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="../js/controlador.js"></script>
    
  </body>
</html>