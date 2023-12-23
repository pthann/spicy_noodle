<?php
require_once("models/CategoryModel.php");
$adminController=new AdminController();
$categoryModel = new CategoryModel();
if (isset($_POST["addCategory"])) {
    $adminController->addCategory($_POST["name"]);
}
if (isset($_POST["deleteCategory"])) {
    $adminController->deleteCategory($_POST["id"]);
}
if (isset($_POST["updateCategory"])) {
    $adminController->updateCategory($_POST["id"], $_POST["name"]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <?php 
        include_once("views/components/admin-navigation.php");
    ?>
    <div class="container mt-5">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">
            Thêm danh mục
        </button>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col-6">Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($categoryModel->readAll() as $key => $value) {
                ?>
                    <tr>
                        <th scope="row"><?= $value["id"] ?></th>
                        <td class="col-6"><?= $value["name"] ?></td>
                        <td>
                            <!-- Button trigger modal -->
                            <button onclick='showValueUpdateCategory("<?= $value["id"] ?>","<?= $value["name"] ?>")' type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#updateModal">
                                Cập nhật                           
                            </button>
                            <button onclick='showMessageDeleteCategory("<?= $value["id"] ?>","<?= $value["name"] ?>")' type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                Xóa
                            </button>

                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- Button trigger modal -->

    <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <form action="" method="POST">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="addModalLabel">Thêm Danh mục</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label for="">Tên danh mục:</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                        <button type="submit" name="addCategory" class="btn btn-success"> Thêm</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!--  Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <form action="" method="post">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="deleteModalLabel">Xóa danh mục</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Bạn có chắc chắn xóa danh mục có tên là <span id="categoryNameDelete"></span> ?</p>
                        <input type="hidden" name="id" id="categoryIdDelete">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy bỏ</button>
                        <button type="submit" class="btn btn-danger" name="deleteCategory">Xóa</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- Update Modal -->
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
        <form action="" method="post">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="updateModalLabel">Cập nhật danh mục</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="text" class="form-control" name="name" id="categoryNameUpdate">
                        <input type="hidden" name="id" id="categoryIdUpdate">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-info" name="updateCategory">Cập nhật</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="/views/js/admin.js"></script>
</body>

</html>