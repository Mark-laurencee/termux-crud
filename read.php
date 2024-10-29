<?php
include 'db.php';

$sql = "SELECT * FROM crud";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['ID'] . "</td>
                <td>" . $row['Name'] . "</td>
                <td>" . $row['Email'] . "</td>
                <td>
                    <a href='update.php?id=" . $row['ID'] . "'>Edit</a> | 
                    <a href='delete.php?id=" . $row['ID'] . "' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                </td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No records found.";
}

$conn->close();
?>
