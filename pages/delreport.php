<?php
if (isset($_POST['btnRemove'])) {
    $conn=mysqli_connect("localhost","root","","beauty");
    $id=$_POST['id'];

    $sql="DELETE FROM `reports` WHERE id='$id'";
    $exec=mysqli_query($conn,$sql);

    if ($exec) {
        header('location:account.php');
    }else{
        echo 'error';
    }
}
if (isset($_POST['btnRemove1'])) {
    $conn=mysqli_connect("localhost","root","","beauty");
    $id=$_POST['id'];

    $sql="DELETE FROM `reports` WHERE id='$id'";
    $exec=mysqli_query($conn,$sql);

    if ($exec) {
        header('location:admin.php');
    }else{
        echo 'error';
    }
}
if (isset($_POST['btnDele'])) {
    $conn=mysqli_connect("localhost","root","","beauty");
    $id=$_POST['id'];

    $sql="DELETE FROM `services` WHERE id='$id'";
    $exec=mysqli_query($conn,$sql);

    if ($exec) {
        header('location:services.php');
    }else{
        echo 'error';
    }
}
?>