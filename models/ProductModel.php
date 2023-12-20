<?php
require_once("models/Model.php");

class ProductModel extends Model {

    public function __construct() {
        parent::__construct( "product");
    }
}
?>