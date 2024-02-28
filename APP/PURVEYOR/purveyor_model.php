<?php
date_default_timezone_set('America/Caracas');
require_once("../../CONFIG/connection.php");

final class Purveyor extends Conectar{

    public function getDataPurv(){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();

        //QUERY

            $sql="SELECT CodPurv, DescriPurv, CodPurv1 FROM BIASPURVEYOR";

        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        
    }

    public function countData($codpurv){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();

        //QUERY

            $sql="SELECT COUNT(*) AS N FROM BIASPURVEYOR WHERE CodPurv = ?";

        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $codpurv);
        $sql->execute();
        return ($sql->fetch(PDO::FETCH_ASSOC)['N']);
        
    }

    public function saveData($statpurv,$typpurv,$typcpurv,$descripurv,$codpurv1,$codlaepurv,$addrespurv,$phonepurv,$emailpurv){

        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION
        //CUANDO ES APPWEB ES CONEXION.
		$conectar= parent::conexion();
		parent::set_names();

 		//QUERY

			$sql="INSERT INTO BIASPURVEYOR (StatPurv, TypPurv, TypCPurv, DescriPurv, CodPurv1, CodLAEPurv, AddresPurv, PhonePurv, EmailPurv, DateCreate) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

		//PREPARACION DE LA CONSULTA PARA EJECUTARLA.
		$sql = $conectar->prepare($sql);
        $sql->bindValue(1, $statpurv);
        $sql->bindValue(2, $typpurv);
        $sql->bindValue(3, $typcpurv);
        $sql->bindValue(4, $descripurv);
        $sql->bindValue(5, $codpurv1);
        $sql->bindValue(6, $codlaepurv);
        $sql->bindValue(7, $addrespurv);
        $sql->bindValue(8, $phonepurv);
        $sql->bindValue(9, $emailpurv);
        $sql->bindValue(10, date('Y-m-d H:i:s'));
		return $sql->execute();

	}
    
    public function getDataWhere($codpurv){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();

        //QUERY

            $sql="SELECT * FROM BIASPURVEYOR WHERE CodPurv = ?";

        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $codpurv);
        $sql->execute();
        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    
    }

    public function updateData($codpurv,$statpurv,$typpurv,$typcpurv,$descripurv,$codpurv1,$codlaepurv,$addrespurv,$phonepurv,$emailpurv){

        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION
        //CUANDO ES APPWEB ES CONEXION.
		$conectar= parent::conexion();
		parent::set_names();

 		//QUERY

			$sql="UPDATE BIASPURVEYOR SET StatPurv = ?, TypPurv = ?, TypCPurv = ?, DescriPurv = ?, CodPurv1 = ?, CodLAEPurv = ?, AddresPurv = ?, PhonePurv = ?, EmailPurv = ?, LastDate = ?  WHERE CodPurv = ?";

		//PREPARACION DE LA CONSULTA PARA EJECUTARLA.
		$sql = $conectar->prepare($sql);
        $sql->bindValue(1, $statpurv);
        $sql->bindValue(2, $typpurv);
        $sql->bindValue(3, $typcpurv);
        $sql->bindValue(4, $descripurv);
        $sql->bindValue(5, $codpurv1);
        $sql->bindValue(6, $codlaepurv);
        $sql->bindValue(7, $addrespurv);
        $sql->bindValue(8, $phonepurv);
        $sql->bindValue(9, $emailpurv);
        $sql->bindValue(10, date('Y-m-d H:i:s'));
        $sql->bindValue(11, $codpurv);
		return $sql->execute();

	}

    public function deleteData($codpurv){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();

        //QUERY

            $sql="DELETE FROM BIASPURVEYOR WHERE CodPurv = ?";

        
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $codpurv);
        $sql->execute();

        return $sql;

    }
}
