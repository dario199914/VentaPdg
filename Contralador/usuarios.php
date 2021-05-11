<?php
include "../data_base.php";
$usuario = new DataBase();

/*if(isset($_POST['bntregistrar'])!=null){
$nom = $_POST['txtnombre'];
$ape = $_POST['txtape'];
$ci = $_POST['txtCi'];
$sex = $_POST['txtsexo'];
$numt = $_POST['txtnumT'];

$res=$usuario->create($nom,$ape,$ci,$sex,$numt);
if($res){

    echo "Registro se guardó con éxito";
    
}else{
    echo "Registro falló";
}

}*/




if(isset($_POST['btnVerificar'])!=null){

    $user= $_POST['user'];
    $pass = $_POST['pass'];


   $res=$usuario->verficar($user,$pass);
   
    if($res==1){

    echo '<script language="javascript">alert("Bienvenido Usuario ");
            window.location.href="../Vistas/Container/index.php"</script>';
    
    
    
    }else{
        echo '<script language="javascript">alert("Ingrese credenciales Correctas ");
            window.location.href="../Vistas/Container/login.php"</script>';
    
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