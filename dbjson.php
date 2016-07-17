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
 
//$myArray = array('moneymanager' => array());
$myArray = array();
$myArray2 = array();
$g_id=0;
if ($result = $conn->query("SELECT * FROM moneyinventory WHERE id> ".$g_id)) {

    while($row = $result->fetch_array(MYSQL_ASSOC)) {
            $myArray[] = $row;
    }
    $myArray2= ($myArray);
}
echo json_encode(array('moneymanager' => $myArray2));
$result->close();
$conn->close();
?>
