<?php

/**
 * Description of Util
 *
 * @author Usuario
 */
class Util {
    static function getEnlacesPaginacion($p, $paginas, $enlace){  //               
        $html = "<a href='$enlace=0'>&lt;&lt;</a> ";
        if($p>0){
            $html .= "<a href='$enlace=".($p-1)."'>&lt;</a> ";
        }else{
            $html .= "<a href='#' class=''>&lt;</a> ";
        }
        

        if($p==0){
            $x = Array($p, $p+1, $p+2, $p+3, $p+4);
        }else if($p==1){
            $x = Array($p-1, $p, $p+1, $p+2, $p+3);
        }else if($p==$paginas-2){
            $x = Array($p-3, $p-2, $p-1, $p, $p+1);
        }else if($p==$paginas-1){
            $x = Array($p-4, $p-3, $p-2, $p-1, $p);
        }else if($p<$paginas-2){
            $x = Array($p-2, $p-1, $p, $p+1, $p+2);
        }


        $html .= "<a href='$enlace=".($x[0])."'>".($x[0]+1)."</a> ";
        $html .= "<a href='$enlace=".($x[1])."'>".($x[1]+1)."</a> ";
        $html .= "<a href='$enlace=".($x[2])."'>".($x[2]+1)."</a> ";
        $html .= "<a href='$enlace=".($x[3])."'>".($x[3]+1)."</a> ";
        $html .= "<a href='$enlace=".($x[4])."'>".($x[4]+1)."</a> ";

        $html .= "<a href='$enlace=".($p+1)."'>&gt;</a> ";
        $html .= "<a href='$enlace=".($paginas-1)."'>&gt;&gt;</a> ";
        return $html;
    }
    static function getEnlacesAjax($p, $paginas){
        $html = "<span>&lt;&lt;</span> ";
        if($p>0){
            $html .= "<span>&lt;</span> ";
        }else{
            $html .= "<span>&lt;</span> ";
        }
        

        if($p==0){
            $x = Array($p, $p+1, $p+2, $p+3, $p+4);
        }else if($p==1){
            $x = Array($p-1, $p, $p+1, $p+2, $p+3);
        }else if($p==$paginas-2){
            $x = Array($p-3, $p-2, $p-1, $p, $p+1);
        }else if($p==$paginas-1){
            $x = Array($p-4, $p-3, $p-2, $p-1, $p);
        }else if($p<$paginas-2){
            $x = Array($p-2, $p-1, $p, $p+1, $p+2);
        }


        $html .= "<span>".($x[0]+1)."</span> ";
        $html .= "<span>".($x[1]+1)."</span> ";
        $html .= "<span>".($x[2]+1)."</span> ";
        $html .= "<span>".($x[3]+1)."</span> ";
        $html .= "<span>".($x[4]+1)."</span> ";

        $html .= "<span>&gt;</span> ";
        $html .= "<span>&gt;&gt;</span> ";
        return $html;
    }
    static function cifrarPass($clave, $digito=7){
        $permitidos = './1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $salt = sprintf('$2y$%02d$', $digito);
        for($i = 0; $i < 22; $i++){
            $salt .= $permitidos[mt_rand(0, 63)];
        }
        return crypt($clave, $salt);
    }
    static function isPass($clave, $guardada){
        if(crypt($clave, $guardada) == $guardada){
            return true;
        }
        return false;
    }
}
