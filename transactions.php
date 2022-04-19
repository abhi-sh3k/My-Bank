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
			<HEAD><Title>Transaction History</Title>
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
				
				

				h1{
					text-align:center;
					color:blue;
					font-weight:bold;
				}
			</style>
			</HEAD>
			<Body>
    			<h1>Transaction History</h1>
				<HR size=3 color=green width=100%></HR>
				<TABLE>
					<TR><TH>Transaction Id<TH>Sender's Acc.No<TH>Receiver's Acc.no<TH>Amount Transferred<TH>Date of Transaction</TR>
			";


//Getting Details of Transactions and Diplaying it in a Table

$sql="SELECT * FROM transactions";
$result= $conn->query($sql);
if($result->num_rows>0){
	while($row=$result->fetch_assoc()){
		
		echo"
			
			<TR>
				<TD>".$row['Trans_id'].
				"<TD>".$row['Sender'].
				"<TD>".$row['Receiver'].
				"<TD>".$row['Amount'].
				"<TD>".$row['Trans_date'].
			"</TR>	
		";	
	}
}
?>

</TABLE>
</Body>
</HTML>
