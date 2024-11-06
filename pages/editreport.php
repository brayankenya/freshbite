<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../css/global.css">
</head>
<body>
    <div class="">
        <?php include('admin-nav.php')  ?>
            <?php
                if (isset($_POST['btnEdit'])) {
                    $id=$_POST['id'];
                    $service=$_POST['service'];
                    $price=$_POST['price'];
                    $decsription=$_POST['description'];
                }
            ?>
        <div class="hflex">
            <form action="" class="formAdd">
                <div><h4>Edit Service</h4></div> <hr> <br>
                <div>
                    <input type="text" placeholder="Service" name="service" value="<?php echo $service ?>">
                </div>
                <div>
                    <input type="text" placeholder="Price" name="price" value="<?php echo $price ?>">
                </div>
                <div>
                    <input type="text" placeholder="description" name="description" value="<?php echo $decsription ?>">
                </div>
                <div><button name="bntUpdate">Submit</button></div>
            </form>
        </div>
    </div>
    <?php
        if (isset($_POST['bntUpdate'])) {
            $conn=mysqli_connect("localhost","root","","beauty");
            $sql="UPDATE `reports` SET `id`='[value-1]',`service`='',`price`='',`description`='',`name`='',`date`='' WHERE 1";
        }
    ?>
</body>
</html>