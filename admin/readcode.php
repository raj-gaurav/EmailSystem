<?php

if(!isset($_SESSION['id']))
{
	header('location:..\index.php');

}

?>

<?php
	include ('..\dbcon.php');
	if($_REQUEST['id'] && $_REQUEST['x']==0)
	{
		//from inbox
		
		$id=$_REQUEST['id'];
		$qry="SELECT * FROM `inbox` WHERE `id`='$id' ";
		$run=mysqli_query($con,$qry);
		$data=mysqli_fetch_row($run);
		
	
	}
	else if( $_REQUEST['id'] && $_REQUEST['x']==1 )
	{
		//from outbox
		$id=$_REQUEST['id'];
		$qry="SELECT * FROM `outbox` WHERE `id`='$id' ";
		$run=mysqli_query($con,$qry);
		$data=mysqli_fetch_row($run);
		
		
	}
	else
	{
		echo "something went wrong";
	}
?>