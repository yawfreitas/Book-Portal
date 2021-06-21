<?php
session_start();

if(!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: loginpage.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: loginpage.php");
}
?>

<html>
<head>
    <title>E-Book Portal</title>
        <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <ul>
        <li><a href="">Home</a><li>
        <li><a href="displaydata.php">Books</a></li>
        <li><a href="loginpage.php">Logout</a></li>
    </ul>
    <div class = "form">
        <h2>E-Book Input Portal</h2>
        <form method="POST" action="connection.php" enctype="multipart/form-data" onsubmit="return validate(this)">
        <label>Bookname</label>
        <input type="text" id="name" name="bookname" required/>
        <label>Book Description</label>
        <textarea cols="25" rows="4" name="bookdesc" required></textarea>
        <label>Name of Author</label>
        <input type="text" id="name" name="bookauthor" required/>
        <select name="booklang" required>
            <option selected disabled>Choose Language Book is in</option>
            <option value="English">English</option>
            <option value="French">French</option>
            <option value="German">German</option>
            <option value="Spanish">Spanish</option>
            <option value="Other">Other Language</option>
        </select>
        <div style="padding-bottom": 6px><lable>Select Book</label></div>
        <input type="file" name="bookfile" required/>
        <label>Uploader's Name</label>
        <Input type="text" id="name" name="uploadername" required/>
        <label>Uploader's Email</label>
        <input type="email" id="name" name="uploaderemail" required/>
        <button type = "submit" class="btn" name="submit">Submit</button>
        </form>
    </div>
	</body>
</html>
 <script>
    function validate() {
    var val = document.getElementById('bookfile').value.toLowerCase();
    var regex = new RegExp("(.*?)\.(docx|doc|pdf)$");
        if(!(regex.test(val))) {
            document.getElementById('bookfile').value = '';
            alert('Please select correct file format.');
            return false;   
        }
		return true;
		}
</script>

