<?php
//database creds
include 'db_config.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT numberwang FROM NumberWang WHERE incrementer= 1" ;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo $row["numberwang"];
    }
} else {
    echo "0";
}
$conn->close();
?>