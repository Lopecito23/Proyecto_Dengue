<?php
include_once '../model/MasterModel.php';

class TanquesController
{
    public function getAll()
    {
        $obj = new MasterModel();

        $sql = "
            SELECT 
                t.*,
                z.direccion AS zoo_direccion,
                tt.nombre   AS tipo_nombre,
                e.nombre_estado
            FROM tanques t
            INNER JOIN zoocriadero z 
                ON t.id_zoo = z.id_zoocriadero
            INNER JOIN tipo_tanque tt 
                ON t.id_tipo_tanque = tt.id
            INNER JOIN estados_zoocriadero_tanque e 
                ON t.id_estado = e.id_estado
            ORDER BY t.id
        ";

        $tanquesResult = $obj->select($sql);
        $tanques = $tanquesResult ? pg_fetch_all($tanquesResult) : [];

        include_once '../view/Tanques/listtanque.php';
    }

    public function getCreate()
    {
        $obj = new MasterModel();

        $tiposResult = $obj->select("SELECT id, nombre FROM tipo_tanque ORDER BY nombre");
        $tipos = $tiposResult ? pg_fetch_all($tiposResult) : [];

        $estadosResult = $obj->select("SELECT id_estado, nombre_estado FROM estados_zoocriadero_tanque ORDER BY nombre_estado");
        $estados = $estadosResult ? pg_fetch_all($estadosResult) : [];

        $zoosResult = $obj->select("SELECT id_zoocriadero, direccion FROM zoocriadero ORDER BY direccion");
        $zoos = $zoosResult ? pg_fetch_all($zoosResult) : [];

        include_once '../view/Tanques/createTanques.php';
    }

    public function postCreate()
    {
        $id_zoo = $_POST['id_zoo'];
        $nombre = $_POST['nombre'];
        $alto = $_POST['medidas_alto'];
        $ancho = $_POST['medidas_ancho'];
        $profundo = $_POST['medidas_profundo'];
        $id_tipo = $_POST['id_tipo_tanque'];
        $cantidad = $_POST['cantidad_peces'];
        $id_estado = $_POST['id_estado'];

        $obj = new MasterModel();
        $id = $obj->autoIncrement("tanques", "id");

        $sql = "
            INSERT INTO tanques
            (id, id_zoo, nombre, medidas_alto, medidas_ancho, medidas_profundo,
             id_tipo_tanque, cantidad_peces, id_estado)
            VALUES
            ($id, $id_zoo, '$nombre', $alto, $ancho, $profundo,
             $id_tipo, $cantidad, $id_estado)
        ";

        $ejecutar = $obj->insert($sql);

        if ($ejecutar) {
            redirect(getUrl('Tanques', 'Tanques', 'getAll'));
        } else {
            echo 'Error al crear el tanque';
        }
    }

    public function getUpdate()
    {
        $id = $_GET['id'];
        $obj = new MasterModel();

        $sql = "SELECT * FROM tanques WHERE id = $id";
        $res = $obj->select($sql);

        if ($res && pg_num_rows($res) > 0) {
            $tanque = pg_fetch_assoc($res);
        } else {
            $tanque = null;
        }

        $tiposResult = $obj->select("SELECT id, nombre FROM tipo_tanque ORDER BY nombre");
        $tipos = $tiposResult ? pg_fetch_all($tiposResult) : [];

        $estadosResult = $obj->select("SELECT id_estado, nombre_estado FROM estados_zoocriadero_tanque ORDER BY nombre_estado");
        $estados = $estadosResult ? pg_fetch_all($estadosResult) : [];

        $zoosResult = $obj->select("SELECT id_zoocriadero, direccion FROM zoocriadero ORDER BY direccion");
        $zoos = $zoosResult ? pg_fetch_all($zoosResult) : [];

        include_once '../view/Tanques/updatetanque.php';
    }

    public function postUpdate()
    {
        $id = $_POST['id'];
        $id_zoo = $_POST['id_zoo'];
        $nombre = $_POST['nombre'];
        $alto = $_POST['medidas_alto'];
        $ancho = $_POST['medidas_ancho'];
        $profundo = $_POST['medidas_profundo'];
        $id_tipo = $_POST['id_tipo_tanque'];
        $cantidad = $_POST['cantidad_peces'];
        $id_estado = $_POST['id_estado'];

        $obj = new MasterModel();

        $sql = "
            UPDATE tanques SET
                id_zoo          = $id_zoo,
                nombre          = '$nombre',
                medidas_alto    = $alto,
                medidas_ancho   = $ancho,
                medidas_profundo= $profundo,
                id_tipo_tanque  = $id_tipo,
                cantidad_peces  = $cantidad,
                id_estado       = $id_estado
            WHERE id = $id
        ";

        $ejecutar = $obj->update($sql);

        if ($ejecutar) {
            redirect(getUrl('Tanques', 'Tanques', 'getAll'));
        } else {
            echo 'Error al actualizar el tanque';
        }
    }

    public function getDelete()
    {
        $id = $_GET['id'];
        $obj = new MasterModel();

        $sql = "DELETE FROM tanques WHERE id = $id";
        $ejecutar = $obj->delete($sql);

        if ($ejecutar) {
            redirect(getUrl('Tanques', 'Tanques', 'getAll'));
        } else {
            echo 'Error al eliminar el tanque';
        }
    }
}
?>