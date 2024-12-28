<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel='stylesheet' type='text/css' href="css/bootstrap.css"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/header.css"/>
</head>

<style>
		.button {
			display: flex;
			align-items: center;
			background-color: #F2C464; /* Default Background color */
			color: black;
			padding: 8px 8px;
			text-decoration: none;
			border-radius: 7px;
			transition: background-color 0.3s;
			border: 3px solid black;
		}

		.button:hover {
			background-color: #eda200; /* Background color on hover */
		}
</style>

<header>

<?php  
  if (isset($_GET['error'])) {
		if ($_GET['error'] == "wrongpasswordup") {
			echo '	<script type="text/javascript">
					 	setTimeout(function () {
			                $(".up_info1").fadeIn(200);
			                $(".up_info1").text("The password is wrong!!");
			                $("#admin-account").modal("show");
		              	}, 500);
		              	setTimeout(function () {
		                	$(".up_info1").fadeOut(1000);
		              	}, 3000);
					</script>';
		}
	} 
	if (isset($_GET['success'])) {
		if ($_GET['success'] == "updated") {
			echo '	<script type="text/javascript">
			 			setTimeout(function () {
			                $(".up_info2").fadeIn(200);
			                $(".up_info2").text("Your Account has been updated");
              			}, 500);
              			setTimeout(function () {
                			$(".up_info2").fadeOut(1000);
              			}, 3000);
					</script>';
		}
	}
	if (isset($_GET['login'])) {
	    if ($_GET['login'] == "success") {
	      echo '<script type="text/javascript">
	              
	              setTimeout(function () {
	                $(".up_info2").fadeIn(200);
	                $(".up_info2").text("You successfully logged in");
	              }, 500);

	              setTimeout(function () {
	                $(".up_info2").fadeOut(1000);
	              }, 4000);
	            </script> ';
	    }
	  }
?>
<div class="topnav" id="myTopnav" style="background: #eda200;">

<!-- Start of Navbar Buttons -->

<h2 style="font-size: 18px; margin-bottom: 5px; margin-left: 15px;">
		Admin Name
		</h2>
		<p style="font-size: 14px; margin-bottom: 5px; margin-left: 15px;">
			admin
		</p>

		<img src="Logo1.png" style="width: 12rem; height: 12rem; object-fit: contain;" alt="Logo">

		<ul style="list-style: none; padding: 0;">
		
			<li style="margin: 20px 0; display: flex; align-items: center;">
				<div style="color: black;padding: 2px;border-radius: 8px;
				margin-bottom: 10px;">
					<a href="index.php" class="button">
						<i class="fa fa-home" style="margin-right: 10px;"></i>
						Users
					</a>
				</div>
			</li>

			<li style="margin: 20px 0; display: flex; align-items: center;">
				<div style="color: white;padding: 2px;border-radius: 8px;
				margin-bottom: 10px;">
					<a href="ManageUsers.php" class="button">
						<i class="fa fa-users" style="margin-right: 10px;"></i>
						Manage Users
					</a>
				</div>
			</li>
		
			<li style="margin: 20px 0; display: flex; align-items: center;">
				<div style="color: white;padding: 2px;border-radius: 8px;
				margin-bottom: 10px;">
					<a href="UsersLog.php" class="button">
						<i class="fa fa-users" style="margin-right: 10px;"></i>
						Users Log
					</a>
				</div>
			</li>
		</ul>

<!-- End of Navbar Buttons -->

    <?php  
    	if (isset($_SESSION['Admin-name'])) {
    		echo '<a href="#" data-toggle="modal" 
			data-target="#admin-account" style="background-color: #eda200;
	hover:#F2C464">
			<i class="fa fa-list"></i>
			'.$_SESSION['Admin-name'].'</a> <br>';
    		
			echo '<a href="logout.php" style="background-color: #eda200;
	hover:#F2C464">
			<i class="fa fa-cog"></i>
			Log Out</a>';
    	}
    	else{
    		
			echo '<a href="login.php">Log In</a>';
    	}
    ?>
    <a href="javascript:void(0);" class="icon" onclick="navFunction()">
	  <i class="fa fa-bars"></i></a>
</div>
<div class="up_info1 alert-danger"></div>
<div class="up_info2 alert-success"></div>
</header>
<script>
	function navFunction() {
	  var x = document.getElementById("myTopnav");
	  if (x.className === "topnav") {
	    x.className += " responsive";
	  } else {
	    x.className = "topnav";
	  }
	}
</script>

<!-- Account Update -->

<div class="modal fade" id="admin-account" tabindex="-1" role="dialog" aria-labelledby="Admin Update" aria-hidden="true" style="background: #F2C464;">
  <div class="modal-dialog modal-dialog-centered" role="document" style="background: #F2C464;">
    <div class="modal-content" style="background: #F2C464;">
      <div class="modal-header" style="background: #F2C464;">
        <h3 class="modal-title" id="exampleModalLongTitle">Update Your Account Info:</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="background: #F2C464;">&times;</span>
        </button>
      </div>
      <form action="ac_update.php" method="POST" enctype="multipart/form-data" style="background: #F2C464;">
	      <div class="modal-body">
	      	<label for="User-mail"><b>Admin Name:</b></label>
	      	<input type="text" name="up_name" placeholder="Enter your Name..." value="<?php echo $_SESSION['Admin-name']; ?>" required/><br>
	      	<label for="User-mail"><b>Admin E-mail:</b></label>
	      	<input type="email" name="up_email" placeholder="Enter your E-mail..." value="<?php echo $_SESSION['Admin-email']; ?>" required/><br>
	      	<label for="User-psw"><b>Password</b></label>
	      	<input type="password" name="up_pwd" placeholder="Enter your Password..." required/><br>
	      </div>
	      <div class="modal-footer" style="background: #eda200;">
	        <button type="submit" name="update" class="btn btn-success" style="background: #eda200;margin-right:15px;">Save changes</button>
	        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background: #eda200;">Close</button>
	      </div>
	  </form>
    </div>
  </div>
</div>
<!-- //Account Update -->
	

	
