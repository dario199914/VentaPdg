<?php
include "../data_base.php";
$usuario = new DataBase();



if(isset($_POST['btn_registrar_producto'])!=null){

$cat_id = $_POST['slc_categoria'];
$prv_id = $_POST['slc_proveedor'];

$emp_id = '1';
$pro_codigo = '1';
$pro_nombre = $_POST['txt_nombre'];
$pro_des = $_POST['txt_descripcion'];
$pro_fecha = $_POST['txt_fecha'];
$pro_stock = $_POST['txt_cantidad'];
$pro_ganancia = $_POST['txt_ganancia'];
$pro_precio = $_POST['txt_precio'];
$pro_obse = '1';



$res=$usuario->register_product($cat_id,$prv_id,$emp_id,$pro_codigo,$pro_nombre,$pro_stock,$pro_des,$pro_precio,$pro_obse,$pro_fecha,$pro_ganancia);
if($res){

    echo '<script language="javascript">alert("Producto Registrado ");
    window.location.href="../Vistas/Container/listar_productos.php"</script>';
    
}else{
    echo '<script language="javascript">alert("Producto NO Registrado ");
    window.location.href="../Vistas/Container/listar_productos.php"</script>';
}

}




if(isset($_POST['btnVerificar'])!=null){

    $user= $_POST['user'];
    $pass = $_POST['pass'];
    $nombre_usu=$user;

    session_start();
$_SESSION["nombre"] = $nombre_usu;
header('Location:../Vistas/Container/index.php');

    
    


   $res=$usuario->verficar($user,$pass);
    
    if($res==1){
    
    echo '<script language="javascript">alert("Bienvenido Usuario ");
            window.location.href="../Vistas/Container/index.php"</script>';
    
    
    
    }else{
        echo '<script language="javascript">alert("Ingrese credenciales Correctas ");
            window.location.href="../Vistas/index.php"</script>';
    
    }
}








if(isset($_POST['btncambiar'])!=null){
    $usu = $_POST['txtusu'];
    $pass = $_POST['txtcon'];
    $passV=$_POST['txtconN'];

  if ($pass==$passV)
  {
    $res=$usuario->cambiarClave($usu,$pass);
   
    if($res){
    
        echo '<script language="javascript">alert("Contraseña Cambiada");window.location.href="../index.php"</script>';
        
    }else{
        echo '<script language="javascript">alert("Credenciales Incorrectas");window.location.href="../cambiarC.php"</script>';
    }

  }else{

    echo '<script language="javascript">alert("Contraseñas no coinciden ");window.location.href="../cambiarC.php"</script>';

  }
}

    if(isset($_POST['btnRe'])!=null){
        $usu = $_POST['txtusu'];
        $correo = $_POST['txtcon'];
      
        
        $res=$usuario->recuperar($usu,$correo);
        if($res==1){

            echo '<script language="javascript">alert("Contraseña Encontrada ");window.location.href="../recuperarC1.php"</script>';
            
        }else{
            echo '<script language="javascript">alert("Ingrese credenciales Correctas ");window.location.href="../recuperarC.php"</script>';
            
        }
 
    }



?>