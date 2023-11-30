<?php
require('connect.php');
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $query = "DELETE FROM crudform WHERE id = $id";
    if ($conn->query($query) === TRUE) {
        require('connect.php');
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "Invalid request. Please provide an 'id' parameter.";
}
$conn->close();