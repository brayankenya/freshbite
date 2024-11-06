<link rel="stylesheet" href="../css/global.css">
<?php
session_start();
if (isset($_POST['bookNow'])) {
    $conn=mysqli_connect("localhost","root","","beauty");
    $service=$_POST['service'];
    $price=$_POST['price'];
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $date=$_POST['date'];
    $description=$_POST['description'];
 

    $sql="INSERT INTO `reports`(`id`, `service`, `price`, `description`, `name`, `date`) VALUES (null,'$service','$price','$description','$name','$date')";
    $exc=mysqli_query($conn,$sql);

    if ($exc) {
        echo '
        <div class="pop-contaner" id="pop">
                        <div class="popBup">
                            <center>
                                <div>Suucess!</div>
                                <div>Booking successfull</div><br>
                                <div><a href="account.php"><button class="btnDone">Done</button></a></div>
                            </center>
                            </div>
                        </div>
        ';
    }else{
        echo 'error';
    }
}

?>