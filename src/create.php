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
<html>
<body>
    <h1>Create Item</h1>
    <form method="POST" action="create.php">
        Name: <input type="text" name="name"><br>
        Description: <textarea name="description"></textarea><br>
        <input type="submit" value="Create">
    </form>
</body>
</html>