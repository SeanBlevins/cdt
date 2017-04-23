<?php
//database creds
include 'db_config.php';

$vote = $_POST['vote'];

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
        $currentVotes = $row["numberwang"];
        $currentVotes =  $currentVotes + $vote;
    }
} else {
    echo "0";
}


$sql = "UPDATE NumberWang SET numberwang='$currentVotes' WHERE incrementer= 1";

if ($conn->query($sql) === TRUE) {
    echo $currentVotes;
} else {
    echo "0";
}


$conn->close();
?>