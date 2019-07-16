<?php

class Connection {
    public static $con="" ;
    private $servername ="localhost";
    private $username ="root";
    private $password ="";
    private $dbname ="";
   
   private function __construct() {} 
   public static function getInstance() {
     //modele singleton pour la connection 
     if($con =="") {
       $con = mysqli_connect("localhost","root","","eventdb");
       return $con ;
     }
     }
   }
?>