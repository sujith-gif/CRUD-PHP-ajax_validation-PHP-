<?php
require('connect.php');

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM crudform WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No record found with ID = $id";
    }
} else {
    echo "Invalid ID";
}

$conn->close();

?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit Record</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
      
      body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

h1 {
    text-align: center;
    margin-bottom: 30px;
}

.container {
    width: 40%;
    margin: 0 auto;
    background: #fff;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.form-control {
    margin-bottom: 15px;
}

.form-label {
    font-weight: bold;
}

.btn-view {
    display: block;
    width: 100%;
    margin-top: 20px;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    background-color: #007bff;
    color: #fff;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn-view:hover {
    background-color: #0056b3;
}

select.form-select {
    margin-bottom: 15px;
}


    </style>
</head>

<body>
    <h1>EDIT</h1>
    <div class="container mt-5" style="background: linear-gradient(#e66465, #9198e5);">

    <form id="updateForm" action="" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <div class="mb-3">
                <label for="firstname">First Name:</label>
                <input type="text" id="firstname" class="form-control" name="firstname" value="<?php echo $row['firstname']; ?>">
            </div>
            <div class="mb-3">
                <label for="lastname">Last Name:</label>
                <input type="text" id="lastname" class="form-control" name="lastname" value="<?php echo $row['lastname']; ?>">
            </div>
            <div class="mb-3">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" class="form-control" value="<?php echo $row['email']; ?>">
            </div>
            <div class="mb-3">
                <label>Gender:</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="male" value="male" <?php if ($row['gender'] === 'male') echo 'checked'; ?>>
                    <label class="form-check-label" for="male">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="female" value="female" <?php if ($row['gender'] === 'female') echo 'checked'; ?>>
                    <label class="form-check-label" for="female">Female</label>
                </div>
            </div>
            <div class="mb-3">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" class="form-control" value="<?php echo $row['address']; ?>">
            </div>
            <div class="mb-3">
                <label for="subject">Subject:</label>
                <input type="text" id="subject" name="subject" class="form-control" value="<?php echo $row['subject']; ?>">
            </div>
            <div class="mb-3">
                <label for="country">Country:</label>
                <select id="country" name="country" class="form-select">
                    <option value="">Select Country</option>
                    <option value="USA" <?php if ($row['country'] === 'USA') echo 'selected'; ?>>USA</option>
                    <option value="Canada" <?php if ($row['country'] === 'Canada') echo 'selected'; ?>>Canada</option>
                    <!-- Add more countries as needed -->
                    <option value="UK" <?php if ($row['country'] === 'UK') echo 'selected'; ?>>United Kingdom</option>
                    <option value="Australia" <?php if ($row['country'] === 'Australia') echo 'selected'; ?>>Australia</option>
                    <option value="Germany" <?php if ($row['country'] === 'Germany') echo 'selected'; ?>>Germany</option>
                    <option value="France" <?php if ($row['country'] === 'France') echo 'selected'; ?>>France</option>
                    <option value="Japan" <?php if ($row['country'] === 'Japan') echo 'selected'; ?>>Japan</option>
                    <option value="India" <?php if ($row['country'] === 'India') echo 'selected'; ?>>India</option>
                    <option value="Brazil" <?php if ($row['country'] === 'Brazil') echo 'selected'; ?>>Brazil</option>
                    <option value="China" <?php if ($row['country'] === 'China') echo 'selected'; ?>>China</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="city">City:</label>
                <input type="text" id="city" name="city" class="form-control" value="<?php echo $row['city']; ?>">
            </div>
            <div class="mb-3">
                <label for="message">Message:</label>
                <input type="text" id="message" class="form-control" name="message" value="<?php echo $row['message']; ?>">
            </div>
            <div class="mb-3">
                <label for="message">File Upload::</label>
                <input type="file" class="form-control" id="fileupload" name="fileupload" value="<?php echo $row['message']; ?>">
                
            </div>
            <input type="submit" class="btn-view" value="Update">
            <a href="table.php" class="btn btn-primary btn-view">View Data</a>

        </form>
        <div class="status-message"></div>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
            $(document).ready(function() {
                $('#updateForm').submit(function(event) {
                    event.preventDefault();
                    var formData = new FormData(document.getElementById('updateForm'));
                    $.ajax({
                        type: 'POST',
                        url: 'update_process.php',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            $('.status-message').html(response);
                            setTimeout(function() {
                                $('.status-message').html('');
                            }, 5000);
                        },
                        error: function(error) {
                            alert("Error updating record");
                        }
                    });
                });
            });
        </script>
</body>

</html>