<?php
require 'require/comun.php';
$bd = new BaseDatos();
$modeloUser = new modeloUsuario($bd);
$sesion = new Sesion();
$error=Leer::get("e");
$sesion->noAutentificado("usuarios/verLogin.php?e=32");
$objetoUser = $sesion->getUsuario();

$modelo = new ModeloInmueble($bd);;
    
    $tipooferta="%";
    $tipo="%";
    $poblacion="%";
    if(Leer::get("tipooferta")!=null){
        $tipooferta= Leer::get("tipooferta");
    }
    if(Leer::get("tipo")!=null){
        $tipo= Leer::get("tipo");
    }
    if(Leer::get("poblacion")!=null){
        $poblacion= Leer::get("poblacion");
    }
    $condicion="tipooferta LIKE :tipooferta and tipo LIKE :tipo and poblacion LIKE :poblacion";
    
    $param['tipooferta']=$tipooferta;
    $param['tipo']=$tipo;
    $param['poblacion']=$poblacion;
    
    
    if($objetoUser->getRol()!="administrador"){
        $condicion .= " and vendedor=:vendedor";
        $param['vendedor']=$objetoUser->getLogin();
    }
    
    $filas = $modelo->getList($condicion, $param);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>InMotril - Gestión</title>
        <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="css/estilosback.css" media="screen" />
        <link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
        <script src="js/codigo.js"></script>
        <style>
            .thumb {
              height: 75px;
              border: 1px solid #000;
              margin: 10px 5px 0 0;
            }
        </style>
    </head>
    <body>
        <header>
            <img src="img/logo.png">
        </header>
        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="usuarios/verAreaCliente.php">área cliente</a></li>
                <li><a href=""></a></li>
            </ul>
        </nav>
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
        <section id="central">
            <section class="tablacasas">
                <div class="minicab">Inmuebles actuales</div>
                <form class="formser" action="viewGestion.php">
                    <label>Busco 
                        <select name="tipo">
                            <option></option>
                            <option value="piso">Piso</option>
                            <option value="casa">Casa</option>
                            <option value="apartamento">Apartamento</option>
                            <option value="estudio">Estudio</option>
                            <option value="chalet">Chalet</option>
                            <option value="garaje">Garaje</option>
                            <option value="local">Local</option>
                            <option value="oficina">Oficina</option>
                        </select>
                    </label>
                    <label>para 
                        <select name="tipooferta">
                            <option></option>
                            <option value="venta">Comprar</option>
                            <option value="alquiler">Alquilar</option>
                        </select>
                    </label>
                    <label>en 
                        <select name="poblacion">
                            <option></option>
                            <?php
                            echo $modelo->getOption("poblacion");
                            ?>
                        </select>
                    </label><br/>
                    <input class="filtrogest" type="submit" value="Filtrar Búsqueda" />
                    <div class="clear"></div>
                </form>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Dirección</th>
                        <th>Población</th>
                        <th>C.P.</th>
                        <th>Provincia</th>
                        <th>Nº Habitaciones</th>
                        <th>Nº Baños</th>
                        <th>-</th>
                        <th>-</th>
                    </tr>
                    <?php
                        foreach($filas as $key => $objeto){
                    ?>
                    <tr>
                        <td><?php echo $objeto->getId(); ?></td>
                        <td><?php echo $objeto->getDireccion(); ?></td>
                        <td><?php echo $objeto->getPoblacion(); ?></td>
                        <td><?php echo $objeto->getCodigopostal(); ?></td>
                        <td><?php echo $objeto->getProvincia(); ?></td>
                        <td><?php echo $objeto->getHabitaciones(); ?></td>
                        <td> <?php echo $objeto->getBanos(); ?></td>
                        <td><a href="viewEditar.php?id=<?php echo $objeto->getId();?>">Editar</a></td>
                        <td><a class="eliminar" data-nombre="<?php echo $objeto->getDireccion(); ?>" href="phpEliminar.php?id=<?php echo $objeto->getId();?>">Borrar</a></td>
                    </tr>
                    <?php
                        }
                    ?>
                </table>
            </section>
            <section class="gestform">
                <div class="minicab">Nuevo inmueble</div>
                <form action="phpInsertar.php" method="POST" enctype="multipart/form-data" autocomplete="off">
                    
                    <label>Dirección: <input type="text" name="direccion" value="" placeholder="C/Piruleta nº10, Bloque 4, 3ºA" maxlength="80"/></label>
                    <label>Población: <input type="text" name="poblacion" value="" placeholder="Motril" maxlength="60"/></label>
                    <label>C.P.: <input type="number" name="codigopostal" value="" placeholder="18600" max="99999"/></label>
                    <label>Provincia: <input type="text" name="provincia" value="" placeholder="Granada" maxlength="60"/></label>
                    <label>Tipo inmueble
                        <select name="tipo">
                            <option>Piso</option>
                            <option>Casa</option>
                            <option>Apartamento</option>
                            <option>Estudio</option>
                            <option>Chalet</option>
                            <option>Garaje</option>
                            <option>Local</option>
                            <option>Oficina</option>
                        </select>
                    </label>
                    <label>Precio: <input type="number" name="precio" value="" placeholder="1000" max="9999999999"/></label>
                    <label>Tipo oferta:
                        <select name="tipooferta">
                            <option>Alquiler</option>
                            <option>Venta</option>
                        </select>
                    </label>
                    <label>Descripcion:<br/>
                        <textarea name="descripcion" rows="4" cols="20"></textarea>
                    </label>
                    <label>Habitaciones: <input type="number" name="habitaciones" value="" placeholder="2" max="999"/></label>
                    <label>Baños: <input type="number" name="banos" value="" placeholder="1" max="999"/></label>
                    <label>Imagenes: <input type="file" id="files" name="fotos[]" multiple /></label>
                    <output id="list"></output>
                    <input type="submit" value="Añadir" />
                    <input type="reset" id="limp" value="Limpiar" />
                </form>
            </section>
        </section>
    </body>
    <script>
  function handleFileSelect(evt) {
    var files = evt.target.files; // FileList object
    document.getElementById('list').innerHTML = "";
    // Loop through the FileList and render image files as thumbnails.
    for (var i = 0, f; f = files[i]; i++) {

      // Only process image files.
      if (!f.type.match('image.*')) {
        continue;
      }

      var reader = new FileReader();

      // Closure to capture the file information.
      reader.onload = (function(theFile) {
        return function(e) {
          // Render thumbnail.
          var span = document.createElement('span');
          span.innerHTML = ['<img class="thumb" src="', e.target.result,
                            '" title="', escape(theFile.name), '"/>'].join('');
          document.getElementById('list').insertBefore(span, null);
        };
      })(f);

      // Read in the image file as a data URL.
      reader.readAsDataURL(f);
    }
  }

  document.getElementById('files').addEventListener('change', handleFileSelect, false);
    </script>
</html>