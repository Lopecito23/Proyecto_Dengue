<?php
include_once '../model/Rol/RolModel.php';


class RolesController
{
    public function getCreate()
    {
        include_once '../view/Roles/createrol.php';
    }

    public function postCreate()
    {
        $objeto = new RolModel();

        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];


        $id = $objeto->autoIncrement("roles", "id_rol");

        $sql = "INSERT INTO roles values($id, '$nombre', '$descripcion')";

        $ejecutar = $objeto->insert($sql);

        if ($ejecutar) {
            redirect(getUrl("Roles", "Roles", "list"));
        } else {
            echo "No se pudo insertar el usuario";
        }
    }
    public function getUpdate()
    {
        $objeto = new RolModel();
        $id = $_GET['id'];
        $sql = "SELECT * FROM roles WHERE id_rol = $id";
        $roles = $objeto->select($sql);

        if($roles){
              $roles_data = pg_fetch_assoc($roles);
        }else{
            $roles_data =[];
        }

        include_once '../view/Roles/updaterol.php';
    }

    public function postUpdate()
    {
        $obj = new RolModel();

        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];

        $sql = "UPDATE roles SET rol_nombre='$nombre', rol_descripcion='$descripcion' WHERE id_rol=$id";
        $ejecutar = $obj->select($sql);

        if ($ejecutar) {
            redirect(getUrl("Roles", "Roles", "list"));
        } else {
            echo "Hubo un problema al actualizar el usuario.";
        }
    }


    public function getDelete()
    {
        $objeto = new RolModel();

        $id = $_GET['id'];
        $sql = "DELETE FROM roles WHERE id_rol = $id";
        $ejecutar = $objeto->delete($sql);

        if ($ejecutar) {
            redirect(getUrl("Roles", "Roles", "list"));
        } else {
            echo "Hubo un problema al eliminar el usuario.";
        }

    }

    // public function postDelete()
    // {
    //     $obj = new UsuarioModel();
    //     $id = $_GET['id'];
    //     $sql = "UPDATE roles SET est_id=2 WHERE id=$id";
    //     $ejecutar = $obj->select($sql);

    //     if ($ejecutar) {
    //         redirect(getUrl("Roles", "Roles", "list"));
    //     } else {
    //         echo "Hubo un problema al actualizar el usuario.";
    //     }
    // }

    // public function updateStatus()
    // {
    //     $obj = new UsuarioModel();
    //     $id = $_GET['id'];
    //     $sql = "UPDATE usuarios SET est_id=1 WHERE id=$id";
    //     $ejecutar = $obj->select($sql);

    //     if ($ejecutar) {
    //         redirect(getUrl("Usuarios", "Usuarios", "list"));
    //     } else {
    //         echo "Hubo un problema al actualizar el usuario.";
    //     }
    // }

    public function list()
    {
        $objeto = new RolModel();

        $sql = "SELECT * FROM  roles";

        $roles = $objeto->select($sql);

        if($roles){
              $roles_data = pg_fetch_all($roles);
        }else{
            $roles_data = [];
        }


        include_once '../view/Roles/listrol.php';
    }
}

?>