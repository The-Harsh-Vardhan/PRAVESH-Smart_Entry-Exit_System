<div class="table-responsive-sm" style="max-height: 870px;background-color: #F2C464;"> 
  <table class="table">
    <thead class="table-primary">
    <tr>
        <th>ID</th>
        <th>UID</th>
        <th>NAME</th>
        <th>GENDER</th>
        <th>S. NO</th>
        <th>DATE</th>
        <th>EMAIL</th>
      </tr>
    </thead>
    <tbody class="table-secondary" style="background-color:#F2C464;">
    <?php
      //Connect to database
      require'connectDB.php';

        $sql = "SELECT * FROM students ORDER BY id ASC";
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
                  <TR style="background-color:#eda200;">
                    <TD><?php echo $row['id'];?></TD>
                  	<TD><?php  
                    		if ($row['card_select'] == 1) {
                    			echo "<span><i class='glyphicon glyphicon-ok' title='The selected UID'></i></span>";
                    		}
                        $card_uid = $row['card_uid'];
                    	?>
                    	<form>
                    		<button type="button" class="select_btn" id="<?php echo $card_uid;?>" title="select this UID"><?php echo $card_uid;?></button>
                    	</form>
                    </TD>
                  <TD><?php echo $row['username'];?></TD>
                  <TD><?php echo $row['gender'];?></TD>
                  <TD><?php echo $row['serialnumber'];?></TD>
                  <TD><?php echo $row['user_date'];?></TD>
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