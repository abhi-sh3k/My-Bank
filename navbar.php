<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MY Bank</title>
    <style type="text/css">
    	*{
    		padding: 0;
    		margin: 0;
    		text-decoration: none;
    	}
    	body{
    		font-family: ,montserrat;
    	}
    	label{
    		color: white;
    		font-size: 25px;
    		line-height: 50px;
    		padding: 0 20px;
    		font-weight: bold;
    	}
    	nav{
    		background: #444444;
    		height: 50px;
    		width:100%;

    	}
    	nav ul{
    		float: right;
    		margin-right: 31.5%;

    	}
    	nav ul li{
    		display: inline-block;
    		line-height: 10px;
    		padding-top: 20px;
    		margin: 0 10px;
    	}
    	nav ul li a{
    		color: #f3f6f4;
    		padding: 7px 13px;
    		font-size: 18px;
            border-radius: 4px;		
    	}
    	a.active,a:hover{
            background-color: #f3f6f4;
    		color:blue;
    		transition: 0.3s;
    	}

    </style>

</head>
<body>
	<nav>
		<label class="logo">MY Bank</label>
		<ul>
			<li><a href="home.php">Home</a></li>
			<li><a href="users.php">Users</a></li>
			<li><a href="transactions.php">Transactions History</a></li>
			<li><a href="contact.php">Contact Us</a></li>
		</ul>
	</nav>
    
</body>
</html>