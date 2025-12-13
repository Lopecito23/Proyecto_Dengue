<?php

include_once '../model/Usuario/UsuarioModel.php';

class UsuariosController
{
    public function getCreate()
    {
        $objeto = new UsuarioModel();
        $sql = "SELECT * FROM roles";
        $roles = $objeto->select($sql);
        if($roles){
            $roles_data = pg_fetch_all($roles);
        }else{
            $roles_data = [];
        }
        include_once '../view/Usuarios/create.php';
    }

    public function postCreate()
    {
        $objeto = new UsuarioModel();

        $documento = $_POST['documento'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $telefono = $_POST['telefono'];
        $correo = $_POST['email'];
        $contrasenia = $_POST['contrasenia'];
        $rol = $_POST['rol'];

        $id = $objeto->autoIncrement("usuario", "id");

        $sql = "INSERT INTO usuario values($id,'$documento', '$nombre', '$apellido', '$correo','$telefono', '$contrasenia', 1,$rol)";
        $ejecutar = $objeto->insert($sql);

        if ($ejecutar) {
            redirect(getUrl("Usuarios", "Usuarios", "list"));
        } else {
            echo "No se pudo insertar el usuario";
        }
    }
    public function getUpdate()
    {



        $objeto = new UsuarioModel();
        $id = $_GET['id'];
        $sql = "SELECT * FROM usuarios WHERE id = $id";
        $usuario = $objeto->select($sql);

        $sql2 = "SELECT * FROM roles";
        $roles = $objeto->select($sql2);



        include_once '../view/Usuarios/update.php';
    }

    public function postUpdate()
    {
        $obj = new UsuarioModel();

        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "UPDATE usuarios SET nombre='$nombre', apellido='$apellido', email='$email', password='$password' WHERE id=$id";
        $ejecutar = $obj->select($sql);

        if ($ejecutar) {
            redirect(getUrl("Usuarios", "Usuarios", "list"));
        } else {
            echo "Hubo un problema al actualizar el usuario.";
        }
    }


    public function getDelete()
    {
        $objeto = new UsuarioModel();

        $id = $_GET['id'];
        $sql = "DELETE FROM usuario WHERE id = $id";
        $ejecutar = $objeto->delete($sql);

        if ($ejecutar) {
            redirect(getUrl("Usuarios", "Usuarios", "list"));
        } else {
            echo "Hubo un problema al eliminar el usuario.";
        }

    }

    public function postDelete()
    {
        $obj = new UsuarioModel();
        $id = $_GET['id'];
        $sql = "UPDATE usuario SET id_estado=2 WHERE id=$id";
        $ejecutar = $obj->select($sql);

        if ($ejecutar) {
            redirect(getUrl("Usuarios", "Usuarios", "list"));
        } else {
            echo "Hubo un problema al actualizar el usuario.";
        }
    }

    public function updateStatus()
    {
        $obj = new UsuarioModel();
        $id = $_GET['id'];
        $sql = "UPDATE usuario SET id_estado=1 WHERE id=$id";
        $ejecutar = $obj->select($sql);

        if ($ejecutar) {
            redirect(getUrl("Usuarios", "Usuarios", "list"));
        } else {
            echo "Hubo un problema al actualizar el usuario.";
        }
    }

    public function list()
    {
        $objeto = new UsuarioModel();

        $sql = "SELECT u.*, e.nombre_estado as estado,r.rol_nombre as rol FROM usuario u INNER JOIN estados_usuario_rol e ON u.id_estado = e.id_estado INNER JOIN roles r ON u.id_rol = r.id_rol";

        $usuarios = $objeto->select($sql);
        if($usuarios){
         $usuario_data = pg_fetch_all($usuarios);
        }else{
            $usuario_data = [];
            
        }


        include_once '../view/Usuarios/list.php';
    }
}
