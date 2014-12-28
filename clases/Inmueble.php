<?php
/**
 * Description of Inmueble
 *
 * @author Javier
 */
class Inmueble {
    private $id, $direccion, $poblacion, $codigopostal, $provincia, $fechapubli, $tipo, $precio, $tipooferta, $descripcion, $habitaciones, $banos, $fotos, $vendedor;
    function __construct($id=null, $direccion=null, $poblacion=null, $codigopostal=null, 
            $provincia=null, $fechapubli=null, $tipo='Piso', $precio=null, $tipooferta='alquiler', $descripcion="", $habitaciones=0, $banos=0, $fotos=null, $vendedor=0) {
        $this->id = $id;
        $this->direccion = $direccion;
        $this->poblacion = $poblacion;
        $this->codigopostal = $codigopostal;
        $this->provincia = $provincia;
        $this->fechapubli = $fechapubli;
        $this->tipo = $tipo;
        $this->precio = $precio;
        $this->tipooferta = $tipooferta;
        $this->descripcion = $descripcion;
        $this->habitaciones = $habitaciones;
        $this->banos = $banos;
        $this->fotos = $fotos;
        $this->vendedor = $vendedor;
    }
    
    function set($datos, $inicio=0){
        $this->id = $datos[0+$inicio];
        $this->direccion = $datos[1+$inicio];
        $this->poblacion = $datos[2+$inicio];
        $this->codigopostal = $datos[3+$inicio];
        $this->provincia = $datos[4+$inicio];
        $this->fechapubli = $datos[5+$inicio];
        $this->tipo = $datos[6+$inicio];
        $this->precio = $datos[7+$inicio];
        $this->tipooferta = $datos[8+$inicio];
        $this->descripcion = $datos[9+$inicio];
        $this->habitaciones = $datos[10+$inicio];
        $this->banos = $datos[11+$inicio];
        $this->vendedor = $datos[12+$inicio];
    }
    
    function setId($id) {
        $this->id = $id;
    }
    function setVendedor($vendedor) {
        $this->vendedor = $vendedor;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setPoblacion($poblacion) {
        $this->poblacion = $poblacion;
    }

    function setCodigopostal($codigopostal) {
        $this->codigopostal = $codigopostal;
    }

    function setProvincia($provincia) {
        $this->provincia = $provincia;
    }

    function setFechapubli($fechapubli) {
        $this->fechapubli = $fechapubli;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }

    function setTipooferta($tipooferta) {
        $this->tipooferta = $tipooferta;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setHabitaciones($habitaciones) {
        $this->habitaciones = $habitaciones;
    }

    function setBanos($banos) {
        $this->banos = $banos;
    }
    
    function setFotos($fotos) {
        $this->fotos = $fotos;
    }

    function getId() {
        return $this->id;
    }
    function getVendedor() {
        return $this->vendedor;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getPoblacion() {
        return $this->poblacion;
    }

    function getCodigopostal() {
        return $this->codigopostal;
    }

    function getProvincia() {
        return $this->provincia;
    }

    function getFechapubli() {
        return $this->fechapubli;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getTipooferta() {
        return $this->tipooferta;
    }
    function getDescripcion() {
        return $this->descripcion;
    }

    function getHabitaciones() {
        return $this->habitaciones;
    }

    function getBanos() {
        return $this->banos;
    }

    function getFotos() {
        return $this->fotos;
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
  vendedor varchar(20) default admin not null
) engine=innodb charset=utf8 collate=utf8_unicode_ci;*/