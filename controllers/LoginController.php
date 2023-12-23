<?php
require_once("models/UserModel.php");
class LoginController extends Controller {
    private $errorMessage;
    
    public function __construct(){
        $this->errorMessage = "";
    }
    public function getView() {
        $this->renderView("Login");
    }

    public function processLogin($email, $password){
        $userModel = new UserModel();
        if ($userModel->authenticate($email,$password)) {
            session_start();
            $_SESSION["login"] =  $userModel->getIdFromEmail($email);
            header("Location: /admin");
        } else {
            $this->errorMessage = "Email hoặc Password không chính xác!";
        }
    }

    public function getErrorMessage() {
        return $this->errorMessage;
    }
}
?>