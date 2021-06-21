<?php
$servername="localhost";
$username="root";
$password="";
$dbname="ebookportal";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//fetch from database
$sql = "SELECT * from books";
$result = $conn->query($sql);

?>
<html>
</head>
<title>Books Display</title>
<link rel="stylesheet" type="text/css" href="display.css">
</head>
<body>
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="">Books</a></li>
			<li><a href="loginpage.php">Logout</a></li>
		</ul>
	<div style="overflow-x:auto;">
	<h1>Books Available</h1>
		<table width="100%" cellspacing="0" cellpadding="18">
				<div class="header">
					<th>Book Name</th>
					<th>Book Description</th>
					<th>Book Author</th>
					<th>Book Language</th>
					<th>Download Link</th>
					<th>Uploader Name</th>
					<th>Uploader Email</th>
				</div>	
					<tr>
						<?php
							while($row = $result->fetch_assoc()) {
							echo "<tr>";
							echo "<td>".$row['bookname']."</td>";
							echo "<td>".$row['bookdesc']."</td>";
							echo "<td>".$row['bookauthor']."</td>";
							echo "<td>".$row['booklang']."</td>";
							echo "<td><a href='http://localhost/ebookportal/files/" .$row['bookfile']."'><b>Download E-Book</b></a></td>";
							echo "<td>".$row['uploadername']."</td>";
							echo "<td>".$row['uploaderemail']."</td>";
							echo "</tr>";
							}
						?>
		</table>
	</div>
</body>
</html>
