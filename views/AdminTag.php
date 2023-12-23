<?php
require_once("models/TagModel.php");
$adminController=new AdminController();
$tagModel = new TagModel();
if (isset($_POST["addTag"])) {
    $adminController->addTag($_POST["name"]);
}
if (isset($_POST["deleteTag"])) {
    $adminController->deleteTag($_POST["id"]);
}
if (isset($_POST["updateTag"])) {
    $adminController->updateTag($_POST["id"], $_POST["name"],$_POST["status"]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <?php 
        include_once("views/components/admin-navigation.php");
    ?>
    <div class="container mt-5">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">
            Add table
        </button>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($tagModel->readAll() as $key => $value) {
                ?>
                    <tr>
                        <th scope="row"><?= $value["id"] ?></th>
                        <td> <?= $value["name"] ?></td>
                        <td> <?= $value["status"] ?></td>
                        <td>
                            <!-- Button trigger modal -->
                            <button onclick='showValueUpdateTag("<?= $value["id"] ?>","<?= $value["name"] ?>", "<?= $value["status"] ?>")' type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#updateModal">
                                Update                          
                            </button>
                            <button onclick='showMessageDeleteTag("<?= $value["id"] ?>","<?= $value["name"] ?>")' type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                Delete
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
                        <h1 class="modal-title fs-5" id="addModalLabel">Add table</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" name="addTag" class="btn btn-success"> Add</button>
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
                        <h1 class="modal-title fs-5" id="deleteModalLabel">Delete Table</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure delete table no.<span id="tagNameDelete"></span> ?</p>
                        <input type="hidden" name="id" id="tagIdDelete">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger" name="deleteTag">Delete</button>
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
                        <h1 class="modal-title fs-5" id="updateModalLabel">Update table</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="text" class="form-control" name="name" id="tagNameUpdate">
                        <input type="text" class="form-control" name="status" id="tagStatusUpdate">
                        <input type="hidden" name="id" id="tagIdUpdate">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-info" name="updateTag">Update</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="/views/js/admin.js"></script>
</body>

</html>