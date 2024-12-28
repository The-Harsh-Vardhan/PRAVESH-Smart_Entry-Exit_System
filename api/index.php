<?php
session_start();
if (!isset($_SESSION['Admin-name'])) {
  header("location: login.php");
}
?>

<?php include 'test_data.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Users</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="images/favicon.png">

    <script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="css/Users.css">
    <script>
      $(window).on("load resize ", function() {
        var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
        $('.tbl-header').css({'padding-right':scrollWidth});
    }).resize();
    </script>
</head>
<!--  -->
<body style="background: #F2C464; margin: 10; padding: 10;">
<div style="display: flex; min-height: 100vh;background: #F2C464;">
    <div style="background-color: #eda200; padding: 20px;">
        <?php include 'header.php'; ?>
    </div>

    <main style="flex-grow: 1; padding: 0;margin:0px;">
        <section>
        <div class="header">
          <div class="logo">
            <a href="index.php">PRAVESH - RFID Attendance</a>
          </div>
        </div>
<!--  -->
  <h1 class="slideInDown animated">Here are all the Users</h1>
  <!--User table-->
  <div class="table-responsive slideInRight animated" style="max-height: 400px;background-color: #F2C464;"> 
    <table class="table">
      <thead class="table-primary">
        <tr style="background-color: #F2C464;">
        <th>ID</th>                           <th>UID</th>
<th>NAME</th>                        <th>EMAIL</th>

        </tr>
      </thead>
      <tbody class="table-secondary" style = "">
        <?php
          //Connect to database
          require'connectDB.php';

            $sql = "SELECT * FROM students WHERE add_card=1 ORDER BY id ASC";
            $result = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($result, $sql)) {
                echo '<p class="error">SQL Error</p>';
            }
            else{
                mysqli_stmt_execute($result);
                $resultl = mysqli_stmt_get_result($result);
              if (mysqli_num_rows($resultl) > 0){
                  while ($row = mysqli_fetch_assoc($resultl)){
          ?>
                      <TR style="background: #eda200; border:white">
                                        <TD><?php echo $row['id'];?></TD>
                                        <TD><?php echo $row['device_uid'];?></TD>
                                        <TD><?php echo $row['username'];?></TD>
                                        <TD><?php echo $row['email'];?></TD>
                                    </TR>
        <?php
                }   
            }
          }
        ?>
      </tbody>
    </table>
  </div>
</section>
</main>
</body>
</html>