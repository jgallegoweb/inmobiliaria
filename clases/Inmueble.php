<?php
/**
 * Description of Inmueble
 *
 * @author Javier
 */
class Inmueble {
    private $id, $direccion, $poblacion, $codigopostal, $provincia, $fechapubli, $tipo, $precio, $tipooferta, $arrayfotos;
    function __construct($id=null, $direccion=null, $poblacion=null, $codigopostal=null, $provincia=null, $fechapubli=null, $tipo='Piso', $precio=null, $tipooferta='alquiler', $arrayfotos=null) {
        $this->id = $id;
        $this->direccion = $direccion;
        $this->poblacion = $poblacion;
        $this->codigopostal = $codigopostal;
        $this->provincia = $provincia;
        $this->fechapubli = $fechapubli;
        $this->tipo = $tipo;
        $this->precio = $precio;
        $this->tipooferta = $tipooferta;
        $this->arrayfotos = $arrayfotos;
    }
    
    /*
     * Falta por implementar el método set
     */
    function setId($id) {
        $this->id = $id;
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

    function setArrayfotos($arrayfotos) {
        $this->arrayfotos = $arrayfotos;
    }

    function getId() {
        return $this->id;
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

    function getArrayfotos() {
        return $this->arrayfotos;
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
  tipooferta enum('alquiler', 'venta') not null
) engine=innodb charset=utf8 collate=utf8_unicode_ci;*/