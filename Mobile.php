
<?php

session_start();

if(!isset( $_SESSION['name'])){
    header('location:login.php');
}

?>

<!DOCTYPE html>
<html>
<head>
	
	<title>Shawn's Mobile</title>
	<style type="text/css">
		*{
			margin: 0;
			padding: 0;
			font-family: century gothic;
		}

		header{
		   background-image:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url(apple.jpg);
		   height: 100vh;
		   background-size: cover;
		   background-position: center;
		}

		ul{
			 list-style-type: none;
			 float: right;
			 margin-top: 25px;
		}
		ul li {
			display: inline-block;
    }

		ul li a{
			text-decoration: none;
			color: black;
			padding: 5px 20px;
			
			transition: 0.6s ease;
		}
		ul li a:hover{
			background-color: white;
			color: black;
		}

		ul li.active a{
              background-color: white;
			color: black;
		}
		.logo img{
               float: left;
               width: 150px;
               height: auto;

		}
		.main{
			max-width: 1200px;
			margin: auto;
		}

		.title{
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%,-50%);
            line-height : 6rem;
		}

		.title h1{
			color: white;
			font-size: 70px;
            
		}

        .title h2{
			/* color: #454545; */
            color: white;
			font-size: 40px;
            text-align: center;
            font-weight : lighter;
		}

		.button{
			position: absolute;
			top: 70%;
			left: 50%;
			transform: translate(-50%,-50%);
		}

		.btn{
			border: 1px solid black;
			padding: 10px 30px;
			color: white;
			text-decoration: none;
			margin-top: 20px;
			transition: 0.6s ease;
		}
 
      .btn:hover{
      	background-color: white;
			color: black;
      }

	</style>
</head>
<body>
  <header>
  	<div class="main">
  		<div class="logo">
  			<img src="cell phone2.png">
  		</div>
  		<ul>
  			<li ><a href="#">Home</a></li>
  			<li><a href="#">Services</a></li>
  			<li><a href="#">Contact</a></li>
  			<li><a href="#">Gallery</a></li>
  			<li class="active"><a href="logout.php">LOG OUT</a></li>	
  		</ul>
  	</div>
  	<div class="title">
  		<h1>Iphone's Shop</h1>
        <h2> Hello this is <?php echo $_SESSION['name'] ?></h2>
  	</div>
  	<div class="button">
  		<a href="#" class="btn">Online Order</a>
  		<a href="#"class="btn">Home Delivery</a>
  	</div>

  </header>
</body>
</html>