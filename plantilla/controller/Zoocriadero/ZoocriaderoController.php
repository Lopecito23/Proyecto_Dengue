<?php
include_once '../model/MasterModel.php';

class ZoocriaderoController
{

    public function getAll()
    {
        $obj = new MasterModel();
        $sql = "SELECT z.*, CONCAT(u.nombre, ' ', u.apellido) as usuario_nombre 
        FROM zoocriadero z 
        INNER JOIN usuario u ON z.documento_responsable = u.documento
        
        ORDER BY z.id_zoocriadero DESC";
        $zoocriaderos = $obj->select($sql);

        if ($zoocriaderos) {
            $zoo_datos = pg_fetch_all($zoocriaderos);
        } else {
            $zoo_datos[] = null;
        }

        include_once '../view/Zoocriadero/listzoocriadero.php';
    }

    public function getCreate()
    {
        $obj = new MasterModel();
        $sql = "SELECT id, nombre, apellido FROM usuario ORDER BY nombre";
        $usuarios = $obj->select($sql);


        if ($usuarios) {
            $usuarios_data = pg_fetch_all($usuarios);

        } else {
            $usuarios_data = [];
        }

        include_once '../view/Zoocriadero/createzoocriadero.php';
    }

    public function postCreate()
    {
        $id_usuario = $_POST['id_usuario'];
        $dirrecion = $_POST['dirrecion'];
        $coordenadas = $_POST['coordenadas'];

        $obj = new MasterModel();
        $sql = "INSERT INTO zoocriadero (id_usuario, dirrecion, coordenadas) 
                VALUES ($id_usuario, '$dirrecion', $coordenadas)";
        $ejecutar = $obj->operaciones($sql);

        if ($ejecutar) {
            redirect(getUrl("Zoocriadero", "Zoocriadero", "getAll"));
        } else {
            echo "Error al crear el zoocriadero";
        }
    }

    public function getUpdate()
    {
        $id = $_GET['id'];

        $obj = new MasterModel();

        $sql = "SELECT * FROM zoocriadero WHERE id_zoocriadero = $id";
        $resultado = $obj->consultar($sql);
        $zoocriadero = $resultado[0];

        $sqlUsuarios = "SELECT id, nombres, apellidos FROM usuario ORDER BY nombres";
        $usuarios = $obj->consultar($sqlUsuarios);

        include_once '../view/Zoocriadero/updatezoocriadero.php';
    }

    public function postUpdate()
    {
        $id = $_POST['id_zoocriadero'];
        $id_usuario = $_POST['id_usuario'];
        $dirrecion = $_POST['dirrecion'];
        $coordenadas = $_POST['coordenadas'];

        $obj = new MasterModel();
        $sql = "UPDATE zoocriadero SET 
                id_usuario = $id_usuario, 
                dirrecion = '$dirrecion', 
                coordenadas = $coordenadas 
                WHERE id_zoocriadero = $id";
        $ejecutar = $obj->operaciones($sql);

        if ($ejecutar) {
            redirect(getUrl("Zoocriadero", "Zoocriadero", "getAll"));
        } else {
            echo "Error al actualizar el zoocriadero";
        }
    }

    public function postDelete()
    {
        $id = $_GET['id'];

        $obj = new MasterModel();
        $sql = "DELETE FROM zoocriadero WHERE id_zoocriadero = $id";
        $ejecutar = $obj->operaciones($sql);

        if ($ejecutar) {
            redirect(getUrl("Zoocriadero", "Zoocriadero", "getAll"));
        } else {
            echo "Error al eliminar el zoocriadero";
        }
    }
}
?>