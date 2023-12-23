<?php
require_once ("helper/CrudHelper.php");
require_once ("Connection.php");

abstract class Model {
    protected $crudHelper;
    protected $table;

    public function __construct($table) {
        $connection = new Connection();
        $this-> crudHelper = new CrudHelper ($connection->getConnection() );
        $this->table = $table; 
    }

    public function readAll() {
        return $this->crudHelper-> readAll($this->table);
    }

    public function readOne($id) {
        return $this -> crudHelper-> readOne($this->table, "id=$id");
    }

    public function create($data) {
        $this->crudHelper-> create($this->table, $data);
    }

    public function update($data, $id) {
        $this->crudHelper-> update($this->table, $data, "id=$id");
    }

    public function delete($id) {
        $this->crudHelper->delete($this->table, "id=$id");
    }
}
?>