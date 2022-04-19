<?php

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

$uid=$_SESSION['uid'];
$r_acc=$_SESSION['r_acc'];
$amt=$_POST['amt'];
date_default_timezone_set('Asia/Kolkata');
$t_date=date("Y-m-d H:i:s");


$cmd="SELECT * from users where User_id=$uid";
$sql=mysqli_query($conn,$cmd);

while($rec=mysqli_fetch_assoc($sql))
{
	$sacc_no=$rec["Acc_no"];
	$avl_bal=$rec["Curr_balance"];
}

//Validating the Amount Entered by User

if(($amt)<0){
	echo '
			<script>alert("Negative Values cannot be Transferred");
				window.location="home.php";
			</script>
		';
}
else if(($amt)==0){
	echo '
			<script>alert("Amount cannot remain Empty!");
				window.location="home.php";
			</script>
		';
}
else if(($amt)>($avl_bal))
{
	echo '
			<script>alert("Oops Insufficient Account Balance!");
				window.location="home.php";
			</script>
		';
}
else if(($amt)<=($avl_bal))
{
	$sql1 = "UPDATE users SET Curr_balance= Curr_balance-$amt WHERE Acc_no='$sacc_no'";
    $sql2 = "UPDATE users SET Curr_balance= Curr_balance+$amt WHERE Acc_no='$r_acc'";

    $res1=mysqli_query($conn,$sql1);
    $res2=mysqli_query($conn,$sql2);

	//If Updated in the Records of User then Create the Transaction
    if($res1 && $res2){
    	
		$cmd2="INSERT INTO `transactions` (`Sender`, `Receiver`, `Amount`, `Trans_date`) VALUES ('$sacc_no', '$r_acc', '$amt', '$t_date');";

		$sql3=mysqli_query($conn,$cmd2);
		
		if($sql3){
			echo '
					<script>alert("Transactions Successful");
						window.location="transactions.php";
					</script>
				';
		}
		else{	
			echo '
					<script>
						alert("Transaction Unsuccessful").mysqli_error($conn);
						window.location="home.php";
					</script>
				';
		}

    }else{
    	echo '
					<script>
						alert("Something went Wrong!");
						window.location="home.php";
					</script>
			';
    }
}else{
		echo '
				<script>alert("Something went Wrong!")</script>
			';
}

?>