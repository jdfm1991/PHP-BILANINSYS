<?php
date_default_timezone_set('America/Caracas');
require_once("../../CONFIG/connection.php");

final class Store extends Conectar{

    public function getDataStore(){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();

        //QUERY

            $sql="SELECT CodStore, DescripStore FROM BIASSTORE";

        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        
    }

    public function getDataWhere($store){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();

        //QUERY

            $sql="SELECT * FROM BIASSTORE WHERE CodStore = ?";

        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $store);
        $sql->execute();
        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    
    }
    
}
