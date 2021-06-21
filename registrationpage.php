<?php
include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
    <link rel="stylesheet" href = "registration.css">
</head>
<body>


<h1><b>E-Book Access Library</b></h1>
<div id="login-box">
<form method="post" action = "registrationpage.php" class = "content">
<div class = "left">   
<?php include('errors.php'); ?>
    <h2>Sign Up Here</h2>
    <div class = "input-group">
        <label>Username</label>
        <input type="text"  name="username" value= "<?php echo $username; ?>" required>    
    </div>
    <div class = "input-group">
        <label>E-mail</label>
        <input type = "text" name="email" value="<?php echo $email; ?>" required >
    </div>
<div class="input-group">
    <label>Password</label>
    <input type="password" name="password_1" required>
</div>
<div class="input-group">
    <label>Confirm Password</label>
    <input type="password" name="password_2" required>
</div>
    <div class="input-group">
    <button type = "submit" class="btn" name="reg_user">Register</button>
    </div>
    <br>
    Already have an account?<br><a href = "loginpage.php" color = "white">Sign in</a>
</div>
</form>
</body>
</html> 
