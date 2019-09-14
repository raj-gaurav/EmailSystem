<?php
	include('session.php');
?>
<?php

if(!isset($_SESSION['id']))
{
	header('location:..\index.php');

}

?>
<?php
	include('..\dbcon.php');
	if($_REQUEST['id'])
	{
		$id=$_REQUEST['id'];
		$qry="SELECT * FROM `trash` WHERE `id`='$id' ";
		$run=mysqli_query($con,$qry);
		$data=mysqli_fetch_row($run);
		$from=$data[6];
		/*$sesid=$_SESSION['id'];
		$ids=$_SESSION['id'];
		$qrys ="SELECT * FROM `signup` WHERE `id`='$ids'";
		$runs=mysqli_query($con,$qrys);
		$datas=mysqli_fetch_assoc($runs);
		$emails=$datas['email'];
		echo "";*/
		
		
		
		if($from == 0)
		{
			$did=$_REQUEST['id'];
			$inqry="insert into `inbox`( `date`, `sender`, `status`, `receiver`, `subject`, `body`) values('$data[1]','$data[2]','0','$data[3]','$data[4]','$data[5]')";
			$inrun=mysqli_query($con,$inqry);
			$deqry="delete from `trash` where `id`='$did'";
			$derun=mysqli_query($con,$deqry);
			if($inrun && derun)
			{
				header('location:trash.php');
			}
			else
			{
				echo "Unsuccessful!! :( Something went wrong";
			}
		}
		else if($from == 1)
		{
			$did=$_REQUEST['id'];
			$inqry="insert into `outbox`(`date`, `sender`, `receiver`, `subject`, `body`) values('$data[1]','$data[2]','$data[3]','$data[4]','$data[5]')";
			$inrun=mysqli_query($con,$inqry);
			$deqry="delete from `trash` where `id`='$did'";
			$derun=mysqli_query($con,$deqry);
			if($inrun && derun)
			{
				header('location:trash.php');
			}
			else
			{
				echo "Unsuccessful!! :( Something went wrong";
			}
		}
		else if($from == 2)
		{
			$did=$_REQUEST['id'];
			$inqry="insert into `draft`(`date`, `sender`, `receiver`, `subject`, `body`) values('$data[1]','$data[2]','$data[3]','$data[4]','$data[5]')";
			$inrun=mysqli_query($con,$inqry);
			$deqry="delete from `trash` where `id`='$did'";
			$derun=mysqli_query($con,$deqry);
			if($inrun && derun)
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
			echo "Something went wrong";
			header('location:trash.php');
		}
		
		
	}
?>