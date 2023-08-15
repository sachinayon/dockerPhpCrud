<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = new mysqli('db', 'root', '123', 'docker_php_crud');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $name = $_POST['name'];
    $description = $_POST['description'];

    $sql = "INSERT INTO items (name, description) VALUES ('$name', '$description')";
    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Docker PHP CRUD"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
<title>Docker PHP CRUD</title>
</head>
<body>
    <div class="row align-items-center my-2">
        <div class="col-4"></div>
        <div class="col-4">
            <h5 class="text-center my-2">Docker PHP CRUD</h5>
        </div>
        <div class="col-4">
            <a href="/" class="btn btn-primary btn-sm">Item List</a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-6">
            <form method="POST" action="create.php">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control" required>
                <label for="description">Description:</label>
                <textarea name="description" id="description" class="form-control" required></textarea>
                <input type="submit" value="Create" class="btn btn-primary btn-sm w-100 my-2">
            </form>
        </div>
    </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>
</html>