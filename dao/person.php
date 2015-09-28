<?php
class Person{
    
    function checkEmail($val){
        $pdoData = Person::getPDO()->prepare('SELECT login FROM `person` WHERE email="'.$val.'"');
        $pdoData->execute();
        $data =  $pdoData->fetch();
        
        $temp = $pdoData->errorInfo();
        //echo $temp[0];
        if($temp[0] == 0){
            return $data[0];
        }
        
        return ""; 
    }
    
    function checkUser($val){
        $pdoData = Person::getPDO()->prepare('SELECT login FROM `person` WHERE login="'.$val.'"');
        $pdoData->execute();
        $data =  $pdoData->fetch();
        
        
        $temp = $pdoData->errorInfo();
        //echo $temp[0];
        if($temp[0] == 0){
            return  $data[0];
        }
        
        return ""; 
    }
 
   
    
    
    private static function getPDO() {
        $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS, array(
            PDO::FETCH_ASSOC => true));
        $pdo->exec('SET NAMES utf8');
        return $pdo;
    }
    
    
}

