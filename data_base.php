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

        public function register_product($cat_id,$prv_id,$emp_id,$pro_codigo,$pro_nombre,$pro_stock,$pro_des,$pro_precio,$pro_obse,$pro_fecha,$pro_ganancia){
            $sql=" INSERT INTO tbl_producto(CAT_ID, PRV_ID, EMP_ID, PRO_CODIGO, PRO_NOMBRE, PRO_STOCK, PRO_DESC, PRO_PRECIO,PRO_OBSER, PRO_FEHCA, PRO_GANANCIA) VALUES ('$cat_id','$prv_id','$emp_id','$pro_codigo','$pro_nombre','$pro_stock','$pro_des','$pro_precio','$pro_obse','$pro_fecha','$pro_ganancia')";
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
            $sql = "SELECT P.PRO_ID,P.PRO_NOMBRE,C.CAT_NOMBRE,PR.PRV_NOMBRE,P.PRO_PRECIO,P.PRO_STOCK FROM tbl_producto P JOIN tbl_categoria C ON P.CAT_ID=C.CAT_ID JOIN tbl_proveedor PR ON P.PRV_ID=PR.PRV_ID WHERE P.EMP_ID='2'";
            $res=mysqli_query($this->con, $sql);
           
            return $res;
        }

        public function fill_list()
        {
            $sql = "SELECT * FROM tbl_categoria"; 
            $res=mysqli_query($this->con, $sql);
           
            return $res;
        }
        public function fill_list2()
        {
            $sql = "SELECT * FROM tbl_proveedor"; 
            $res=mysqli_query($this->con, $sql);
           
            return $res;
        }
        


    }
?>   