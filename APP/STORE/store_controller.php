<?php
require_once("../../CONFIG/connection.php");
require_once("store_model.php");

$codstore = (isset($_POST['codstore'])) ? $_POST['codstore'] : '';

$store = new Store();

switch ($_GET['op']) {
    case 'enlist':
        $data = $store->getDataStore();
        $dato = Array();

        foreach ($data as $row) {
            $sub_array = array();
        
            $sub_array['CodStore']     = $row['CodStore'];
            $sub_array['DescripStore'] = $row['DescripStore'];

            $dato[] = $sub_array;
        }

        echo json_encode($dato, JSON_UNESCAPED_UNICODE);
        break;

    case 'loaddata':
        $data = $store->getDataWhere($codstore);
        $dato = Array();

        foreach ($data as $row) {
            $sub_array = array();
        
            $sub_array['CodStore']     = $row['CodStore'];
            $sub_array['DescripStore'] = $row['DescripStore'];

            $dato[] = $sub_array;
        }

        echo json_encode($dato, JSON_UNESCAPED_UNICODE);
        break;
}