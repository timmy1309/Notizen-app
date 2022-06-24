<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="assets/css/test.css" rel="stylesheet">
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

    $sql = "SELECT * FROM notebook WHERE id ={$id}";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo '
                    <div class="card-container">
                        <div class="card">
                            <div class="card-body">
                                <h1 class="card-title"> ' . $row["titel"] . ' </h1>
                                <p class="card-text"> ' . $row["text"] . ' </p>
                                <button>
                                    <a class="card-link" href="index.php"> Back to Start Page</a>
                                </button>
                            </div>
                            <button  class="edit-button">
                                <a href="edit-note.php?id=' . $row["id"] . '">Edit note</a>
                            </button>
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