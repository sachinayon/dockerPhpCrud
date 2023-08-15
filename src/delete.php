<?php
if (isset($_GET['id'])) {
    $conn = new mysqli('db', 'root', '123', 'docker_php_crud');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $id = $_GET['id'];
    $sql = "DELETE FROM items WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
        exit;
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
?>
<html>
<body>
    <h1>Delete Item</h1>
    <p>Are you sure you want to delete this item?</p>
    <a href="delete.php?id=<?= $_GET['id'] ?>">Yes</a>
    <a href="index.php">No</a>
</body>
</html>