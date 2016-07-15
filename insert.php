<?php
$servername = "localhost";
$username = "root";
$password = "petrol123";
$dbname = "moneymanagerdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$purpose=mysqli_real_escape_string($conn, $_POST["prp"]);
$type=mysqli_real_escape_string($conn, $_POST["type"]);
$amt=mysqli_real_escape_string($conn, $_POST["amt"]);
$date=mysqli_real_escape_string($conn, $_POST["date"]);
$sql3="SELECT MAX(id) AS micro FROM moneyinventory";
$lid = $conn->query($sql3)->fetch_object()->micro;
//$mlid=mysqli_real_escape_string($conn, $lid);
$sql1 = "SELECT balance FROM moneyinventory WHERE id=".$lid;
$baln = $conn->query($sql1)->fetch_object()->balance;
$balance = $baln - $amt;
$sql = "INSERT INTO moneyinventory (prps, type, amt, date, balance) VALUES ('$purpose', '$type', $amt, '$date', $balance)";
//$conn->query($sql);
if($conn->query($sql) ===TRUE) {
	/*$last_id = $conn->insert_id;
	echo "Successfully added" .$last_id;
	echo "Balance last is" .$baln;
	echo "Lid is" .$lid;*/
	header("Location:/success.php");
	exit();
	//echo "Added";
}
else{
    //echo "Error: " . $sql . "<br>" . $conn->error;
    header("Location:/ifail.php");
    exit();
}

$conn->close();
?>
