<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @import url(https://fonts.googleapis.com/css?family=Roboto:400,300,500);
*:focus {
  outline: none;
}

body {
  margin: 0;
  padding: 0;
  background: #DDD;
  font-size: 16px;
  color: #222;
  font-family: 'Roboto', sans-serif;
  font-weight: 300;
}

#login-box {
  position: relative;
  margin: 5% auto;
  width: 600px;
  height: 500px;
  background: #FFF;
  border-radius: 2px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
}

.left {
  position: absolute;
  top: 0;
  left: 0;
  box-sizing: border-box;
  padding: 40px;
  width: 300px;
  height: 600px;
}

.form button {
  border: none;
  padding : 0px;
  margin: 0px;
}

h1 {
  margin: 0 0 20px 0;
  font-weight: 300;
  font-size: 28px;
}

input[type="text"],
input[type="password"] {
  display: block;
  box-sizing: border-box;
  margin-bottom: 20px;
  padding: 4px;
  width: 220px;
  height: 32px;
  border: none;
  border-bottom: 1px solid #AAA;
  font-family: 'Roboto', sans-serif;
  font-weight: 400;
  font-size: 15px;
  transition: 0.2s ease;
}

input[type="text"]:focus,
input[type="password"]:focus {
  border-bottom: 2px solid #16a085;
  color: #16a085;
  transition: 0.2s ease;
}

input[type="submit"] {
  margin-top: 28px;
  width: 120px;
  height: 32px;
  background: #16a085;
  border: none;
  border-radius: 2px;
  color: #FFF;
  font-family: 'Roboto', sans-serif;
  font-weight: 500;
  text-transform: uppercase;
  transition: 0.1s ease;
  cursor: pointer;
}

input[type="submit"]:hover,
input[type="submit"]:focus {
  opacity: 0.8;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
  transition: 0.1s ease;
}

input[type="submit"]:active {
  opacity: 1;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.4);
  transition: 0.1s ease;
}

.or {
  position: absolute;
  top: 180px;
  left: 280px;
  width: 40px;
  height: 40px;
  background: #DDD;
  border-radius: 50%;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
  line-height: 40px;
  text-align: center;
}

.right {
  position: absolute;
  top: 0;
  right: 0;
  box-sizing: border-box;
  padding: 40px;
  width: 300px;
  height: 400px;
  background: url('https://goo.gl/YbktSj');
  background-size: cover;
  background-position: center;
  border-radius: 0 2px 2px 0;
}

button{
  margin-top: 28px;
  width: 120px;
  height: 32px;
  background: #16a085;
  border: none;
  border-radius: 2px;
  color: #FFF;
  font-family: 'Roboto', sans-serif;
  font-weight: 500;
  text-transform: uppercase;
  transition: 0.1s ease;
  cursor: pointer;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.4);
}

.right .loginwith {
  display: block;
  margin-bottom: 40px;
  font-size: 28px;
  color: #FFF;
  text-align: center;
}

button.social-signin {
  margin-bottom: 20px;
  width: 220px;
  height: 36px;
  border: none;
  border-radius: 2px;
  color: #FFF;
  font-family: 'Roboto', sans-serif;
  font-weight: 500;
  transition: 0.2s ease;
  cursor: pointer;
}

button.social-signin:hover,
button.social-signin:focus {
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
  transition: 0.2s ease;
}

button.social-signin:active {
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.4);
  transition: 0.2s ease;
}

button.social-signin.facebook {
  background: #32508E;
}

button.social-signin.twitter {
  background: #55ACEE;
}

button.social-signin.google {
  background: #DD4B39;
}
    </style>
</head>
<body>

<?php

include 'connection.php'; 


if(isset($_POST['submit'])){
    $fname = mysqli_real_escape_string( $con, $_POST['fname']);
    $email = mysqli_real_escape_string( $con, $_POST['email']);
    $phone = mysqli_real_escape_string( $con, $_POST['phone']);
    $password = mysqli_real_escape_string( $con, $_POST['password']);
    $cpassword = mysqli_real_escape_string( $con, $_POST['cpassword']);

    $pass = password_hash($password, PASSWORD_BCRYPT );
    $cpass = password_hash($cpassword, PASSWORD_BCRYPT );

    $token = bin2hex(random_bytes(15));

    $emailquery = "select * from reg where email = '$email' and status = 'active' ";

    $query = mysqli_query($con, $emailquery);

    $emailcount = mysqli_num_rows($query);

    if($emailcount>0){
      echo 'email already exist';
    }else{
      if($password === $cpassword){
      
        $insertquery = "insert into reg(name, email, phone, password, cpassword, token, status) values('$fname', '$email', '$phone', '$pass', '$cpass', '$token', 'inactive')";

        $iquery = mysqli_query($con, $insertquery);

        if($iquery){

          
$subject = "Email Activation";
$body = "Hi, $fname. Click Here To Activate Your Account
http://localhost/SignUpG/Activate.php?token=$token";
$sender_email = "From: sj961440@gmail.com";

if(mail($email, $subject, $body, $sender_email)) { 
 $_SESSION['msg'] = "check your mail to activate your account $email";
 header('location:login.php');
} else {
    echo "Email sending failed to $to...";
}



          ?>
          <script>
              alert("Inserted Properly");
          </script>
          <?php
          }else{
              ?>
              <script>
                  alert("Not Inserted");
              </script>
              <?php  
          }
      
      }else{
        ?>
              <script>
                  alert("Password Not Matching");
              </script>
              <?php 
      }
    }
}

?>


<div id="login-box">
  <div class="left">
    <h1>Sign up</h1>
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
    <input type="text" name="fname" placeholder="Full Name" />
    <input type="text" name="email" placeholder="E-mail" />
    <input type="text" name="phone" placeholder="Phone" />
    <input type="password" name="password" placeholder="Password" />
    <input type="password" name="cpassword" placeholder="Retype password" />
    
    <button type="submit" name="submit" value="Sign me up">Sign Up</button>
    <p>Have an Account? <a href="Login.php">Log in</a></p>
   
    </form>
  </div>
  
  <div class="right">
    <span class="loginwith">Sign in with<br />social network</span>
    
    <button class="social-signin facebook">Log in with facebook</button>
    <button class="social-signin twitter">Log in with Twitter</button>
    <button class="social-signin google">Log in with Google+</button>
  </div>
  <div class="or">OR</div>
</div>
</body>
</html>