<?php
require_once("models/Model.php");

class OrderModel extends Model {

    public function __construct() {
        parent::__construct( "order");
    }
}
?>