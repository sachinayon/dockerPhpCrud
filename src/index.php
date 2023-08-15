<?php
$conn = new mysqli('db', 'root', '123', 'docker_php_crud');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM items");
if ($result) {
    // Rest of your code for fetching and displaying records
} else {
    echo "Query failed: " . $conn->error;
}
?>
<html>
<body>
    <h1>CRUD Application</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['name'] ?></td>
                <td><?= $row['description'] ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>