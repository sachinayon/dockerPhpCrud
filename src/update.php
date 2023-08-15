<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = new mysqli('db', 'root', '123', 'docker_php_crud');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];

    $sql = "UPDATE items SET name='$name', description='$description' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
        exit;
    } else {
        echo "Error updating record: " . $conn->error;
    }
} elseif (isset($_GET['id'])) {
    $conn = new mysqli('db', 'root', '123', 'docker_php_crud');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM items WHERE id=$id");
    $row = $result->fetch_assoc();
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
<title>Docker PHP CRUD | Edit</title>
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
            <form method="POST" action="update.php">
                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control" value="<?= $row['name'] ?>" required>
                <label for="description">Description:</label>
                <textarea name="description" id="description" class="form-control" required><?= $row['description'] ?></textarea>
                <input type="submit" value="Update" class="btn btn-primary btn-sm w-100 my-2">
            </form>
        </div>
    </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>
</html>