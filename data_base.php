<?php
    class DataBase{
        
        private $con;
        private $dbhost="localhost";
        private $dbuser="root";
        private $dbpass="";
        private $dbname="ventaspdg";

        public function __construct()
        {
            $this->connect_db();
        }
        public function connect_db(){
            $this->con=mysqli_connect($this->dbhost,$this->dbuser,$this->dbpass,$this->dbname);
            if(mysqli_connect_error()){
                die("Conexión fallida".mysqli_connect_error().mysqli_connect_errno());
            }  
        }
        public function sanitize($var){
            $return= mysqli_real_escape_string($this->con, $var);
            return $return;
        }

        public function verficar($usu,$pass){
            //SELECT *FROM `tbl_user` WHERE user='dario' AND pass='123'

            $sql="SELECT * FROM tbl_usuario WHERE USU_CORREO='".$usu."' AND USU_PASS='".$pass."'";
            $res=mysqli_query($this->con, $sql);
            $r=mysqli_num_rows($res);
            

            if($r==1){
                return true;
            }else{
                return false;
            }
        }

        public function create($nombre,$ape,$ced,$sex,$numero){
            $sql=" INSERT INTO tbl_usuario(nombre, apellido, cedula,sexo,numero) VALUES ('$nombre','$ape','$ced','$sex',$numero)";
            $res=mysqli_query($this->con, $sql);
            if($res){
                return true;
            }else{
                return false;
            }
        }
        public function recuperar($usu,$correo){
            //SELECT *FROM `tbl_user` WHERE user='dario' AND pass='123'

            $sql="SELECT * FROM tbl_user WHERE user='".$usu."'";
            $res=mysqli_query($this->con, $sql);
            $r=mysqli_num_rows($res);
            

            if($r==1){
                return true;
            }else{
                return false;
            }
        }


        public function read(){
            $sql = "SELECT * FROM tbl_user";
            $res=mysqli_query($this->con, $sql);
            $result=mysqli_fetch_object($res);
            return $result;
        }

        public function cambiarClave($usuario, $pass ){
            //UPDATE tbl_user SET   pass='dario' WHERE user='dario1'";
            $sql="UPDATE tbl_user SET   pass='".$pass."' WHERE user='".$usuario."' ";
            $res=mysqli_query($this->con, $sql);
            if($res){
                return true;
            }else{
                return false;
            }
        }


        public function readPro()
        {
            $sql = "SELECT * FROM tbl_producto";
            $res=mysqli_query($this->con, $sql);
           
            return $res;
        }



    }
?>   