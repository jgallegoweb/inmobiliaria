<?php
/**
 * Description of modeloUsuario
 *
 * @author Usuario
 */
class modeloUsuario {
    private $bd;
    private $tabla="usuario";
    function __construct(BaseDatos $bd) {
        $this->bd = $bd;
    }
    function add(Usuario $objeto){
        $sql="INSERT INTO $this->tabla VALUES(:login, :clave, :nombre,"
                . " :apellidos, :email, CURDATE(), :isactivo, :isroot,"
                . " :rol, null)";
        echo $sql;
        $param['login']=$objeto->getLogin();
        $param['clave'] = Util::cifrarPass($objeto->getClave());
        $param['nombre']=$objeto->getNombre();
        $param['apellidos']=$objeto->getApellido();
        $param['email']=$objeto->getEmail();
        $param['isactivo']=$objeto->getIsactivo();
        $param['isroot']=$objeto->getIsroot();
        $param['rol']=$objeto->getRol();
        $r=$this->bd->setConsulta($sql, $param);
        if(!$r){
            return -1;
        }
        return $r;
    }
    function delete(Usuario $objeto){
        $sql="DELETE FROM $this->tabla WHERE login = :login";
        $param['login']=$objeto->getLogin();
        $r=$this->bd->setConsulta($sql, $param);
        if(!$r){
            return -1;
        }
        return $this->bd->getNumeroFilas();
    }
    //deleteporlogin
    
    /*function edit(Usuario $objeto){
        $sql="UPDATE $this->tabla SET login=:login, clave=:clave, nombre=:nombre, apellidos=:apellidos, email=:email, fechaalta=:fechaalta, isactivo?:isactivo, isroot=:isroot, rol=:rol, fechalogin=:fechalogin where login=:login";
        $param['nombre']=$objeto->getNombre();
        $param['apellidos']=$objeto->getApellido();
        $param['id']=$objeto->getId();
        $r=$this->bd->setConsulta($sql, $param);
        if(!$r){
            return -1;
        }
        return $this->bd->getNumeroFilas();
    }*/
    function edit(Usuario $objetoNuevo, $loginpk){
        $sql="UPDATE $this->tabla SET login=:login, clave=:clave, nombre=:nombre, apellidos=:apellidos, email=:email, isactivo=:isactivo, isroot=:isroot, rol=:rol where login=:loginpk";
        $param['login']=$objetoNuevo->getLogin();
        $param['clave']=$objetoNuevo->getClave();
        $param['nombre']=$objetoNuevo->getNombre();
        $param['apellidos']=$objetoNuevo->getApellido();
        $param['email']=$objetoNuevo->getEmail();
        $param['isactivo']=$objetoNuevo->getIsactivo();
        $param['isroot']=$objetoNuevo->getIsroot();
        $param['rol']=$objetoNuevo->getFechalogin();
        $param['loginpk']=$loginpk;
        $r=$this->bd->setConsulta($sql, $param);
        if(!$r){
            return -1;
        }
        return $this->bd->getNumeroFilas();
    }
    function get($login){
        $sql = "SELECT * FROM $this->tabla where login=:login";
        $param['login']=$login;
        $r=$this->bd->setConsulta($sql, $param);
        if($r){
            $usuario = new Usuario();
            $usuario->set($this->bd->getFila());
            return $usuario;
        }
        return null;
    }
    function count($condicion="1=1", $parametro=array()){
        $sql = "SELECT count(*) FROM $this->tabla WHERE $condicion";
        $r = $this->bd->setConsulta($sql);
        if($r){
            return $this->bd->getFila();//??????????????????????????????????????
        }
        return -1;
    }
    function getList($condicion="1=1", $parametro=array(), $orderby = "1"){
        $list = array();
        $sql = "select * from $this->tabla where $condicion order by $orderby";
        $r = $this->bd->setConsulta($sql, $parametro);
        if($r){
            while($fila = $this->bd->getFila()){
                $usuario = new Usuario();
                $usuario->set($fila);
                $list[] = $usuario;
            }
        }else{
            return null;
        }
        return $list;
    }
    function selectHTML($id, $name, $condicion, $parametros, $orderby = "1", $valorSeleccionado="", $blanco=true, $texto=""){
        //$select = "<select name='$name' id='$id'>";
        //terminar
        return false;
    }
}