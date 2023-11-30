
<?php

require('connect.php');
$firstnameErr = $lastnameErr = $emailErr = $genderErr = $addressErr = $subjectErr = $countryErr = $cityErr = $messageErr = $fileErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["firstname"])) {
        $firstnameErr = "First Name is required";
    } else {
        $firstname = test_input($_POST["firstname"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $firstname)) {
            $firstnameErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["lastname"])) {
        $lastnameErr = "Last Name is required";
    } else {
        $lastname = test_input($_POST["lastname"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $lastname)) {
            $lastnameErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
    } else {
        $gender = $_POST["gender"];
        if (!in_array($gender, ['male', 'female'])) {
            $genderErr = "Invalid gender selected";
        }
    }

    if (empty($_POST["address"])) {
        $addressErr = "Address is required";
    } else {
        $address = test_input($_POST["address"]);
    }

    if (empty($_POST["subject"])) {
        $subjectErr = "Subject is required";
    } else {
        $subject = test_input($_POST["subject"]);
    }

    if (empty($_POST["country"])) {
        $countryErr = "Country is required";
    } else {
        $country = $_POST["country"];
    }

    if (empty($_POST["city"])) {
        $cityErr = "City is required";
    } else {
        $city = test_input($_POST["city"]);
    }

    if (empty($_POST["message"])) {
        $messageErr = "Message is required";
    } else {
        $message = test_input($_POST["message"]);
    }


    if (empty($_FILES["fileupload"]["name"])) {
        $fileErr = "File is required";
    } else {
        $allowedTypes = array("jpg", "jpeg", "png", "gif");
        $maxFileSize = 5 * 1024 * 1024; // 5 MB

        $fileName = $_FILES["fileupload"]["name"];
        $fileSize = $_FILES["fileupload"]["size"];
        $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        if (!in_array($fileType, $allowedTypes)) {
            $fileErr = "Only JPG, JPEG, PNG, and GIF files are allowed.";
        } elseif ($fileSize > $maxFileSize) {
            $fileErr = "File size exceeds the limit of 5MB.";
        }
    }

    if (empty($firstnameErr) && empty($lastnameErr) && empty($emailErr) && empty($genderErr) && empty($addressErr) && empty($subjectErr) && empty($countryErr) && empty($cityErr) && empty($messageErr) && empty($fileErr)) {

        $firstname = test_input($_POST["firstname"]);
        $lastname = test_input($_POST["lastname"]);
        $email = test_input($_POST["email"]);
        $gender = $_POST["gender"];
        $address = test_input($_POST["address"]);
        $subject = test_input($_POST["subject"]);
        $country = $_POST["country"];
        $city = test_input($_POST["city"]);
        $message = test_input($_POST["message"]);

        $fileDestination = "/opt/lampp/htdocs/Crud/uploads/" . $fileName;

        // Attempt to move the uploaded file to the destination folder
        if (move_uploaded_file($_FILES["fileupload"]["tmp_name"], $fileDestination)) {
        } else {
            $fileErr = "Error uploading file";
        }

        $sql = "INSERT INTO crudform (firstname, lastname, email, gender, address, subject, country, city, message, fileupload) 
                VALUES ('$firstname', '$lastname', '$email', '$gender', '$address', '$subject', '$country', '$city', '$message', '$fileDestination')";


    if ($conn->query($sql) === TRUE) {
    $response['status'] = 'success';
    $response['message'] = 'Data validated successfully';
} else {
    $response['status'] = 'error';
    $response['message'] = 'Error inserting data: ' . $conn->error;
}

$conn->close();
} else {
$response['status'] = 'error';
$response['errors'] = array(
    'firstnameErr' => $firstnameErr,
    'lastnameErr' => $lastnameErr,
    'emailErr' => $emailErr,
    'genderErr' => $genderErr,
    'addressErr' => $addressErr,
    'subjectErr' => $subjectErr,
    'countryErr' => $countryErr,
    'cityErr' => $cityErr,
    'messageErr' => $messageErr,
    'fileErr' => $fileErr
);
}

header('Content-Type: application/json');
echo json_encode($response);
    }


function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
