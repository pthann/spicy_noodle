<?php
class CrudHelper
{
    private $db;

    public function __construct($connection) {
        $this->db = $connection;
    }

    public function readAll($table, $condition = "1", $orderBy = "id ASC", $select = "*") {
        $stmt = $this->db->prepare("SELECT $select FROM $table WHERE $condition ORDER BY $orderBy");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function readOne($table, $id, $select = "*") {
        $stmt = $this->db->prepare("SELECT $select FROM $table WHERE id=$id");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($table, $data) {
        $columns = implode(",", array_keys($data));
        $values = ":" . implode(", :", array_keys($data));
        $stmt = $this->db->prepare("INSERT INTO $table ($columns) VALUES ($values)");
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        try {
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function update($table, $data, $whereCondition) {
        $setClause = '';
        foreach ($data as $key => $value) {
            $setClause .= "$key = :$key, ";
        }
        $setClause = rtrim($setClause, ', ');

        $sql = "UPDATE $table SET $setClause WHERE $whereCondition";
        $stmt = $this->db->prepare($sql);

        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        try {
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function delete($table, $whereCondition) {
        $sql = "DELETE FROM $table WHERE $whereCondition";
        $stmt = $this->db->prepare($sql);
        try {
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
