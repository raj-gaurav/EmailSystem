
	
<?php

				
				include('..\dbcon.php');

				
				$id=$_SESSION['id'];
				$qry ="SELECT * FROM `signup` WHERE `id`='$id'";
				$run=mysqli_query($con,$qry);
				$data=mysqli_fetch_assoc($run);
				$user=$data['username'];
				$email=$data['email'];
				$mob=$data['mobile'];
			?>

<div class="bg-danger" style="height:15%;" >
	<div class="row" style="overflow:hidden; width:100%; padding-top:10px;" >
		<div class="col">
		<span class="text-white" style="font-size:50px; margin-left:50px;">
			<?php
				include("..\logo.php");
			?>
		</span>
		</div>
		<div class="col">
			
		
		<label style="color:white;"><?php echo "<font style='color:yellow;font-size:20px;'>Welcome</font> <i class='fas fa-user'></i> $user &nbsp; <i class='fas fa-mail-bulk'></i> $email &nbsp; <i class='fas fa-mobile'></i> $mob"; ?></label>
		</div>
		<div class="col" align="right" style="">
		<a href="logout.php" class="btn btn-danger " style="">Log out</a>
		<a href="profile.php" ><img src="../images\demo.jpeg" style="border-radius:50%; height:50px; width:50px;"/></a>
		</div>
		
		<br><br>
	</div>
</div>