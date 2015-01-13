<?php
require '../require/comun.php';
$sesion = new Sesion();
$sesion->siAutentificado("../index.php?e=20");
$bd = new BaseDatos();
$error=  Leer::get("e");
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
        <section id="titulolugar">
            <h1>Registrate o Identifícate</h1>
        </section>
        
        <?php
        if($error!=null){
        ?>
        <section id="error">
            <?php
            echo Util::muestraMensaje($error);
            ?>
        </section>
        <?php 
        }
        ?>
        <section>
            <div class="centrador">
                <div class="iden flotante">
                    <form action="phpLogin.php" method="POST">
                        <label><br/><input type="text" class="login-1" name="login" value="" placeholder="Usuario o Email"/></label>
                        <label><br/><input type="password" class="pass-1" name="clave" value="" placeholder="Password"/></label>
                        <input type="submit" value="Iniciar sesión" />
                    </form>
                    
                </div>
                <div class="iden flotante">
                    <form action="phpAlta.php" method="POST" enctype="multipart/form-data">
                        <label><br/><input type="text" class="login-1" name="login" id="login" value="" placeholder="Usuario"/><span></span></label>
                        <label><br/><input type="password" class="pass-1" name="clave" value="" placeholder="Password"/></label>
                        <label><br/><input type="password" class="pass-1" name="clave1" value="" placeholder="Confirma Password"/></label>
                        <label><br/><input type="text" class="personal-1" name="nombre" value="" placeholder="Nombre"/></label>
                        <label><br/><input type="text" class="personal-1" name="apellido" value="" placeholder="Apellido"/></label>
                        <label><br/><input type="email" class="email-1" name="email" value="" placeholder="Email"/></label>
                        <div class="clear"></div>
                        <input type="submit" value="Registrarse" />
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
                    login.classList.remove("verdecillo"); 
                    login.classList.add("rojillo");
                }else{
                    login.classList.remove("rojillo"); 
                    login.classList.add("verdecillo");
                }
            }
    </script>
</html>