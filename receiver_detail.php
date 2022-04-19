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

//Taking the User id and then Getting the details of Sender from  Users Table

$uid=$_GET['share'];
$_SESSION['uid']=$uid;

$cmd="SELECT * from users where User_id=$uid";
$sql=mysqli_query($conn,$cmd);

while($rec=mysqli_fetch_assoc($sql))
{
  $nm=$rec["Name"];
  $em=$rec["Email"];
  $acc_no=$rec["Acc_no"];
  $cb=$rec["Curr_balance"];

}

?>

<HTML>
<HEAD><Title>
    Transfer Money
</Title>
<Style>
  *{
    margin: 0;
    padding: 0;
    font-family: sans-serif;

}

.form{
  position: absolute;
  top: 40%;
  left:48%;
  width:400px;
  transform: translate(-40%,-50%);

}
.form h3{
  font-size:25px;
  text-align:center;
  margin : 20px 0;
	font-weight:bold;

}
.form input{
  font-size:16px;
  padding:2px 10px;
  width:70%;
  outline:none;
  margin-bottom:10px;
  margin-left:50px;

}
.form button{
        	width: 150px;
    			height: 25px;
          border-radius: 3px;
          font-weight:bold;
          color:;
          margin-left:120px;
    			background-color: skyblue;    		
          border-radius:10px;
    	
}
.form button:hover{
  cursor:pointer;
  background-color:green;
  color:white;
}
h1{
    text-align:center;
  			font-weight:bold;
				}  

#rd{
  color:green;
}
#yd{
  color:red;
}

</Style>
</HEAD>
<Body>
    <h1>Transfer Money</h1>
	<HR size=3 color=green width=100%></HR>

  <div class="form">
  <FORM name=send_money method="POST" action="validate_acc.php" enctype="multipart/form-data">
	<h3 id="yd">Your Details</h3>
<?php
echo '
<Input type=text value="'.$nm.'" disabled>
<Input type=text value="'.$em.'" disabled>
<Input type=text value="Acc.no - '.$acc_no.'" disabled>
<h3 id="rd">Receiver Details</h3>
<Input type=text name="rcvr_acc_no" placeholder="Account Number" maxlength=12><BR>
<button type=submit>Get Account Details</button>
</div>
';


?>
</FORM>
</BODY>
</HTML>
