<?php
session_start();
defined('BASEPATH') OR exit('No direct script access allowed'); 
if (empty($_SESSION['key']))
$_SESSION['key'] = bin2hex(random_bytes(32));

$csrf2= hash_hmac('sha256','this is some string: login.php', $_SESSION['key']);
$_SESSION['token']=$csrf2; ?>
<!DOCTYPE html>
<html>
<head>
<title>Welcome | Online Quiz</title>    
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0,user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="icon" sizes="50x50" href="<?php echo base_url(); ?>assets-frontend/img/user.PNG">
<style type="text/css">
    


.fl-container {
  height: 100vh;

  background: url() no-repeat center center/cover;
    display: flex;
    flex-flow: row wrap;
justify-content: flex-start;
align-items: center;
}


.btn {
    font-weight: 700;
    height: 36px;
    -moz-user-select: none;
    -webkit-user-select: none;
    user-select: none;
    cursor: default;
}

/*
 * Card component
 */
.card {
  background-color: #f7f7f7db;
  padding: 20px 25px 30px;
  -moz-border-radius: 2px;
  -webkit-border-radius: 2px;
  border-radius: 2px;
  -moz-box-shadow: 10px 12px 32px rgba(0, 0, 0, 0.3);
  -webkit-box-shadow:10px 12px 32px rgba(0, 0, 0, 0.3);
  box-shadow: 10px 12px 32px rgba(0, 0, 0, 0.3);
  width: 500px;
  margin-left: 10%;
}

.profile-img-card {

    margin: 0 auto 10px;
    display: block;

}

/*
 * Form styles
 */
.profile-name-card {
    font-size: 16px;
    font-weight: bold;
    text-align: center;
    margin: 10px 0 0;
    min-height: 1em;
}

.reauth-email {
    display: block;
    color: #404040;
    line-height: 2;
    margin-bottom: 10px;
    font-size: 14px;
    text-align: center;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}

.form-signin #inputEmail,
.form-signin #inputPassword {
    direction: ltr;
    height: 44px;
    font-size: 16px;
}

.form-signin input[type=email],
.form-signin input[type=password],
.form-signin input[type=text],
.form-signin button {

    display: block;
    margin-bottom: 10px;
    z-index: 1;
    position: relative;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}

.form-signin .form-control:focus {
    border-color: rgb(104, 145, 162);
    outline: 0;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgb(104, 145, 162);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgb(104, 145, 162);
}

.btn.btn-signin {
    /*background-color: #4d90fe; */
    background-color:#faa519;
    /* background-color: linear-gradient(rgb(104, 145, 162), rgb(12, 97, 33));*/
    padding: 0px;
    font-weight: 700;
    font-size: 14px;
    height: 36px;
    -moz-border-radius: 3px;
    -webkit-border-radius: 3px;
    border-radius: 3px;
    border: none;
    -o-transition: all 0.218s;
    -moz-transition: all 0.218s;
    -webkit-transition: all 0.218s;
    transition: all 0.218s;
        width: 30%; color:#000; text-transform: uppercase;
}

.btn.btn-signin:hover,
.btn.btn-signin:active,
.btn.btn-signin:focus {
    background-color: rgb(12, 97, 33);
}

.forgot-password {
    color: rgb(104, 145, 162);
}

.forgot-password:hover,
.forgot-password:active,
.forgot-password:focus{
    color: rgb(12, 97, 33);
}
.error { color: red; }
</style>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
</head>
<body>
    <div class="fl-container" style="background-color:#b2d9d8";>


        <div class="card card-container" >
            <form action="start-quiz.php"></form>
            <img id="profile-img" class="profile-img-card" src="<?php echo base_url(); ?>assets-frontend/img/user-png.jpg" height="80" width="90">

            <p id="profile-name" class="profile-name-card">Login</p>
            <div class="error"><?php if(!empty($error_msg)) echo $error_msg; ?></div>
            <form class="form-signin" name="login-form" action="" method="post">
                <span id="reauth-email" class="reauth-email"></span>

                <input type="text" id="uname" name="uname" class="form-control" placeholder="Username"  autocomplete="off" required autofocus />
                <?php echo form_error('uname', '<label id="uname-error" class="error" for="uname">', '</label>'); ?>

                <input type="password" id="upassword" name="upassword" class="form-control" placeholder="Password" autocomplete="off"  required />
                <?php echo form_error('upassword', '<label id="upassword-error" class="error" for="upassword">', '</label>'); ?>
                <input type="hidden" name="csrf1" value="<?php echo $csrf2 ?>">
                <button class="btn btn-lg btn-primary btn-block btn-signin" name="btn_login" type="submit">Sign in</button>
            </form><!-- /form -->
            <a href="registration.php" class="forgot-password">
                Click here to register
            </a>

    </div>
        </div>
</body>
</html>


