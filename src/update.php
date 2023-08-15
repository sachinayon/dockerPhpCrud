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
    $conn = new mysqli('db', 'root', 'root_password', 'crud_db');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM items WHERE id=$id");
    $row = $result->fetch_assoc();
}
?>
<html>
<body>
    <h1>Edit Item</h1>
    <form method="POST" action="update.php">
        <input type="hidden" name="id" value="<?= $row['id'] ?>">
        Name: <input type="text" name="name" value="<?= $row['name'] ?>"><br>
        Description: <textarea name="description"><?= $row['description'] ?></textarea><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>