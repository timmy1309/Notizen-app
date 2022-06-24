
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="assets/css/index-look.css" rel="stylesheet">
</head>
<body>

<div class="top-bar">
    <header>
        <h1 class="title">Notizen</h1>
    </header>
</div>

<div class="container-fluid" >
    <div class="row">
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
        $id = $_POST['id'];

        $sql = "SELECT id, titel, text FROM notebook";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo '
                        <div class="col-12 col-lg-4">
                            <div class="card">
                            <a href="test.php?id=' . $row["id"] . '" class="card-link">
                                <div class="card-body">
                                    <h5 class="card-title"> ' . $row["titel"] . ' </h5>
                                    <p class="card-text"> ' . $row["text"] . ' </p>
                                    <p>
                                    Click to open the Note
                                    </p>
                                </div>
                            </a>
                            </div>
                        </div>
                ';
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
    </div>
</div>

<div class="bottom-bar">
    <div class="add-container-btn">
        <a href="create-new-note.php" class="button-link">
            <button class="new-note">
                +
            </button>
        </a>
    </div>
</div>

</body>
</html>