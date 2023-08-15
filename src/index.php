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
        <div class="col-1 col-md-4"></div>
        <div class="col-10 col-md-4">
            <h5 class="text-center my-2">Docker PHP CRUD</h5>
        </div>
        <div class="col-1 col-md-4">
            <a href="create.php" class="btn btn-primary btn-sm">Add New</a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-8">
            <table class="table table-striped table-bordered">
                <tr class="text-center">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                </tr>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr class="text-center">
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['name'] ?></td>
                        <td><?= $row['description'] ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>
</html>