<?php

/**
 * Description of validations
 *
 * @author msi
 */
class validations {
   
        //Valida el nombre antes de comparar en la base de datos
    public function validateName($name){
        if(strlen($name) > 20 || strlen($name) < 1 
                || ctype_space($name) || ctype_digit($name)){
            return false;
        }else{
            return true;
        }
    }
        //Valida la pass antes de comparar en la base de datos
    public function validatePasswd($pass){
        if(strlen($pass)>50 || strlen($pass) < 1){
            return false;
        }else{
            return true;
        }
    }
   
}
