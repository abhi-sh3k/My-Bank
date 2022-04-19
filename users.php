<?php

include 'navbar.php';
include 'footer.php';

$servername="localhost";
$username="root";
$password="";
$dbname="bankdb";

$conn=mysqli_connect($servername,$username,$password,$dbname);

if(!$conn)
{
  die("Connection failed because".mysqli_connect_error());
}
echo "
			<HTML>
			<HEAD><Title>All Users</Title>
			<style>
				table{
					width: 100%;
				}
				
				table th,td{
					border: 1px;
				}
				
				table th{
					text-align: left;
					background-color: #867657;
					color: #ffffff;
					padding: 4px 8px;
				}
				
				table td{
					border: 1px solid #e3e3e3;
					padding: 4px 8px;
				}
				
				table tr:nth-child(odd) td
				{
					background-color: #f3f3f3;
				}
				
				.trans_btn{
					font-family: Helvetica;
   					width: 100px;
    				height: 25px;
    				border-radius: 3px;
    				background-color: green;
    				border: 2px solid black;
    				transition: background-color 2s;
    				color:white;
				}

				.trans_btn:hover{
					cursor:pointer;
				}

				h1{
					text-align:center;
					color:blue;
					font-weight:bold;
				}
			</style>
			</HEAD>
			<Body>
    			<h1>All Users</h1>
				<HR size=3 color=green width=100%></HR>
				<TABLE>
					<TR><TH>User Id<TH>User Name<TH>Email Id<TH>Account Number<TH>Current Amount<TH>Action</TR>
	";


//Getting the Details of Users and Diplaying it in a Table

$sql="SELECT * FROM users";
$result= $conn->query($sql);
if($result->num_rows>0){
	while($row=$result->fetch_assoc()){
		
		echo"
			
			<TR>
				<TD>".$row['User_id'].
				"<TD>".$row['Name'].
				"<TD>".$row['Email'].
				"<TD>".$row['Acc_no'].
				"<TD>".$row['Curr_balance'].
				"<TD>
					<a href='receiver_detail.php?share=".$row['User_id']."'>
						<button type='button' class='trans_btn'>
						Send Money
						</button>
					</a>
			</TR>
		";
	}
}
?>
</TABLE>

</Body>
</HTML>
