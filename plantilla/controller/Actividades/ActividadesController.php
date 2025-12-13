<?php
include_once '../model/Actividades/ActividadesModel.php';

class ActividadesController
{

    // Listar todas las actividades
    public function getAll()
    {
        $obj = new MasterModel();
        $sql = "SELECT * FROM actividad ORDER BY id_actividad DESC";
        $actividades = $obj->select($sql);

        if (!$actividades) {
            $actividades_data = [];
        } else {
            $actividades_data = pg_fetch_all($actividades);
        }
        include_once '../view/Actividades/listactividades.php';
    }

    // Mostrar formulario de creación
    public function getCreate()
    {
        include_once '../view/Actividades/createactividad.php';
    }

    // Crear una nueva actividad
    public function postCreate()
    {
        $nombre = $_POST['nombre'];

        $obj = new MasterModel();
        $sql = "INSERT INTO actividad (nombre) VALUES ('$nombre')";
        $ejecutar = $obj->operaciones($sql);

        if ($ejecutar) {
            redirect(getUrl("Actividades", "Actividades", "getAll"));
        } else {
            echo "Error al crear la actividad";
        }
    }

    // Mostrar formulario de actualización
    public function getUpdate()
    {
        $id = $_GET['id'];

        $obj = new MasterModel();
        $sql = "SELECT * FROM actividad WHERE id_actividad = $id";
        $resultado = $obj->consultar($sql);
        $actividad = $resultado[0];

        include_once '../view/Actividades/updateactividad.php';
    }

    // Actualizar una actividad
    public function postUpdate()
    {
        $id = $_POST['id_actividad'];
        $nombre = $_POST['nombre'];

        $obj = new MasterModel();
        $sql = "UPDATE actividad SET nombre = '$nombre' WHERE id_actividad = $id";
        $ejecutar = $obj->operaciones($sql);

        if ($ejecutar) {
            redirect(getUrl("Actividades", "Actividades", "getAll"));
        } else {
            echo "Error al actualizar la actividad";
        }
    }

    // Eliminar una actividad
    public function postDelete()
    {
        $id = $_GET['id'];

        $obj = new MasterModel();
        $sql = "DELETE FROM actividad WHERE id_actividad = $id";
        $ejecutar = $obj->select($sql);

        if ($ejecutar) {
            redirect(getUrl("Actividades", "Actividades", "getAll"));
        } else {
            echo "Error al eliminar la actividad";
        }
    }


    //Borrado Logico para persistencia de datos alojados en la base de datos en actividades
    public function updateStatus()
    {
        $obj = new UsuarioModel();
        $id = $_GET['id'];
        $sql = "UPDATE actividad SET id_estado=1 WHERE id=$id";
        $ejecutar = $obj->select($sql);

        if ($ejecutar) {
            redirect(getUrl("Acciones", "Acciones", "getAll"));
        } else {
            echo "Hubo un problema al actualizar la actividad.";
        }
    }
}
?>