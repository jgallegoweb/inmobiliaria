<?php
require '../require/comun.php';
$sesion = new Sesion();
$sesion->siAutentificado("../index.php");
$bd = new BaseDatos();
$error=  Leer::get("error");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Inmobiliaria</title>
        <link rel="stylesheet" type="text/css" href="../css/reset.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="../css/estilos.css" media="screen" />
        <link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
        <script src="../js/ajax.js"></script>
    </head>
    <body>
        <header>
            <img src="../img/logo.png">
        </header>
        <section id="buscador">
            <h1>Registrate o Identifícate</h1>
        </section>
        <?php
        if($error!=0){
        ?>
        <section id="error">
            <?php
                if($error==1){
            ?>
                No existe el usuario
            <?php
                }
            ?>
            <?php
                if($error==2){
            ?>
                Contraseña incorrecta
            <?php
                }
            ?>
        </section>
        <?php 
        }
        ?>
        <section>
            <div class="centrador">
                <div class="iden">
                    <form action="phpLogin.php" method="POST">
                        <label>Usuario / Correo<br/><input type="text" name="login" value="" /></label>
                        <label>Contraseña<br/><input type="password" name="clave" value="" /></label>
                        <input type="submit" value="Iniciar sesión" />
                    </form>
                    
                </div>
                <div class="iden">
                    <form action="phpEditarUser.php" method="POST" enctype="multipart/form-data">
                        <label>Usuario<br/><input type="text" name="login" id="login" value="" /><span></span></label>
                        <label>Contraseña<br/><input type="password" name="clave" value="" /></label>
                        <label>Confirma contraseña<br/><input type="password" name="clave" value="" /></label>
                        <label>Nombre<br/><input type="text" name="nombre" value="" /></label>
                        <label>Apellidos<br/><input type="text" name="apellido" value="" /></label>
                        <label>Email<br/><input type="email" name="email" value="" /></label>
                        <div class="clear"></div>
                        <input type="submit" value="Guardar cambios" />
                    </form>
                    
                </div>
            </div>
        </section>
        <footer>aa</footer>
    </body>
    <script>
            var login = document.getElementById("login");
            login.addEventListener("blur", function(){
                var log = login.value;
                var ajax = new Ajax();
                ajax.setUrl("ajaxLogin.php?login="+log);
                ajax.setRespuesta(verrespuesta);
                ajax.doPeticion();
            });
            var verrespuesta = function(textojson){
                var json =  JSON.parse(textojson);
                if(json.si == false){
                    login.nextElementSibling.textContent = "Este usuario ya existe"; 
                }else{
                    login.nextElementSibling.textContent = "Disponible"; 
                }
            }
    </script>
</html>