<?php  session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beuty SPA | Dashboard</title>
    <link rel="stylesheet" href="../css/global.css">
    <style>
    a {
        text-decoration: none;
        color: white;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="box2">
            <?php include('navbar.php') ?>
            <div class="box-main">
                <div class="posBox-container" id="posContainer">
                <?php
                         $conn=mysqli_connect("localhost","root","","beauty");
                         $sql="SELECT * FROM `services` WHERE 1";
                         $exec=mysqli_query($conn,$sql);

                         $count=mysqli_num_rows($exec);

                         if ($count==0) {
                            # code...
                         }else{
                            while ($row=mysqli_fetch_array($exec)) {
                                $id=$row['id'];
                                $service=$row['service'];
                                $price=$row['price'];
                                $description=$row['description'];
                                $image=$row['image'];
                    ?>
                       <form action="subform.php" method="POST" class="container-item">
                            <div class="imgDiv">
                                <img src="uploads/<?php echo $image ?>" alt="" class="img">
                            </div>
                            <div>
                                <div><strong><h2><?php echo $service ?></h2></strong></div>
                                <div><small><b>Price :</b><?php echo $price ?>. </small></div>
                                <div><small><?php echo $description ?></small></div>
                                <br>
                                <input type="hidden"  name="service" value="<?php echo $service ?>">
                                <input type="hidden"  name="price" value="<?php echo $price ?>">
                                <input type="hidden" name="description" value="<?php echo $description ?>">
                                <div>
                                    <button class="btnBook" name="btnBook1">book now</button>
                                </div>
                            </div>
                            <div>
                          
                                <small>...</small>
                            </div>
                            </form>
                        <?php }}?>
                        
                        
                </div>
            </div>
        </div>
    </div>
    <script>
        function showPop(){
            pop.classList.remove('hidden');
        }
    </script>
</body>

</html>