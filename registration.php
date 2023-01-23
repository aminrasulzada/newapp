<?php 
session_start();
 if (empty($_SESSION['key']))
    $_SESSION['key'] = bin2hex(random_bytes(32));

$csrf2= hash_hmac('sha256','this is some string: login.php', $_SESSION['key']);
$_SESSION['token']=$csrf2;    ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <p style="background-image: url('bg-image.jpg');">
    <title>Registration</title>
    <link rel="stylesheet" href="style1.css"/>
</head>
<body>
<?php
   $host = "localhost";  
   $user = "root";  
   $password = '';  
   $db_name = "web_quiz";  
     
   $con = mysqli_connect($host, $user, $password, $db_name);  
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $password= hash('md5',$_POST ['password']);
        $name=stripslashes($_REQUEST['name']);
        $name= mysqli_real_escape_string($con,$name);
        $query    = "INSERT into `users` (user_name, user_password, first_name, user_role, is_active)
                     VALUES ('$username', '$password', '$name','2','1'  )";
       $result   = mysqli_query($con, $query);
       if ($result) {
           echo "<div class='form' >
                 <h3>You are registered successfully.</h3><br/>
                 <p class='link'>Click here to <a href='index.php'>Login</a></p>
                 </div>";
       } else {
           echo "<div class='form'>
                 <h3>Required fields are missing.</h3><br/>
                 <p class='link'>Click here to <a href='registration1.php'>register/a> again.</p>
                 </div>";
       }
           
    } else {
?>
    <form class="form" action="" method="post" id="frm">
        <p style="background-image: url('bg-image.jpg');">
        <h1 class="login-title">Registration </h1>
        <input type="text" class="login-input" name="username" placeholder="username" required />
        <input type="text" class="login-input" name="name" placeholder="name" required/>
        <input type="password" class="login-input" name="password" placeholder="password">
        <input type="submit" name="submit" id="btn" value="Register" class="login-button">
        <input type="hidden" name="csrf1" value="<?php echo $csrf2 ?>">
        <p class="link"><a href="index.php">Click to Login</a></p>
    </form>
    <style>
body {
  background-image: url('bg-image.jpg');
  background-repeat: no-repeat;
}
</style>
<?php
    }
?>

</body>
</html>