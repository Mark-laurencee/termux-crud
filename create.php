<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
include 'db.php';

if (isset($_POST['create'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Using a prepared statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO crud (ID, Name, Email) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $id, $name, $email);

    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>

<form action="create.php" method="POST">
    ID: <input type="number" name="id" required><br>
    Name: <input type="text" name="name" required><br>
    Email: <input type="email" name="email" required><br>
    <input type="submit" name="create" value="Create User">
</form>

</body>
</html>
