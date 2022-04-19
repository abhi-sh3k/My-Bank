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

//Declaring the session variables 
$uid=$_SESSION['uid'];
$r_acc=$_SESSION['r_acc'];

//Getting Sender Details
$cmd="SELECT * from users where User_id=$uid";
$sql=mysqli_query($conn,$cmd);

while($rec=mysqli_fetch_assoc($sql))
{
  $snm=$rec["Name"];
  $sem=$rec["Email"];
  $sacc_no=$rec["Acc_no"];
  $scb=$rec["Curr_balance"];

}

//Getting Receiver Details
$cmd2="SELECT * from users where Acc_no=$r_acc";
$sql2=mysqli_query($conn,$cmd2);

while($rec2=mysqli_fetch_assoc($sql2))
{
  $rnm=$rec2["Name"];
  $rem=$rec2["Email"];
  $racc_no=$rec2["Acc_no"];

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
    top: 50%;
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
    color:#665d1e;
    margin-left:120px;
    background-color: #fff9e3;    		
    border-radius:10px;
  }
  
  .form button:hover{
    cursor:pointer;
    background-color:#ff0000;
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
  
  <FORM name=send_money method="POST" action="validate_amt.php" enctype="multipart/form-data">
    <h3 id="yd">Your Details</h3>

<?php
echo '

<Input type=text name=sname value="'.$snm.'" disabled>
<Input type=text name=sem value="'.$sem.'" disabled>
<Input type=text name=sacc value="Acc.no - '.$sacc_no.'" disabled>
<h3 id="rd">Receiver Details</h3>
<Input type=text name=rname value="'.$rnm.'" disabled>
<Input type=text name=rem value="'.$rem.'" disabled>
<Input type=text name=racc value="Acc.no - '.$racc_no.'" disabled>
<Input type=text name=amt placeholder="Amount to Transfer">
<button type=submit>Transfer Money</button>

';
?>
</FORM>
</BODY>
</HTML>
