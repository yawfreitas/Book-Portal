<?php
$servername="localhost";
$username="root";
$password="";
$dbname= "ebookportal";

//Create Connection
$conn=new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//get values from form
if (isset($_POST['bookname'])) {
$booknameVar=$_POST['bookname'];
}
if (isset($_POST['bookdesc'])) {
$bookdescVar=$_POST['bookdesc'];
}
if (isset($_POST['bookauthor'])) {
$bookauthorVar=$_POST['bookauthor'];
}
if (isset($_POST['booklang'])) {
$booklangVar=$_POST['booklang'];
}

//File Upload
if(isset($_FILES['bookfile']))
{
     
    $file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
    $file_size = $_FILES['file']['size'];
    $file_type = $_FILES['file']['type'];
    $folder="files/";
	
			//Move File
			if(move_uploaded_file($_FILES['bookfile']['tmp_name'], "files/ {$_FILES['bookfile']['name']}"))
			{
			$bookfile="{$_FILES['bookfile']['name']}";
			}
	
    
		else{
		echo "Wrong File Type";
			}
}

if (isset($_POST['uploadername'])) {
$uploadernameVar=$_POST['uploadername'];
}
if (isset($_POST['uploaderemail'])) {
$uploaderemailVar=$_POST['uploaderemail'];
}

//Insert Values
$sql = "INSERT INTO books (bookname, bookdesc, bookauthor, booklang, bookfile, uploadername, uploaderemail) 
VALUES ('$booknameVar', '$bookdescVar', '$bookauthorVar', '$booklangVar', '$bookfileVar', '$uploadernameVar', '$uploaderemailVar')";

//To check whether data is inserted properly or not
if ($conn->query($sql) === TRUE) {
	echo '<script type="text/javascript">'; 
	echo 'alert("New record created successfully. Click OK to go to Book Display Section.");'; 
	echo 'window.location.href = "displaydata.php";';
	echo '</script>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
