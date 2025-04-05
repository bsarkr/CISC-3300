<?php

namespace app\models;

use PDO;
use PDOException;

abstract class Model {

    public function findAll() {
        $query = "select * from $this->table";
        return $this->fetchAll($query);
    }

    private function connect() {
        $string = "mysql:hostname=" . DBHOST . ";dbname=" . DBNAME;
        $con = new PDO($string, DBUSER, DBPASS);
        return $con;
    }

    public function query($query, $data = []) {
        $con = $this->connect();
        $stm = $con->prepare($query);
        $check = $stm->execute($data);
        if ($check) {
            //return as an associated array
            $result = $stm->fetchAll(PDO::FETCH_ASSOC);
            if (is_array($result) && count($result)) {
                return $result;
            }
        }
        return false;
    }

    public function fetch($query) {
        $connectedPDO = $this->connect();
        $statementObject = $connectedPDO->query($query);
        //no params, one row
        return $statementObject->fetch();
    }

    public function fetchAll($query) {
        $connectedPDO = $this->connect();
        $statementObject = $connectedPDO->query($query);
        //no params, multiple rows
        return $statementObject->fetchAll();
    }

    //this one uses prepared statements!
    public function fetchAllWithParams($query, $data = []) {
        $connection = $this->connect();
        //prepare statement - a query with any dynamic data subbed out with variables like :firstName
        $statementObject = $connection->prepare($query);
        //data is an associative array with key value pairs matching any params in the query
        $successOrFail = $statementObject->execute($data);
        if ($successOrFail) {
            $result = $statementObject->fetchAll();
            if (is_array($result) && count($result)) {
                return $result;
            }
        }
        return false;
    }

}