<?php
require_once("../../CONFIG/connection.php");
require_once("purveyor_model.php");

$codpurv    = (isset($_POST['codpurv'])) ? $_POST['codpurv'] : '';
$statpurv   = (isset($_POST['statpurv'])) ? $_POST['statpurv'] : '';
$typpurv    = (isset($_POST['typpurv'])) ? $_POST['typpurv'] : '';
$typcpurv   = (isset($_POST['typcpurv'])) ? $_POST['typcpurv'] : '';
$descripurv = (isset($_POST['descripurv'])) ? $_POST['descripurv'] : '';
$codpurv1   = (isset($_POST['codpurv1'])) ? $_POST['codpurv1'] : '';
$codlaepurv = (isset($_POST['codlaepurv'])) ? $_POST['codlaepurv'] : '';
$addrespurv = (isset($_POST['addrespurv'])) ? $_POST['addrespurv'] : '';
$phonepurv  = (isset($_POST['phonepurv'])) ? $_POST['phonepurv'] : '';
$emailpurv  = (isset($_POST['emailpurv'])) ? $_POST['emailpurv'] : '';

$purv = new Purveyor();

switch ($_GET['op']) {
    case 'enlist':
        $data = $purv->getDataPurv();
        $dato = Array();

        foreach ($data as $row) {
            $sub_array = array();
        
            $sub_array['CodPurv']    = $row['CodPurv'];
            $sub_array['DescriPurv'] = $row['DescriPurv'];
            $sub_array['CodPurv1']   = $row['CodPurv1'];

            $dato[] = $sub_array;
        }

        echo json_encode($dato, JSON_UNESCAPED_UNICODE);
        break;

    case 'savedata':
        $data = $purv->countData($codpurv);

        if ($data == 0) {
            $data1 = $purv->saveData($statpurv,$typpurv,$typcpurv,$descripurv,$codpurv1,$codlaepurv,$addrespurv,$phonepurv,$emailpurv);
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
            $data1 = $purv->updateData($codpurv,$statpurv,$typpurv,$typcpurv,$descripurv,$codpurv1,$codlaepurv,$addrespurv,$phonepurv,$emailpurv);
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

    case 'loaddata':
        $data = $purv->getDataWhere($codpurv);
        $dato = Array();

        foreach ($data as $row) {
            $sub_array = array();
        
            $sub_array['CodPurv']    = $row['CodPurv'];
            $sub_array['StatPurv']   = $row['StatPurv'];
            $sub_array['TypPurv']    = $row['TypPurv'];
            $sub_array['TypCPurv']   = $row['TypCPurv'];
            $sub_array['DescriPurv'] = $row['DescriPurv'];
            $sub_array['CodPurv1']   = $row['CodPurv1'];
            $sub_array['CodLAEPurv'] = $row['CodLAEPurv'];
            $sub_array['AddresPurv'] = $row['AddresPurv'];
            $sub_array['PhonePurv']  = $row['PhonePurv'];
            $sub_array['EmailPurv']  = $row['EmailPurv'];
            $sub_array['DateCreate'] = $row['DateCreate'];

            $dato[] = $sub_array;
        }

        echo json_encode($dato, JSON_UNESCAPED_UNICODE);
        break;

    case 'deletedata':
        $data = $purv->deleteData($codpurv);

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
}