<?php
require_once("models/CategoryModel.php");

class AdminController extends Controller {
    public function checkLogin() {
        session_start();
        if (!isset($_SESSION["login"])) {
            header("Location: /login");
            return false;
        }else {
            return  true;
        }
    }
    public function logout() {
        session_destroy();
        header("Location: /login");
    }
    

    public function getView() {
        if ($this->checkLogin()) {
            $this->renderView("AdminHome");
        }
    }

    public function getCategoryView() {
        if ($this->checkLogin()) {
            $this->renderView("AdminCategory");
        }
    }

    public function getTagView() {
        if ($this->checkLogin()) {
            $this->renderView("AdminTag");
        }
    }

    public function addCategory($categoryName) {
        $categoryModel = new CategoryModel();
        $categoryModel->create(["name" => $categoryName]);
    }
    public function deleteCategory($categoryId) {
        $categoryModel = new CategoryModel();
        $categoryModel->delete($categoryId);
    }

    public function updateCategory($id, $name) {
        $categoryModel = new CategoryModel();
        if ($name != "") {
            $categoryModel->update(["name" => $name], $id);
        }
    }

    public function addTag($tagName) {
        $tagModel = new TagModel();
        $tagModel->create(["name" => $tagName]);
    }
    public function deleteTag($tagId) {
        $tagModel = new TagModel();
        $tagModel->delete($tagId);
    }

    public function updateTag($id, $name,$status) {
        $tagModel = new TagModel();
        if ($name != "") {
            $tagModel->update(["name" => $name, "status"=>$status], $id);
        }
    }
}

?>