<?php
/**
 * Description of ModeloInmueble
 *
 * @author Javier
 */
class ModeloInmueble {
    private $bd;
    private $tabla = "inmueble";
    private $tablafotos = "fotoinmueble";
    
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
                . " :tipooferta, :descripcion, :habitaciones, :banos, :vendedor)";
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
        $param['vendedor']=$objeto->getVendedor();
        $r = $this->bd->setConsulta($sql, $param);
        if(!$r){
            return -1;
        }
        return $this->bd->getAutonumerico();
    }
    function addFoto(Inmueble $objeto){
        $sql = "INSERT INTO $this->tablafotos VALUES(null, :idcasa, :nombre)";
        $arrayfotos = $objeto->getFotos();
        $error=0;
        foreach($arrayfotos as $key => $foto){
            $param['idcasa']=$objeto->getId();
            $param['nombre']=$foto;
            $r=$this->bd->setConsulta($sql, $param);
            if(!$r){
                $error=-1;
            }
        }
        //devuelve -1 si alguna inserción falló
        return $error;
    }
    function delete(Inmueble $objeto){
        if($this->deleteFotos($objeto->getId())==-1){
            return -1;
        }
        $sql="DELETE FROM $this->tabla WHERE id = :id";
        $param['id']=$objeto->getId();
        $r=$this->bd->setConsulta($sql, $param);
        if(!$r){
            return -1;
        }
        return $this->bd->getNumeroFilas();
    }
    function deleteFotos($idcasa){
        $param['idcasa']=$idcasa;
        $sql = "select foto from $this->tablafotos WHERE idcasa = :idcasa";
        $this->bd->setConsulta($sql, $param);
        while($fila = $this->bd->getFila()){
            unlink($fila[0]);
        }
        $sql = "DELETE from $this->tablafotos WHERE idcasa = :idcasa";
        
        $r=$this->bd->setConsulta($sql, $param);
        if(!$r){
            return -1;
        }
        return $this->bd->getNumeroFilas();
    }
    function deleteFoto($foto){
        $param['foto']=$foto;
        unlink($foto);
        $sql = "DELETE from $this->tablafotos WHERE foto = :foto";
        
        $r=$this->bd->setConsulta($sql, $param);
        if(!$r){
            return -1;
        }
        return $this->bd->getNumeroFilas();
    }
    function edit(Inmueble $objeto){
        $sql = "UPDATE $this->tabla SET direccion=:direccion, poblacion=:poblacion, codigopostal=:codigopostal,"
                . "provincia=:provincia, tipo=:tipo, precio=:precio, tipooferta=:tipooferta,"
                . "descripcion=:descripcion, habitaciones=:habitaciones, banos=:banos WHERE id=:id";
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
        $param['id']=$objeto->getId();
        
        $r=$this->bd->setConsulta($sql, $param);
        if(!$r){
            return -1;
        }
        return $this->bd->getNumeroFilas();
    }
    function get($id){
        $sql = "SELECT * FROM $this->tabla where id=:id";
        $param['id']=$id;
        $r=$this->bd->setConsulta($sql, $param);
        if($r){
            $objeto = new Inmueble();
            $objeto->set($this->bd->getFila());
            $objeto->setFotos($this->getListFotos($objeto->getId()));
            return $objeto;
        }
        return null;
    }
    function getList($condicion="1=1", $param=array(), $orderby = "1"){
        $list = array();
        $sql = "select * from $this->tabla where $condicion order by $orderby";
        $r = $this->bd->setConsulta($sql, $param);
        if($r){
            while($fila = $this->bd->getFila()){
                $objeto = new Inmueble();
                $objeto->set($fila);
                $list[] = $objeto;
            }
        }else{
            return null;
        }
        return $list;
    }
    function getListPaginado($pagina=0, $rpp=10, $condicion="1=1", $parametro=array(), $orderby = "1"){
        $list = array();
        $principio = $pagina*$rpp;
        $sql = "select * from $this->tabla where $condicion order by $orderby limit $principio,$rpp";
        $r = $this->bd->setConsulta($sql, $parametro);
        if($r){
            while($fila = $this->bd->getFila()){
                $inmueble = new Inmueble();
                $inmueble->set($fila);
                $list[] = $inmueble;
            }
        }else{
            return null;
        }
        return $list;
    }
    function getListFotos($idcasa){
        $list = array();
        $sql = "select * from $this->tablafotos where idcasa=:idcasa";
        $param['idcasa']=$idcasa;
        $r = $this->bd->setConsulta($sql, $param);
        if($r){
            while($fila = $this->bd->getFila()){
                $list[] = $fila['foto'];
            }
        }else{
            return null;
        }
        return $list;
    }
    function getOption($buscado){
        $options="";
        $sql = "SELECT DISTINCT poblacion FROM $this->tabla order by 1";
        $param['buscado']=$buscado;
        $r=$this->bd->setConsulta($sql, $param);
        if($r){
            while($fila = $this->bd->getFila()){
                $options .= "<option>".$fila[0]."</option>";
            }
        }else{
            return null;
        }
        return $options;
    }
    function getNumPaginas($condicion="1=1", $parametros = Array(), $rpp=Configuracion::RPP){
        $list = $this->count($condicion, $parametros);
        return (ceil($list[0]/$rpp));
    }
    function count($condicion = "1=1", $parametros = array()) {
        $sql = "select count(*) from $this->tabla where $condicion";
        $r = $this->bd->setConsulta($sql, $parametros);
        if ($r) {
            //return $this->bd->getFila()[0];
            return $this->bd->getFila();
        }
        return -1;
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
 * 
 create table fotoinmueble(
    id int(6) not null primary key auto_increment,
    idcasa int(6) not null,
    foto varchar(30) not null
) engine=innodb charset=utf8 collate=utf8_unicode_ci;
 *  */