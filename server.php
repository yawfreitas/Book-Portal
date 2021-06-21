<?php
session_start();

//Intializing the variables
$username = "";
$email = "";
$errors = array();

//Connecting server to database
$db = mysqli_connect('localhost', 'root', '', 'ebookportal');

//Registering the user
if (isset($_POST['reg_user'])) {
    //Receieving all the input from the form
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db,$_POST['password_2']);

//Ensuring that the form is correctly filled
//adding (arrary_push()) corresponding to error unto $errors array

if(empty($username)) { array_push($errors, "Username is required");}
if(empty($email)) {array_push($errors, "Email is required");}
if(empty($password_1)) {array_push($errors, "Password is required");}
if($password_1 != $password_2) {array_push($errors, "The two passwords do not match");}

//Checking database to see if username or email exists already
$user_check_sql = "SELECT * FROM user where username='$username' OR email='$email' LIMIT 1";
$result = mysqli_query($db,$user_check_sql);
$user = mysqli_fetch_assoc($result);

if($user) {//if user exists
    if($user['username'] == $username){
        array_push($errors,"Username already exists");
    }
    if($user ['email'] == $email) {
        array_push($errors, "Email already exists");
    }
}
 // Registering User if no error occurs
 if(count($errors) == 0) {
     $password = md5($password_1); //Hashing the password

     $sql = "INSERT INTO user (username, email, password) VALUES('$username','$email','$password')";
     mysqli_query($db, $sql);
     $_SESSION['username'] = $username;
     $_SESSION['success'] = "You are now logged in";
     header('location: index.php');
     }
    }

if (isset($_POST['login_user'])){
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);


    //Making sure forms are field
    if(empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if(count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM user WHERE username='$username' and password ='$password'";
        $results = mysqli_query($db,$query);
        if (mysqli_num_rows($results) == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
        header('location: index.php');
        } else {
            array_push($errors, "Wrong username or password");
        }
    }
}

?>
