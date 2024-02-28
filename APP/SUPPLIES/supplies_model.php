<?php
date_default_timezone_set('America/Caracas');
require_once("../../CONFIG/connection.php");

class Acticves extends Conectar{

    public function getDataAct(){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();

        //QUERY

            $sql="SELECT CodAct, DescripAct, RefeAct FROM BIASACTIVES";

        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        
    }

    public function getDataWhere($codact){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();

        //QUERY

            $sql="SELECT * FROM BIASACTIVES WHERE CodAct = ?";

        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $codact);
        $sql->execute();
        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    
    }

    public function getDataWhereIn($codact){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();

        //QUERY

            $sql="SELECT * FROM BIASACTIVES WHERE CodAct IN ( ? )";

        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $codact);
        $sql->execute();
        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    
    }

    public function getDataCat(){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();

        //QUERY

            $sql="SELECT * FROM BIASCACTIVES";

        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        
    }

    public function getDataUnd(){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();

        //QUERY

            $sql="SELECT * FROM BIASTUND";
        
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        
    }

    public function getDataType(){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();

        //QUERY

            $sql="SELECT * FROM BIASTACTIVES";
        
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        
    }

    public function countData($codact){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();

        //QUERY

            $sql="SELECT COUNT(*) AS N FROM BIASACTIVES WHERE CodAct = ?";

        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $codact);
        $sql->execute();
        return ($sql->fetch(PDO::FETCH_ASSOC)['N']);
        
    }

    public function saveData($descripact,$refeact,$codcact,$codtact,$codtund){

        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION
        //CUANDO ES APPWEB ES CONEXION.
		$conectar= parent::conexion();
		parent::set_names();

 		//QUERY

			$sql="INSERT INTO BIASACTIVES (DescripAct, RefeAct, CodCAct, CodTAct, CodTUnd, DateCreate) VALUES (?, ?, ?, ?, ?, ?)";

		//PREPARACION DE LA CONSULTA PARA EJECUTARLA.
		$sql = $conectar->prepare($sql);
        $sql->bindValue(1, $descripact);
        $sql->bindValue(2, $refeact);
        $sql->bindValue(3, $codcact);
        $sql->bindValue(4, $codtact);
        $sql->bindValue(5, $codtund);
        $sql->bindValue(6, date('Y-m-d H:i:s'));
		return $sql->execute();

	}

    public function updateData($codact,$descripact,$refeact,$codcact,$codtact,$codtund){

        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION
        //CUANDO ES APPWEB ES CONEXION.
		$conectar= parent::conexion();
		parent::set_names();

 		//QUERY

			$sql="UPDATE BIASACTIVES SET DescripAct = ?, RefeAct = ?, CodCAct = ?, CodTAct = ?, CodTUnd = ?, LastDate = ? WHERE CodAct = ?";

		//PREPARACION DE LA CONSULTA PARA EJECUTARLA.
		$sql = $conectar->prepare($sql);
        $sql->bindValue(1, $descripact);
        $sql->bindValue(2, $refeact);
        $sql->bindValue(3, $codcact);
        $sql->bindValue(4, $codtact);
        $sql->bindValue(5, $codtund);
        $sql->bindValue(6, date('Y-m-d H:i:s'));
        $sql->bindValue(7, $codact);
		return $sql->execute();

	}

    public function deleteData($codact){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();

        //QUERY

            $sql="DELETE FROM BIASACTIVES WHERE CodAct = ?";

        
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $codact);
        $sql->execute();

        return $sql;

    }

}
