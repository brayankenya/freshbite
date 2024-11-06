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
            
        <div class="hflex">
            <form action="add.php" method="POST" class="formAdd" enctype="multipart/form-data">
                <div><h4>Add New Service</h4></div> <hr> <br>
                <div>
                    <input type="text" placeholder="Service" name="service">
                </div>
                <div>
                    <input type="text" placeholder="Price" name="price">
                </div>
                <div>
                    <input type="text" placeholder="description" name="description">
                </div>
                <div>
                    <input type="file" placeholder="description" name="image">
                </div>
                <div><button name="submit">Submit</button></div>
            </form>
        </div>
    </div>
    <?php
        if (isset($_POST['submit']) && isset($_FILES['image'])) {
            $conn=mysqli_connect("localhost","root","","beauty");
           
            $service=$_POST['service'];
            $price=$_POST['price'];
            $descritpion=$_POST['service'];

            $img_name=$_FILES['image']['name'];
            $img_size=$_FILES['image']['size'];
            $tmp_name=$_FILES['image']['tmp_name'];
            $error=$_FILES['image']['error'];
        
            if ($error===0) {
                if ($img_size > 125000) {
                    $em="too large file size";
                }else{
                    $img_ex=pathinfo($img_name,PATHINFO_EXTENSION);
                    $img_ex_lc=strtolower($img_ex);
        
                    $allowed_ext=array("jpg","jpeg","png");
        
                    if (in_array($img_ex_lc,$allowed_ext)) {
                        $my_new_img_name=uniqid("IMG",true).'.'.$img_ex;
                        $img_upload_path='uploads/'.$my_new_img_name;
                        move_uploaded_file($tmp_name,$img_upload_path);
        
                        $sql_insert="INSERT INTO `services`(`id`, `service`, `price`, `description`, `image`) VALUES (null,'$service','$price','$descritpion','$my_new_img_name')";
        
                        $exec=mysqli_query($conn,$sql_insert);
                    
                        if ($exec) {
                            echo 'added success';
                        }else{
                            echo "failed";
                        }
                    }else{
                        $em="file type not allowed";
                    }
                }
        
        
        
        
        }
        }
    ?>
</body>
</html>