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
		<script>
			document.getElementById('outbox').style.color='black';
		</script>
	</div>
	<div class="right " style="float:left; height:86%;width:80%;z-index=1;background-color:#c0c0c0; overflow:hidden; ">
		<div style=" height:100%; width:100%;overflow:hidden;  ">
		
			<div class="row bg-dark  mb-1" style=" padding-left:5px; ">
				<div class="col-3 text-white  ">Mail to</div>
				<div class="col-2 text-white">Date </div>
				<div class="col-5 text-white">Subject</div>
				<div class="col-2 text-white" style="text-align:center;">Action</div>
				

			</div>
			
			<?php
				$email=$data['email'];
				$q2="select * from `outbox` where `sender`='$email'";
				$exec=mysqli_query($con,$q2);
				
			
			    while($fetch=mysqli_fetch_row($exec))
				{
					?>
					
					
						<div class="row bg-white mb-1 pb-1 pt-1" style=" padding-left:5px; border:2px solid #dc3545; border-radius:20%; ">
							<div class="col-3   "><?php echo "$fetch[3]" ;?></div>
							<div class="col-2 "><?php echo "$fetch[1]" ;?> </div>
							<div class="col-5 "><?php echo "$fetch[4]" ;?></div>
							<div class="col-2 " style="text-align:center;"><a href="read.php?<?php echo "id=$fetch[0] & x=1";?>">Read</a> | <a href="delete.php? <?php echo "id=$fetch[0] & x=1"; ?>"  onclick="return confirm('Are you sure ?');">Delete</a></div>
							

						</div>
					
					
					<?php
			
				}
			?>
			
		</div>
	</div>
</div>

