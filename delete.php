<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM crud WHERE ID = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Record deleted successfully";
        header("Location: read.php");
    } else {
        echo "Error deleting record: " . $stmt->error;
    }

    $stmt->close();
}
?>
