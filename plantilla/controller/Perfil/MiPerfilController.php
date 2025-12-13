

<?php
//Separar la funcion de cargar de datos a mi perfil para mayor clariddad
include '../model/Acceso/AccessoModel.php';


class MiPerfilController
{


    public function getPerfil()
    {
        $obj = new AccessoModel();
        $id = $_SESSION['id'];
    }

    public function Mostrarperfil()
    {
        include_once '../view/MiPerfil/MiPerfil.php';
    }

    public function cargarPerfil()
    {


$id_usuario = $_SESSION['id'];
    
    $obj = new AccesoModel();
    
$sql = "SELECT 
            u.id, 
            u.documento,
            u.nombre, 
            u.apellido, 
            u.correo, 
            u.telefono, 
            e.nombre_estado AS estado, 
            r.nombre_rol AS rol      
        FROM usuario u
        INNER JOIN roles r ON u.id_rol = r.id_rol
        INNER JOIN estado e ON u.id_estado = e.id_estado  
        WHERE u.id = {$id_usuario}";    
        
        $usuario = $obj->select($sql);
    
    if (!$usuario ) {
        $usuario_data = false; 
    } else {
        
        $usuario_data = pg_fetch_assoc($usuario);
    }
  
    include_once '../view/Perfil/MiPerfil.php';
    }

}









?>