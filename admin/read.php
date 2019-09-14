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
	<?php include('readcode.php'); ?>
	<div class="right  " style="float:left; height:86%;width:80%;z-index=1;background-color:#c0c0c0;overflow:hidden; ">
		<div class="" style="height:100%; width:100%;overflow:hidden;  ">
			<div class="container" style="margin-top:50px; margin-left:50px;"/>
				
				<form action="#" method="post">
					<table class="table table-border" border="0" align="center" width="50%">
						<tr>
							<td colspan="2">
								<input type="submit" name="back" class="btn btn-primary" value="Back"/> 
							</td>
						</tr>
						<tr >
							<th width="30%">Date :&nbsp;&nbsp; </th>
							<td width="70%"><?php echo $data[1];?></td>
						</tr>
						
						<tr >
							<th>From :&nbsp;&nbsp; </th>
							<td><?php echo $data[2];?></td>
						</tr>
						
						<?php
							if($_REQUEST['id'] && $_REQUEST['x']==0)
							{
						
						?>
						
						<tr>
							<th>To :&nbsp;&nbsp; </th>
							<td> <?php echo $data[4];?></td>
						</tr>
						<tr>
							<th>Subject :&nbsp;&nbsp; </th>
							<td><?php echo $data[5];?></td>
						</tr>
						
						<tr>
							<th valign="top">Body :&nbsp;&nbsp; </th>
							<td>
								<?php echo $data[6];?>
								
							</td>
						</tr><?php
							}
							
							else if($_REQUEST['id'] && $_REQUEST['x']==1)
							{
								?>
						
						<tr>
							<th>To :&nbsp;&nbsp; </th>
							<td> <?php echo $data[3];?></td>
						</tr>
						<tr>
							<th>Subject :&nbsp;&nbsp; </th>
							<td><?php echo $data[4];?></td>
						</tr>
						
						<tr>
							<th valign="top">Body :&nbsp;&nbsp; </th>
							<td>
								<?php echo $data[5];?>
								
							</td>
						</tr><?php
							}
							
							$rid=$_REQUEST['id'];
							$x=$_REQUEST['x'];
							
						?>
						
						<tr>
							<td colspan="2">
								<a href="reply.php? <?php echo "id=$rid & x=$x" ; ?>" id="reply" class="btn btn-success">Reply</a>&nbsp;&nbsp;
								<a href="forward.php? <?php echo "id=$rid & x=$x" ; ?>" class="btn btn-warning">Forward</a>
								<?php
								if($_REQUEST['x']==1)
								{
								?>
								<script>
									document.getElementById('reply').style.display='none';
									document.getElementById('outbox').style.color='black';
								</script><?php
								}
								else if($_REQUEST['x']==0)
								{
									?>
								<script>
									
									document.getElementById('inbox').style.color='black';
								</script><?php
								}
								?>
							
							</td>
						</tr>
						
					</table>
				</form>
			</div>
	</div>
</div>

<?php
	if(isset($_POST['back']))
	{
		if($_REQUEST['x']==0)
		{
			header('location:inbox.php');
		}
		else if($_REQUEST['x']==1)
		{
			header('location:outbox.php');
			
		}
	}
	
?>