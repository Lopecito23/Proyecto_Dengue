<?php
include_once '../model/MasterModel.php';

class TipoTanquesController
{

    // Listar todos los tipos de tanques
    public function getAll()
    {
        $obj = new MasterModel();
        $sql = "SELECT * FROM tipotanque ORDER BY id_TipoT DESC";
        $tipoTanques = $obj->consultar($sql);
        include_once '../view/TipoTanques/listtipotanque.php';
    }

    // Mostrar formulario de creación
    public function getCreate()
    {
        include_once '../view/TipoTanques/createtipotanque.php';
    }


    public function postCreate()
    {
        $nombre = $_POST['nombre'];

        $obj = new MasterModel();
        $sql = "INSERT INTO tipotanque (nombre) VALUES ('$nombre')";
        $ejecutar = $obj->operaciones($sql);

        if ($ejecutar) {
            redirect(getUrl("TipoTanques", "TipoTanques", "getAll"));
        } else {
            echo "Error al crear el tipo de tanque";
        }
    }

    public function getUpdate()
    {
        $id = $_GET['id'];

        $obj = new MasterModel();
        $sql = "SELECT * FROM tipotanque WHERE id_TipoT = $id";
        $resultado = $obj->consultar($sql);
        $tipoTanque = $resultado[0];

        include_once '../view/TipoTanques/updatetipotanque.php';
    }

    public function postUpdate()
    {
        $id = $_POST['id_TipoT'];
        $nombre = $_POST['nombre'];

        $obj = new MasterModel();
        $sql = "UPDATE tipotanque SET nombre = '$nombre' WHERE id_TipoT = $id";
        $ejecutar = $obj->operaciones($sql);

        if ($ejecutar) {
            redirect(getUrl("TipoTanques", "TipoTanques", "getAll"));
        } else {
            echo "Error al actualizar el tipo de tanque";
        }
    }


    public function postDelete()
    {
        $id = $_GET['id'];

        $obj = new MasterModel();
        $sql = "DELETE FROM tipotanque WHERE id_TipoT = $id";
        $ejecutar = $obj->operaciones($sql);

        if ($ejecutar) {
            redirect(getUrl("TipoTanques", "TipoTanques", "getAll"));
        } else {
            echo "Error al eliminar el tipo de tanque";
        }
    }
}
?>