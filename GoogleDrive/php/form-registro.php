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
      width:800px;
      /*indicamos que el margen izquierdo, es la mitad de la anchura*/
      margin-left:-400px;
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
    <div class="container-fluid centrar" id="div-paso-1" >
      <div class="row">
         <!-- Formulario -->
        <div class="col-8">
          <h2>Crea tu Cuenta de Google</h2>
          <a href="" style="color: grey;">Ir a Google Drive</a><br><br>
            <form>
             <div class="row">
                <div class="col">
                  <input type="text" id="txt-nombre" class="form-control inputs" placeholder="Nombre">
                </div>
                <div class="col">
                  <input type="text" id="txt-apellido" class="form-control inputs" placeholder="Apellido"><br>
                </div>
                
              </div>
              <div class="row">
                <div class="col-8">
                  <input type="text" id="txt-correo" class="form-control inputs" placeholder="Correo electronico">
                </div>
                <div class="col-4" id="div-correos">
                  
                </div>
              </div><br>
              <div class="row">
                <div class="col">
                  <input type="password" id="txt-psw" class="form-control inputs" placeholder="Contrasena">
                </div>
                <div class="col">
                  <input type="password" id="txt-psw-confirm" class="form-control inputs" placeholder="Confirmar Contrasena">
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <p style="font-size: 12px">Usa una contrasena con mas de 8 caracteres, con combinacion de letras numeros y simbolos</p>
                </div>
              </div><br>
              <div class="row">
                <div class="col ">
                  <a href="form-login.php" class="btn btn-default">Acceder a tu cuenta en su lugar</a>
                </div>
                <div class="col ">
                  
                </div>
                <div class="col ">
                  <button type="button" id="btn-continuar" class="btn btn-primary">Continuar</button>
                </div>
              </div>
            </form>
        </div>
        <!-- Imagen -->
        <div class="col-4">
          <center><img height="244" width="214" src="../img/logo-registro.png"></center><br>
          <center><p>Una cuenta. Todos los servicio google a tu disposicion</p></center>
        </div>
        
      </div>
    </div>

     <div class="container-fluid centrar" id="div-paso-3" hidden>
      <div class="row">
         <!-- Formulario -->
        <div class="col-8" >
          <h2>Bienvenido a Google</h2>
          <p>@UsuarioNuevo</p><br>
            <form>
             <div class="row">
                <div class="col">
                  <input type="text" class="form-control inputs" id="txt-correo-recuperacion" placeholder="Direccion de correo recuperacion (Opcional)">
                </div>     
              </div>
              <div class="row">
                  <div class="col">
                    <center><p>Lo usaremos para proteger tu cuenta</p></center>
                  </div>
              </div>
              <div class="row">
                <div class="col">
                  <input type="text" id="txt-dia-nacimiento" class="form-control inputs" placeholder="Dia">
                </div>
                <div class="col" id="slc-mes">
                  <select class="form-control inputs" id="slc-mes-nacimiento">
                      <option value="1">Enero</option>
                      <option value="2">Febrero</option>
                      <option value="3">Marzo</option>
                      <option value="4">Abril</option>
                      <option value="5">Mayo</option>
                      <option value="6">Junio</option>
                      <option value="7">Julio</option>
                      <option value="8">Agosto</option>
                      <option value="9">Septiembre</option>
                      <option value="10">Octubre</option>
                      <option value="11">Noviembre</option>
                      <option value="12">Diciembre</option>
                  </select>
                </div>
                <div class="col">
                  <input type="text" id="txt-anio-nacimiento" class="form-control inputs" placeholder="Anio">
                </div>
              </div>
              <div class="row">
                  <div class="col">
                    <center><p>Tu fecha de nacimiento</p></center>
                  </div>
              </div>
              <div class="row">
                <div class="col" id="div-generos">
                  
                </div>
              </div>
              <div class="row">
                  <div class="col">
                    <center><p>Selecciona tu genero</p></center>
                  </div>
              </div>
              <div class="row">
                <div class="col">
                  <p style="font-size: 12px">Usa una contrasena con mas de 8 caracteres, con combinacion de letras numeros y simbolos</p>
                </div>
              </div><br>
              <div class="row">
                <div class="col ">
                  <button style="background-color: white; color: #3B87EB; border-color: white; font-weight: bold;" type="button" class="btn btn-primary">Atras</button>
                </div>
                <div class="col ">
                   <button type="button" id="btn-crear-cuenta" class="btn btn-primary">Crear Cuenta</button>
                </div>
                <div class="col ">
                 <a href="form-login.php" class="btn btn-default">Inicia Sesion</a>
                </div>
              </div>
            </form>
        </div>
        <!-- Imagen -->
        <div class="col-4">
          <center><img height="244" width="214" src="../img/logo-registro.png"></center><br>
          <center><p>Una cuenta. Todos los servicio google a tu disposicion</p></center>
        </div>
        
      </div>
    </div>

     <div class="container-fluid centrar" id="div-paso-2" style=" position: absolute;
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
      border-color: grey;" hidden>
      <div class="row">
         <!-- Formulario -->
        <div class="col">
           <center>
            <h2>Verificar tu numero de telefono</h2>
            <p href="" style="color: grey;">Para garantizar tu seguridad, Google quiere asegurarse de que seas realmente tú, por lo que te enviará un mensaje de texto con un código de verificación de 6 dígitos. Se aplican tarifas estándar</p>
          </center><br>
            <form>
              <div class="row">
                <div class="col" id="div-paises">
                    
                </div>
              </div><br>

             <div class="row">
                <div class="col">
                  <input type="text" id="txt-numero-celular" class="form-control inputs" placeholder="Numero de telefono (6 digitos)">
                </div>
              </div><br>

              <div class="row">
                <div class="col ">
                  <button style="background-color: white; color: #3B87EB; border-color: white; font-weight: bold;" type="button" class="btn btn-primary">Atras</button>
                </div>
                <div class="col ">
                  
                </div>
                <div class="col ">
                  <button type="button" id="btn-continuar-2" class="btn btn-primary">Siguiente</button>
                </div>
              </div><br>
              
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