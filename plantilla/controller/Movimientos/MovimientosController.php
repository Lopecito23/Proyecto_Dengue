<?php



include_once '../model/MasterModel.php';

class MovimientosController
{

    public function getAll()
    {
        $obj = new MasterModel();
    

        include_once '../view/Movimientos/createMovimiento.php';
    }
}


?>