<?php
include '../model/Reportes/ReportesModel.php';





class ReportesController
{
    public function getAll(){
        $obj = new ReportesModel();
        $sql = "SELECT * FROM reportes";
        $reportes = $obj->select($sql);
        include '../view/Reportes/reportes.php';
    }


}



?>