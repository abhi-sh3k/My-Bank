<?php

include 'navbar.php';
include 'footer.php';

session_start();

$servername="localhost";
$username="root";
$password="";
$dbname="bankdb";

$conn=mysqli_connect($servername,$username,$password,$dbname);

if(!$conn)
{
  die("Connection failed because".mysqli_connect_error());
}

//Getting the account number from form
$uid=$_SESSION['uid'];
$r_acc=$_POST['rcvr_acc_no'];
$_SESSION['r_acc']=$r_acc;

$cmd="SELECT Acc_no from users where User_id=$uid";
$sql=mysqli_query($conn,$cmd);
if($sql){
	$row=mysqli_fetch_assoc($sql);
	$s_acc=$row['Acc_no'];
}

if(($s_acc)==($r_acc))
{
	echo '
			<script>alert("Sorry!! Sender and Receiver Account Numbers cannot remain Same");
			window.location="users.php";
			</script>
		';
}
else
{
		
	$cmd="SELECT * from users where Acc_no=$r_acc";

	$sql=mysqli_query($conn,$cmd);

	//Checking for the sql query
	if(!$sql){
		echo '
				<script>alert("Enter Correct Account Number.");
					window.location="users.php";
				</script>
			';
	}

	//Checking for the Account number in Users Table
	$rows = mysqli_num_rows($sql);
	if(($rows)<=0)
	{	

		echo '
				<script>alert("Sorry! Unable to find User with this Account Number.");
					window.location="users.php";
				</script>
			';
	}
	else
	{
		echo '
				<script>alert("Getting The Details of this Account Number!");
					window.location="send_money.php";
				</script>
			';
	
	}
}
?>