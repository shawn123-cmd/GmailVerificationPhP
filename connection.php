<?php

$server = 'localhost';
$user = 'root';
$password = '';
$db = 'gmail';

$con = mysqli_connect($server, $user, $password, $db);

if($con){
?>
<script>
    alert("Connection Successfull");
</script>
<?php
}else{
    ?>
    <script>
        alert(" Not Connected");
    </script>
    <?php  
}
?>