<?php
	include("head.php");
	
?>
<?php

if(!isset($_SESSION['id']))
{
	header('location:..\index.php');

}

?>

<?php
	include_once('..\dbcon.php');
	$did=$_REQUEST['id'];
	$rx=$_REQUEST['x'];
	if($_REQUEST['x']==0)
	{
		$get="select * from `inbox` where `id`='$did'";
		$drun=mysqli_query($con,$get);
		$ddata=mysqli_fetch_row($drun);
	}
?>


<div>
	<div class="header" style="z-index=3;">
		<?php include("header.php"); ?>
		<div class="bg-warning" id="msg" style="text-align:center;"></div>
	</div>
	<div class="left bg-danger" style="float:left; height:86%;width:20%; z-index=3;">
		<?php include("leftmenu.php"); ?>
		<script>
			document.getElementById('inbox').style.color='black';
		</script>
	</div>
	<div class="right  " style="float:left; height:86%;width:80%;z-index=1;background-color:#c0c0c0; ">
		<div class="" style="height:100%; width:100%;overflow:hidden;  ">
			<div class="container" style="margin-top:50px; margin-left:50px;"/>
				<form action="#" method="post">
					<table class="table table-border">
						<tr style="">
							
							<td colspan="2"><a href="read.php?<?php echo " id=$did & x=$rx";?>"><input type="button"  value="Back" class="btn btn-primary" /></a></td>
						</tr>
						<tr style="display:none;">
							<th>Date :&nbsp;&nbsp; </th>
							<td><input type="text" name="date" value="<?php echo $x=date('d-m-Y ');?>" /></td>
						</tr>
						
						<tr style="display:none;">
							<th>From :&nbsp;&nbsp; </th>
							<td><input type="email" name="sender" value="<?php echo $email;?>" /></td>
						</tr>
						<tr style="display:none;">
							<th>Status :&nbsp;&nbsp; </th>
							<td><input type="number" name="status" value="<?php echo '0';?>" /></td>
						</tr>
						<tr>
							<th>To :&nbsp;&nbsp; </th>
							<td><input type="email" name="receiver" required="required" value="<?php echo $ddata[2]; ?>" style=" width:375px; border:none; border-bottom: 1px solid #000; outline: none; background: transparent;" readonly/><br><br></td>
						</tr>
						<tr>
							<th>Subject :&nbsp;&nbsp; </th>
							<td><input type="text" name="subject"  value="Re : <?php echo $ddata[5]; ?> :" style=" width:375px; border:none; border-bottom: 1px solid #000; outline: none; background: transparent;"/><br><br></td>
						</tr>
						
						<tr>
							<th valign="top">Body :&nbsp;&nbsp; </th>
							<td>
								<textarea rows = "10" name="body" cols = "50" style="border: 1px solid #000; outline:none; background:transparent;">
									
								</textarea><br><br>
							</td>
						</tr>
						<tr>
							<th valign="top">Attach files* :&nbsp;&nbsp; </th>
							<td ><input type="file"  /><br><br></td>
						</tr>
						<tr>
							<td colspan="2">
								<input type="submit" value="Send" name="sendmail" class="btn btn-success"/>&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="submit" value="Save" name="savemail" class="btn btn-warning"/>
							</td>
						</tr>
						
					</table>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- send button action start-->
<?php

	if(isset($_POST['sendmail']))
	{
		include('..\dbcon.php');
		extract($_POST);
		$q2="SELECT * FROM `signup` WHERE `email`='$receiver'";
		$exec2=mysqli_query($con,$q2);
		if(mysqli_num_rows($exec2)>0)
		{
			$q1="insert into `inbox`( `date`, `sender`, `status`, `receiver`, `subject`, `body`) values('$date','$sender','$status','$receiver','$subject','$body')";
			$exec=mysqli_query($con,$q1);
			$q2="INSERT INTO `outbox`( `date`, `sender`, `receiver`, `subject`, `body`) VALUES ('$date','$sender','$receiver','$subject','$body') ";
			$exec1=mysqli_query($con,$q2);
			if($exec && $exec1)
			{
			  ?>
			
				<script>
					var msg="Message sent :)"
					document.getElementById('msg').innerHTML=msg;
					document.getElementById('msg').style.color='green';
				</script>
					
		      <?php
			   
			}
			else
			{
				?>
			
				<script>
					var msg="Send failed :("
					document.getElementById('msg').innerHTML=msg;
					document.getElementById('msg').style.color='red';
				</script>
					
		      <?php
			}
			
		}
		else
		{?>
			
			<script>
				var msg="Invalid reciepent address"
				document.getElementById('msg').innerHTML=msg;
				document.getElementById('msg').style.color='red';
			</script>
					
		 <?php
		}
	}		
	

?>
<!-- send button action end-->

<!-- save button action start-->

<?php

	if(isset($_POST['savemail']))
	{
		include('..\dbcon.php');
		extract($_POST);
		$q2="SELECT * FROM `signup` WHERE `email`='$receiver'";
		$exec2=mysqli_query($con,$q2);
		if(mysqli_num_rows($exec2)>0)
		{
			//$q2="UPDATE `draft` SET `date`='$date',`sender`='$sender',`receiver`='$receiver',`subject`='$subject',`body`='$body' WHERE `id`=$did";
			$q2="INSERT INTO `draft`( `date`, `sender`, `receiver`, `subject`, `body`) VALUES ('$date','$sender','$receiver','$subject','$body') ";
			$exec1=mysqli_query($con,$q2);
			if( $exec1)
			{
			  ?>
			
				<script>
					var msg="Message saved :)"
					document.getElementById('msg').innerHTML=msg;
					document.getElementById('msg').style.color='green';
				</script>
					
		      <?php
			  
			}
			else
			{
				?>
			
				<script>
					var msg="Message not saved :("
					document.getElementById('msg').innerHTML=msg;
					document.getElementById('msg').style.color='red';
				</script>
					
		      <?php
			   
			}
			
		}
		else
		{?>
			
			<script>
				var msg="Invalid reciepent address"
				document.getElementById('msg').innerHTML=msg;
				document.getElementById('msg').style.color='red';
			</script>
					
		 <?php
		}
	}		
	

?>


<!-- save button action end-->