<?php
	include("head.php");
	
?>

<?php

if(!isset($_SESSION['id']))
{
	header('location:..\index.php');

}

?>


<div>
	<div class="header" style="z-index=3;">
		<?php include("header.php"); ?>
	</div>
	<div class="left bg-danger" style="float:left; height:86%;width:20%; z-index=3;">
		<?php include("leftmenu.php"); ?>
		
	</div>
	
	<!-- php for user details start -->
	<?php
	
		
	
	?>
	<!-- php for user details end -->
	
	<div class="right  " style="float:left; height:86%;width:80%;z-index=1; background-color:#c0c0c0;">
		<div style=" height:100%; width:100%;overflow:hidden;  ">
			<div style="text-align:center; margin:1%; ">
				<form method="post" action="profile.php">
					<table  class="table table-border">
						<tr>
							<th valign="top">Username :</th>
							<td> <label id="user"><?php echo $data['username']; ?></label>
								<input type="text" name="uuser" value="<?php echo $data['username']; ?>" id="edituser" style=" display:none; width:250px; border:none; border-bottom: 1px solid #000; outline: none; background: transparent;"/>	
							<br><br></td>
						</tr>
						<tr valign="top">
							<th>Mobile no :</th>
							<td> <label id="mob"><?php echo $data['mobile']; ?></label>
								<input type="number" name="umob" value="<?php echo $data['mobile']; ?>" id="editmob" style=" display:none; width:250px; border:none; border-bottom: 1px solid #000; outline: none; background: transparent;"/>
							<br><br><br></td>
						</tr>
						<tr valign="top">
							<th>Security Question :</th>
							<td> <label class="detail">First name</label><br><br><br></td>
						</tr>
						<tr valign="top">
							<th>Answer :</th>
							<td> <label id="ans">*********</label>
								<input type="text" id="editans"  style=" display:none; width:250px; border:none; border-bottom: 1px solid #000; outline: none; background: transparent;"/>
							<br><br><br></td>
						</tr>
						<tr valign="top">
							<th>Profile Picture :</th>
							<td> 
								<img src="../images/demo.jpeg" style="height:100px; width:100px; border-radius:50%;"/>
								<input type="file" id="editdp" style=" display:none; width:250px; border:none; border-bottom: 1px solid #000; outline: none; background: transparent;"/>
									
							</td>
						</tr>
						<tr valign="top" >
							<td  colspan="2">  
								<input type="submit" value="Edit" name="edit" id="edit" class="btn btn-warning"/>
								<input type="submit" value="Save" name="save" id="save"  onclick="return confirm('You must log in again. Thank you :)');" style="display:none;" class="btn btn-success"/>
								
							</td>
						</tr>
						
					</table>
				</form>
			</div>
			
		</div>
	</div>
</div>

<?php
	if(isset($_POST['edit']))
	{
		?>
		
			<script>
				document.getElementById('user').style.display='none';
				document.getElementById('mob').style.display='none';
				document.getElementById('ans').style.display='none';
				document.getElementById('edit').style.display='none';
				document.getElementById('editdp').style.display='block';
				document.getElementById('edituser').style.display='block';
				document.getElementById('editmob').style.display='block';
				document.getElementById('editans').style.display='block';
				document.getElementById('save').style.display='block';

			</script>
			
		<?php
	}
?>

<?php
	if(isset($_POST['save']))
	{
		?>
		
			<script>
				document.getElementById('user').style.display='block';
				document.getElementById('mob').style.display='block';
				document.getElementById('ans').style.display='block';
				document.getElementById('edit').style.display='block';
				document.getElementById('editdp').style.display='none';
				document.getElementById('edituser').style.display='none';
				document.getElementById('editmob').style.display='none';
				document.getElementById('editans').style.display='none';
				document.getElementById('save').style.display='none';
			</script>
			
		<?php
			$did=$_SESSION['id'];
			$uuser=$_POST['uuser'];
			$umob=$_POST['umob'];
			
			$uqry="UPDATE `signup` SET `username`='$uuser',`mobile`='$umob' WHERE `id`='$did'";
			$urun=mysqli_query($con,$uqry);
			
			if($urun)
			{
				header('location:logout.php');
			}
			else
			{
				echo "Something went wrong..";
			}
		
		
		
		
	}
?>

