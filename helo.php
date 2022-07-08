
<?php
$awsservername = getenv("aws_name");
$username = getenv("name_sql");
$Password = getenv("pass_sql");
$DB = getenv("database_sql");

$user = $_POST['user'];
$password = $_POST['password'];
// Create connection
$con = new mysqli("$awsservername", "$username","$Password","$DB");
if($con->connect_error){
	die("failed to connect : " .$con->connect_error);
} else {
$stmt = $con->prepare("select * from logintable where user = ?");
	$stmt->bind_param("s",$user);
	$stmt->execute();
	$stmt_result = $stmt->get_result();
	if($stmt_result->num_rows > 0) {
	  $data = $stmt_result->fetch_assoc();
		if($data['password'] ==$password) {
		echo "<h1>welcome</h1>";
		} else {
     			echo "<h2>Invalid password</h2>";

		}
	} else {
	 echo "<h2>kuch bhi name mt dalo</h2>";
	}
}
?>
