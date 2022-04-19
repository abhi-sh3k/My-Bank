<?php
    //Creating a connection 
    $conn=mysqli_connect("localhost","root","");
    
    if(!$conn){
        die(" Database connection not established".mysqli_connect($conn));
    }
    
    //Creating Database
    $sql="CREATE DATABASE bankdb";
    
    if(!mysqli_query($conn,$sql)){
        die(" Database Creation failed<BR>");
    }
    
    else{
        echo ("Database has been created<BR>");
    }

    if(!mysqli_select_db($conn,"bankdb")){
        die("Could not be able to Connect to the Database".mysqli_error($conn));
    }
    
    //Creating Users Table
    $cmd="CREATE TABLE users(User_id int primary key not null auto_increment,Name varchar(255),Email varchar(255) unique not null,Acc_no varchar(255) unique not null,Curr_balance int(255))";

    $sql2=mysqli_query($conn,$cmd);
    
    if(!$sql2)
    {
        die(" users table is not created".mysqli_error($conn));
    }
    else{
        echo ("Users Table has been created<BR>");
    }

    //Entering Records of Users
    $cmd2 = "INSERT INTO `users`( `Name`, `Email`,`Acc_no`,`Curr_balance`) VALUES ('Abhishek Choudhary','abhishek123@gmail.com','678634584765','9938968'),('Arun Pratap','apsrajput@gmail.com','935888764526','8687797'),('Tori Black','tory423@gmail.com','938754562496','5590678'),('Mohit Gadwe','mgadwe@yahoo.in','896564357955','6778368'),('Gowtham Maddala','gowtham.maddala@rediffmail.com','865549698687','4667263'),('Harsh Mukati','harsh67@gmail.com','877434668736','2328933'),('Vinay Panwar','panwar.vinay7@yahoo.com','468656758685','3423902'),('Samantha Laruso','samantha.34@gmail.com','758748658986','7466765'),('Mad Max','max.max123@rediffmail.com','785595758599','3462322'),('Abhay Pratap','abh.ay@gmail.com','767558685685','90232')";

    $sql3 = mysqli_query($conn,$cmd2);

    if(!$sql3){
	    echo("Records not Inserted").mysqli_error($conn); 
    }   
    else
    {
	    echo("All users are Inserted into Database<BR>");
    }

    //Creating the Transaction Table 
    $cmd3="CREATE TABLE transactions(Trans_id int primary key not null auto_increment,Sender varchar(255),Receiver varchar(255) not null,Amount int(255),Trans_date datetime not null)";

    $sql4=mysqli_query($conn,$cmd3);
    if(!$sql4){
	    echo ("Transaction Table has not been created<BR>").mysqli_error($conn);
    }
    else{
	    echo ("Transaction Table has been created<BR>");
    }
    echo '
        <script>
        window.location="home.php";
        </script>
    ';
?>