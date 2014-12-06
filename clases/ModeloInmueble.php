<?php
/**
 * Description of ModeloInmueble
 *
 * @author Javier
 */
class ModeloInmueble {
    private $bd;
    private $tabla = "inmueble";
    
    function __construct(BaseDatos $bd) {
        $this->bd = $bd;
    }
    /**
     * Añade un nuevo inmueble a la base de datos a partir de un objeto Inmueble
     * @access public
     * @param Inmueble $objeto objeto Inmueble con los datos a insertar
     * @return int Devuelve el id de la tupla insertada o -1 si no se ha insertado
     */
    function add(Inmueble $objeto){
        $sql = "INSERT INTO $this->tabla VALUES(null, :direccion, :poblacion, "
                . ":codigopostal, :provincia, curdate(), :tipo, :precio,"
                . " :tipooferta, :descripcion, :habitaciones, :banos)";
        $param['direccion']=$objeto->getDireccion();
        $param['poblacion']=$objeto->getPoblacion();
        $param['codigopostal']=$objeto->getCodigopostal();
        $param['provincia']=$objeto->getProvincia();
        $param['tipo']=$objeto->getTipo();
        $param['precio']=$objeto->getPrecio();
        $param['tipooferta']=$objeto->getTipooferta();
        $param['descripcion']=$objeto->getDescripcion();
        $param['habitaciones']=$objeto->getHabitaciones();
        $param['banos']=$objeto->getBanos();
        
        $r = $this->bd->setConsulta($sql, $param);
        
        if(!$r){
            return -1;
        }
        return $this->bd->getAutonumerico();
    }
    
}


/*
create table inmueble(
  id int(6) not null primary key auto_increment,
  direccion varchar(80) not null,
  poblacion varchar (60) not null,
  codigopostal int(5) not null,
  provincia varchar(60) not null,
  fechapubli datetime not null,
  tipo enum('Piso', 'Casa', 'Apartamento', 'Estudio', 'Chalet', 'Garaje', 'Local', 'Oficina') not null,
  precio numeric(10,2) not null,
  tipooferta enum('alquiler', 'venta') not null,
  descripcion varchar(255) not null,
  habitaciones tinyint(3) not null,
  banos tinyint(3) not null
) engine=innodb charset=utf8 collate=utf8_unicode_ci;
 *  */