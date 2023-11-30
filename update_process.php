<?php
require('connect.php');



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $subject = $_POST['subject'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $message = $_POST['message'];

    $sql = "UPDATE crudform SET firstname='$firstname', lastname='$lastname', email='$email', gender='$gender', address='$address', subject='$subject', country='$country', city='$city', message='$message' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo'<div class="alert alert-success" role="alert">
        Record Updated successfully
      </div>';
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    echo "Invalid request method";
}
$conn->close();
?>