<?php include('server.php') ?>
<!DOCTYPE html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="registration.css">
</head>
<body>   
    
<h1><b>E-Book Access Library</b></h1>
<div id="login-box">
<form method="post" action="loginpage.php" class="content">
<div class = "left"> 
    <h2>Welcome back,</h2>
    <?php include('errors.php'); ?>
    <div class = "input-group">
        <label>Username</label><br>
        <input type="text" name="username" required>
</div>
<div class = "input-group">
    <label>Password</label><br>
    <input type="password" name="password" required>
</div>
<br>
<div class = "input-group">
    <button type="submit" class="btn" name="login_user">Login</button>
</div>
<p>
    <br>Not a member yet? <a href = "registrationpage.php">Sign up</a>
</p>
</div>
</form>
</body>
</html>
