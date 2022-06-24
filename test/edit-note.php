<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="assets/css/edit-note.css" rel="stylesheet">
</head>
<body>
<header>
    <h1 class="title">
        Notizen
    </h1>
</header>
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
$title = $_POST['title'];
$note = $_POST['note'];

$sql = "SELECT * FROM notebook WHERE id = " . $id;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo '
                    <div class="card-container">
                        <div class="card">
                            <div class="card-body">
                                <form action="new-saved-note.php" method="post">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Edit title</label>
                                        <textarea type="text" class="title-editor form-control" id="title" name="title" aria-describedby="emailHelp">
                                        ' . $row["titel"] . '
                                        </textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="note" class="form-label">Edit note</label>
                                        <textarea type="text" class="text-editor form-control" name="note" id="note">
                                        ' . $row["text"] . '
                                        </textarea>
                                    </div>
                                    <input type="text" class="invisible" value=' . $id . ' id="id" name="id" aria-describedby="emailHelp">
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                    <button  class="edit-button">
                                        <a href="delete.php?id=' . $row["id"] . '">Delete note</a>
                                    </button>
                                </form>
                            </div>
                        </div>  
                    </div>         
            ';
    }
} else {
    echo "0 results";
}
$conn->close();
?>
</body>
</html>
