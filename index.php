<?php include("admin/head.php"); ?>

<?php 
	if(isset($_SESSION['id']))
	{
		header('location:admin/inbox.php');
	}
?>

<!-- Top Header -->
<div class="bg-danger ">
	<div class="container ">
		<div class="row" style="padding-top:20px; padding-bottom:20px;" >
			<div class="col" >
				<span class="text-white " style="font-size:50px;"><?php include("logo.php"); ?></span>
			</div>
			<div class="col" align="right"  >
				<button class="btn btn-danger border-white " style="margin-top:20px;" data-target="#mymodal" data-toggle="modal">Log in</button>
			</div>
		</div>
	</div>
</div>

<!-- Main body -->
<div class="container" >


	<!-- About Email -->
	<div  style="padding-top:200px; padding-bottom:30px; padding-left:10px; padding-right:10px; float:left; width:50%;">
		<fieldset>
			<legend> <?php include("logo.php"); ?></legend>
			Email is a free email service developed by <a href="#" class="btn border-primary text-primary">Gaurav</a>. Users can access Email on the web 
			and using third-party programs that synchronize email content through POP or IMAP protocols. 
			Email started as a limited beta release on <code class="bg-warning text-dark">coming soon</code>, and ended its testing phase on <code class="bg-warning text-dark">wait</code>.
		</fieldset>
	</div>
	
	<!-- Sign up -->
	
	
	
	<div  style="float:left; width:50%; padding-left:50px; padding-top:50px;">
	
			<label id="msglogin"></label>
		<h2 class="text-danger">New User | Register | Sign up</h2><br>
		<div >
			<label id="msg"></label>
		<table>
			<form action="#" method="post">
				
				<tr>
					<th> <label>Username </label> </th>
					<td> <input type="text" placeholder="Username" name="username" required="required" style=" width:250px; border:none; border-bottom: 1px solid #000; outline: none; background: transparent;"/> </td>
				</tr>
				<tr>
					<th> <label>Email </label> </th>
					<td> <input type="email" placeholder="Enter an email" name="email" required="required" style=" width:250px; border:none; border-bottom: 1px solid #000; outline: none; background: transparent;"/> </td>
				</tr>
				<tr>
					<th> <label>Password </label> </th>
					<td> <input type="password" placeholder="Enter your password" name="password" required="required" style=" width:250px; border:none; border-bottom: 1px solid #000; outline: none; background: transparent;"/> </td>
				</tr>
					
				<tr>
					<th> <label>Confirm Password &nbsp;</label> </th>
					<td> <input type="password" placeholder="Enter your password" name="cpassword" required="required" style=" width:250px; border:none; border-bottom: 1px solid #000; outline: none; background: transparent;"/> </td>
				</tr>
				<tr>
					<th> <label>Mobile no.  </label> </th>
					<td> <input type="number" placeholder="Enter your mobile no." name="mobno" required="required" style=" width:250px; border:none; border-bottom: 1px solid #000; outline: none; background: transparent;"/> </td>
				</tr>
				<tr>
					<th> <label>Security Question &nbsp;</label> </th>
					<td> 
						<select name="sques" style=" border:none; border-bottom: 1px solid #000; outline: none; background: transparent; width:250px;"  >
							
							<option>First teacher</option>
							<option>First pet</option>
							<option>First novel</option>
							<option>First language</option>
							<option>First tourism place</option>
						</select>
					</td>
				</tr>
				<tr>
					<th> <label>Answer  </label> </th>
					<td> <input type="text" name="answer" required="required" placeholder="Enter your answer" style=" width:250px; border:none; border-bottom: 1px solid #000; outline: none; background: transparent;"/> </td>
				</tr>
				
				<tr>
					<th colspan="2">
						<br>Captcha <br><br>
						<label class="btn border-danger text-primary"> ABCDEF </label><br><br>
						<input type="text" required="required" placeholder="Captcha" />
						
					</th>
				</tr>
				<tr>
					
					<td colspan="2"> <br><br><input type="submit" value="Register" name="register" class="btn btn-danger"/> </td>
				</tr>
				
				
			</form>
			</table>
		</div>
	</div>
	
	<!-- Login Modal -->
	<div class="modal" id="mymodal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="text-danger">Log in</h3>
					<button class="close" data-dismiss="modal">  &times; </button>
				</div>
				<div class="modal-body">
					<form action="index.php" method="post">
						<div class="form-group">
							<label> <i class="fas fa-user"></i> Email : </label>
							<input type="text" name="lemail" class="form-control" required="required" /> 
						</div>
						<div class="form-group">
							<label> <i class="fas fa-unlock"></i> Password : </label>
							<input type="password" name="lpassword" class="form-control" required="required" /> 
						</div>
						<div class="form-group">
							<input type="submit" name="login" value="Login" class="btn btn-danger"/>
							<a href="#" class="text-primary">Forget Password?</a>
							 
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	
	
<div>


	</body>
</html>
<!-- Sign up php start -->
<?php

 
		if(isset($_POST['register']))
		{
			include("dbcon.php");
			
			$user=$_POST['username'];
			$email=$_POST['email'];
			$pass=$_POST['password'];
			$cpass=$_POST['cpassword'];
			$mob=$_POST['mobno'];
			
			$checkqry="SELECT * FROM `signup` WHERE `email`='$email' ";
			$check=mysqli_query($con,$checkqry);
			$row=mysqli_num_rows($check);
			if($row<1)
			{
				if($pass === $cpass)
				{
					$qry="INSERT INTO `signup`( `username`, `email`, `password`, `mobile`) VALUES ('$user', '$email', '$pass', '$mob') ";
					$run=mysqli_query($con,$qry);
					if($run)
					{
					?>
						<script>
							var msg= "Thank you. :) You are Successfully registered.";
							document.getElementById('msg').style.color='green';
							document.getElementById('msg').innerHTML=msg;
						</script>
						
					<?php
					}
					else
					{
						?>
						<script>
							var msg= "Ooops :( Something went wrong.";
							document.getElementById('msg').style.color='red';
							document.getElementById('msg').innerHTML=msg;
						</script>
						
					<?php
						
					}
					
				
				}
				else
				{?>
					<script>
						var msg= "Passwords should be same";
							document.getElementById('msg').style.color='red';
							document.getElementById('msg').innerHTML=msg;
					</script>
				<?php }
			}
			else
			{
				?>
					<script>
						var msg= "Email already exists";
							document.getElementById('msg').style.color='red';
							document.getElementById('msg').innerHTML=msg;
					</script>
				<?php
			}
			
			
		}

	?>
<!-- Sign up php end -->
	
	<!-- Log in php start -->
	
	<?php
		
		if(isset($_POST['login']))
		{
			include('dbcon.php');
			
			$lemail=$_POST['lemail'];
			$password=$_POST['lpassword'];
			
			$qry1="SELECT * FROM `signup`  WHERE `email`='$lemail' AND `password`='$password' ";
			
			$run=mysqli_query($con,$qry1);
			$rows=mysqli_num_rows($run);
			if($rows<1)
			{?>
				<script> 
				
				document.getElementById('msglogin').style.color='red';
				document.getElementById('msglogin').innerHTML=':( Invalid Username or Password';
				
				</script>
				<?php
			}
			else
			{
					
					$data=mysqli_fetch_assoc($run);
					$id=$data['id'];
					
					$_SESSION['id']=$id;
					?>
				<script> 
				
				document.location.href="admin/inbox.php";
				
				</script>
				<?php
					
			}
			
			
		}
	
	
	?>
	
	<!-- Log in php end -->






