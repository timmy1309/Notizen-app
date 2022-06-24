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

$id = $_GET['id'];

// sql to delete a record
$sql = "DELETE FROM notebook WHERE id={$id}";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
    header("Location: ./index.php");
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
