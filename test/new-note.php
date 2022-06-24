<?php
$servername = "127.0.0.1:8889";
$username = "root";
$password = "root";
$dbname = "note-db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$title = $_POST['title'];
$note = $_POST['note'];

$sql = "INSERT INTO notebook (titel, text) VALUES ('{$title}', '{$note}')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header("Location: ./index.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>