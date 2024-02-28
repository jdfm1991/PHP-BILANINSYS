<?php
require_once("../../CONFIG/connection.php");
require_once("supplies_model.php");

$codact     = (isset($_POST['codact'])) ? $_POST['codact'] : '';
$descripact = (isset($_POST['descripact'])) ? $_POST['descripact'] : '';
$refeact    = (isset($_POST['refeact'])) ? $_POST['refeact'] : '';
$codcact    = (isset($_POST['codcact'])) ? $_POST['codcact'] : '';
$codtact    = (isset($_POST['codtact'])) ? $_POST['codtact'] : '';
$codtund    = (isset($_POST['codtund'])) ? $_POST['codtund'] : '';
$countact   = (isset($_POST['countact'])) ? $_POST['countact'] : '';


$act = new Acticves();

switch ($_GET['op']) {
    case 'enlist':
        $data = $act->getDataAct();
        $dato = Array();

        foreach ($data as $row) {
            $sub_array = array();
        
            $sub_array['CodAct']     = $row['CodAct'];
            $sub_array['DescripAct'] = $row['DescripAct'];
            $sub_array['RefeAct']    = $row['RefeAct'];

            $dato[] = $sub_array;
        }

        echo json_encode($dato, JSON_UNESCAPED_UNICODE);
        break;
    
    case 'loaddata':
        $data = $act->getDataWhere($codact);
        $dato = Array();

        foreach ($data as $row) {
            $sub_array = array();
        
            $sub_array['CodAct']     = $row['CodAct'];
            $sub_array['CodTAct']    = $row['CodTAct'];
            $sub_array['CodCAct']    = $row['CodCAct'];
            $sub_array['CodTUnd']    = $row['CodTUnd'];
            $sub_array['DescripAct'] = $row['DescripAct'];
            $sub_array['CostAct']    = number_format($row['CostAct'], 2, '.', '');
            $sub_array['Exempt']     = $row['Exempt'];
            $sub_array['DateCreate'] = $row['DateCreate'];
            $sub_array['RefeAct']    = $row['RefeAct'];

            $dato[] = $sub_array;
        }

        echo json_encode($dato, JSON_UNESCAPED_UNICODE);
        break;

    case 'getcategory':
        $data = $act->getDataCat();
        $dato = Array();

        foreach ($data as $row) {
            $sub_array = array();
        
            $sub_array['CodCAct']     = $row['CodCAct'];
            $sub_array['DescripCAct'] = $row['DescripCAct'];

            $dato[] = $sub_array;
        }

        echo json_encode($dato, JSON_UNESCAPED_UNICODE);
        break;

    case 'gettunid':
        $data = $act->getDataUnd();
        $dato = Array();

        foreach ($data as $row) {
            $sub_array = array();
        
            $sub_array['CodTUnd']     = $row['CodTUnd'];
            $sub_array['DescripTUnd'] = $row['DescripTUnd'];

            $dato[] = $sub_array;
        }

        echo json_encode($dato, JSON_UNESCAPED_UNICODE);
        break;

    case 'gettype':
        $data = $act->getDataType();
        $dato = Array();

        foreach ($data as $row) {
            $sub_array = array();
        
            $sub_array['CodTAct']     = $row['CodTAct'];
            $sub_array['DescripTAct'] = $row['DescripTAct'];

            $dato[] = $sub_array;
        }

        echo json_encode($dato, JSON_UNESCAPED_UNICODE);
        break;

    case 'savedata':
        $data = $act->countData($codact);

        if ($data == 0) {
            $data1 = $act->saveData($descripact,$refeact,$codcact,$codtact,$codtund);
            if ($data1) {
                $output = [
                    "status" => "Guardar",
                ];
            } else {
                $output = [
                    "status" => "Error Guardar",
                ];
            }
             
        } else {
            $data1 = $act->updateData($codact,$descripact,$refeact,$codcact,$codtact,$codtund);
            if ($data1) {
                $output = [
                    "status" => "Actualizar",
                ];
            } else {
                $output = [
                    "status" => "Error Actualizar",
                ];
            }
        }

        echo json_encode($output);
        break;

    case 'deletedata':
        $data = $act->deleteData($codact);

        if ($data) {
            $output = [
                "status" => "Eliminar",
            ];
        } else {
            $output = [
                "status" => "Error Eliminar",
            ];
        }

        echo json_encode($output);
        break;

    case 'dataglobal':
        $subt1 = 0;
        $iva1 = 0;
        $total1 = 0;
        $subt2 = 0;
        $iva2 = 0;
        $total2 = 0;
        $cantidad = 0;
        //$codact =[1,8,9,10];
        //$countact =[5,5,5,5];
        $n = count($codact);
        for ($i=0; $i < $n ; $i++) { 
            $subd1 = $codact[$i];
            $subd2 = $countact[$i];
            $data = $act->getDataWhere($subd1);
            $dato = Array();

            $coda = $data[0]["CodAct"];
            $exem = $data[0]["Exempt"];
            $cost = $data[0]["CostAct"];

            $sub_array = array();

            
                if ($exem == 1) {
                    $subt1  += ($cost*$subd2);
                    
                } 
    
                if ($exem == 0) {
                    $subt2  += ($cost*$subd2);
                }

            $cantidad += $subd2;
            $subtotal = $subt1+$subt2;
            $impuesto = $subt1*0.16;
            $total = $subtotal+$impuesto;
            

            $sub_array['subt']  = number_format(($subtotal), 2, '.', '');
            $sub_array['iva']   = number_format(($impuesto), 2, '.', '');
            $sub_array['total'] = number_format(($total), 2, '.', '');
            $sub_array['cantidad'] = $cantidad;


            $dato[] = $sub_array;
            
        }
        
        
        echo json_encode($dato, JSON_UNESCAPED_UNICODE);
        break;
        
}