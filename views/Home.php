<?php
require_once("models/CategoryModel.php");
$title = "Home";
$categoryModel = new CategoryModel();
?>
<!DOCTYPE html>
<html lang="en">
<?php
include_once('views/components/head.php');
?>

<body>

    <?php
    include_once('views/components/header.php');
    ?>

    <div class="groupImg1Homepage">
        <img class="imageOfHomePage" src="https://micayhothot.vn/wp-content/uploads/2021/01/126284597_2782411405364385_2974907809222406954_o.jpg" alt="Image">
        <h1 class="welcome">Welcome To<br>HOT HOT Spicy Noodles Restaurant</h1>
    </div>

    <div>
        <h2>Restaurant space</h2>
        <img class="imageOfHomePage" src="https://cdn.hanamihotel.com/wp-content/uploads/2022/10/my-cay-hot-hot-phan-tu-1.jpg" alt=""><br>
        <img class="imageOfHomePage" src="https://micayhothot.vn/wp-content/uploads/2021/01/126284597_2782411405364385_2974907809222406954_o.jpg" alt=""><br>
        <h2>Food and drinks</h2>
    </div>
    <div class="foodHomepage1">
        <ul class="groupImageHomePage1">
            <li class="imageFoodOfHome"><img src="../partials/image/imageSpicyFriedFishBallNoodles.png" alt="Spicy fried fish ball noodles"><br> <b>Spicy fried fish ball noodles</b></li>
            <?php 
                foreach($categoryModel->readAll() as $key=>$value) {
                    echo "<li class=\"imageFoodOfHome\">".$value["name"]."</li>";
                }
            ?>
        </ul>
    </div>
    <div class="foodHomepage2">
        <ul class="groupImageHomePage2">
            <li class="imageFoodOfHome"><img src="../partials/image/imageSweetPotatoFries.png" alt="Sweet potato fries"><br><b>Sweet potato fries</b></li>

        </ul>
    </div>
    <?php
    include_once('views/components/footer.php');
    ?>
</body>

</html>