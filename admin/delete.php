
<?php

if(!isset($_SESSION['id']))
{
	header('location:..\index.php');

}

?>
<?php
	include('..\dbcon.php');
	if($_REQUEST['id'] && $_REQUEST['x']==0)
	{
		//from inbox
		$id=$_REQUEST['id'];
		$qry="SELECT * FROM `inbox` WHERE `id`='$id' ";
		$run=mysqli_query($con,$qry);
		$data=mysqli_fetch_row($run);
		$from=$_REQUEST['x'];
		//echo "$data[0] $data[1] $data[2]  $data[4] $data[5] $data[6]";
		$qry1="INSERT INTO `trash`( `date`, `sender`, `receiver`, `subject`, `body`,  `from`) VALUES ('$data[1]','$data[2]','$data[4]','$data[5]','$data[6]', '$from')";
		$run1=mysqli_query($con,$qry1);
		$qry2="DELETE  FROM `inbox` WHERE `id`='$id' ";
		$run2=mysqli_query($con,$qry2);
		if( $run1 && $run2)
		{
			header('location:inbox.php');
		}
		else
		{
			echo "Unsuccessful!! :( Something went wrong";
		}
		
	}
	else if($_REQUEST['id'] && $_REQUEST['x']==1)
	{
		//from outbox
		$id=$_REQUEST['id'];
		$qry="SELECT * FROM `outbox` WHERE `id`='$id' ";
		$run=mysqli_query($con,$qry);
		$data=mysqli_fetch_row($run);
		$from=$_REQUEST['x'];
		echo "$data[0] $data[1] $data[2]  $data[3] $data[4] $data[5]";
		$qry1="INSERT INTO `trash`( `date`, `sender`, `receiver`, `subject`, `body`, `from` ) VALUES ('$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$from')";
		$run1=mysqli_query($con,$qry1);
		$qry2="DELETE  FROM `outbox` WHERE `id`='$id' ";
		$run2=mysqli_query($con,$qry2);
		if( $run1 && $run2)
		{
			header('location:outbox.php');
		}
		else
		{
			echo "Unsuccessful!! :( Something went wrong";
		}
	}
	else if($_REQUEST['id'] && $_REQUEST['x']==2)
	{
		//from draft
		$id=$_REQUEST['id'];
		$qry="SELECT * FROM `draft` WHERE `id`='$id' ";
		$run=mysqli_query($con,$qry);
		$data=mysqli_fetch_row($run);
		$from=$_REQUEST['x'];
		echo "$data[0] $data[1] $data[2]  $data[3] $data[4] $data[5]";
		$qry1="INSERT INTO `trash`( `date`, `sender`, `receiver`, `subject`, `body`, `from`) VALUES ('$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$from')";
		$run1=mysqli_query($con,$qry1);
		$qry2="DELETE  FROM `draft` WHERE `id`='$id' ";
		$run2=mysqli_query($con,$qry2);
		if( $run1 && $run2)
		{
			header('location:draft.php');
		}
		else
		{
			echo "Unsuccessful!! :( Something went wrong";
		}
	}
	else if($_REQUEST['id'] && $_REQUEST['x']==3)
	{
		//from trash
	
		
		$id=$_REQUEST['id'];
		$qry="SELECT * FROM `trash` WHERE `id`='$id' ";
		$run=mysqli_query($con,$qry);
		$data=mysqli_fetch_row($run);
		
		echo "$data[0] $data[1] $data[2]  $data[3] $data[4] $data[5]";
		
		$qry2="DELETE  FROM `trash` WHERE `id`='$id' ";
		$run2=mysqli_query($con,$qry2);
		if( $run2)
		{
			header('location:trash.php');
		}
		else
		{
			echo "Unsuccessful!! :( Something went wrong";
		}
	}
	else
	{
		$xi=$_REQUEST['id'];
		$xii=$_REQUEST['x'];
		
		echo "something is wrong, check  $xi  $xii";
	}
?>