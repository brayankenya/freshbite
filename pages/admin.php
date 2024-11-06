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
        <section class="flex-dash">
            <div class="usersDiv">
                <div class="userTXT">
                    <strong>Users</strong>
                </div>
                <?php
                         $conn=mysqli_connect("localhost","root","","beauty");
                         $sql="SELECT * FROM `users` WHERE 1";
                         $exec=mysqli_query($conn,$sql);

                         $count=mysqli_num_rows($exec);

                         if ($count==0) {
                            # code...
                         }else{
                            while ($row=mysqli_fetch_array($exec)) {
                                $id=$row['id'];
                                $name=$row['name'];
                                
                    ?>
                <div class="card-user">
                    <strong><?php echo $name ?></strong>
                </div>
                <?php }}?>
            </div>
            <div class="reportsDiv">
                <div class="dashboard-top flextop">
                    <div><h2>DASHBOARD </h2> | <small> Reports</small></div>
                    <div><a href="pdf.php"><button>generate report</button></a></div>
                </div>
                <table class="tableService tb-100">
                <thead>
                    <th>Name</th>
                    <th>Service</th>
                    <th>Price</th>
                    <th>Date</th>
                    <th>Delete</th>
                </thead>
                <tbody>
                <?php
                         $conn=mysqli_connect("localhost","root","","beauty");
                         $sql="SELECT * FROM `reports` WHERE 1";
                         $exec=mysqli_query($conn,$sql);

                         $count=mysqli_num_rows($exec);

                         if ($count==0) {
                            # code...
                         }else{
                            while ($row=mysqli_fetch_array($exec)) {
                                $id=$row['id'];
                                $service=$row['service'];
                                $price=$row['price'];
                                $name=$row['name'];
                                $date=$row['date'];
                    ?>
                    <tr>
                        <td><?php echo $name ?></td>
                        <td><?php echo $service ?></td>
                        <td>Ksh.<?php echo $price?></td>
                        <td><?php echo $date ?></td>
                        <td>
                            <form action="delreport.php" method="post">
                                <input type="hidden" value="<?php echo $id?>" name="id">
                                <button
                                 name="btnRemove1">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php }}?>
                </tbody>
            </table>
            </div>
        </section>
    </div>
</body>
</html>