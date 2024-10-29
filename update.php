<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM crud WHERE ID = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    $stmt = $conn->prepare("UPDATE crud SET Name = ?, Email = ? WHERE ID = ?");
    $stmt->bind_param("ssi", $name, $email, $id);

    if ($stmt->execute()) {
        echo "Record updated successfully";
        header("Location: read.php");
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    $stmt->close();
}
?>

<form action="update.php" method="POST">
    ID: <input type="text" name="id" value="<?php echo $row['ID']; ?>" readonly><br>
    Name: <input type="text" name="name" value="<?php echo $row['Name']; ?>" required><br>
    Email: <input type="email" name="email" value="<?php echo $row['Email']; ?>" required><br>
    <input type="submit" name="update" value="Update User">
</form>
