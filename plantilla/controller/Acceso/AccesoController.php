<?php
include '../model/Acceso/AccessoModel.php';
class AccesoController
{

    public function login(){
    $obj = new AccessoModel();

    
    $usu_correo = $_POST['email'];
    $usu_password = $_POST['password'];

     $sql = "SELECT * FROM usuario WHERE correo = '$usu_correo' AND contrasenia = '$usu_password'";
     $usuario = $obj->select($sql);


     if(pg_num_rows($usuario) > 0){
       while($usu = pg_fetch_assoc($usuario)){
         session_start();
         $_SESSION['id'] = $usu['id'];
         $_SESSION['nombre'] = $usu['nombre'];
         $_SESSION['correo'] = $usu['correo'];
         $_SESSION['auth'] = "ok";
       }
       redirect("../web/index.php");
     } else {
       $_SESSION['error'] = "Correo o contraseña incorrectos.";
       redirect("../web/login.php");
     }
    }
    
    public function logout(){
        session_start();
        session_destroy();
        redirect("../web/login.php");
    }

}

?>