<!DOCTYPE html>
<html lang="en">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Form</title>
    <style>  
    </style>
<body>
    <div class=" mt-5" style="background: linear-gradient(#e66465, #9198e5);">
    <a href="crud.php" class="btn btn-primary mt-3 ml-3">Add New Data</a>


        <h1>Data Table View</h1>
        <div class="status-message"></div>

        <?php
        require('connect.php');
        $sql = "SELECT * FROM crudform";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<table class='table table-striped'>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Gender</th>
                            <th>Address</th>
                            <th>Subject</th>
                            <th>Country</th>
                            <th>City</th>
                            <th>Message</th>
                            <th>File Upload</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>";
            foreach ($result as $row) {
                echo "<tr>
                        <td>" . $row["id"] . "</td>
                        <td>" . $row["firstname"] . "</td>
                        <td>" . $row["lastname"] . "</td>
                        <td>" . $row["email"] . "</td>
                        <td>" . $row["gender"] . "</td>
                        <td>" . $row["address"] . "</td>
                        <td>" . $row["subject"] . "</td>
                        <td>" . $row["country"] . "</td>
                        <td>" . $row["city"] . "</td>
                        <td>" . $row["message"] . "</td>
                        <td><a href='" . $row["fileupload"] . "'>Download</a></td>
                        <td>
                            <a href='update.php?id=" . $row["id"] . "' class='btn btn-primary'>Update</a>
                            <a href='delete.php?id=" . $row["id"] . "' class='dlt btn btn-danger'>Delete</a>
                        </td>
                    </tr>";
            }
            echo "</tbody></table>";
        } else {
            echo "<p class='mt-3'>0 results</p>";
        }
        $conn->close();
        ?>  

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            $(document).ready(function () {
                $('.dlt').on('click', function (e) {
                    e.preventDefault();
                    var id = $(this).attr('href').split("=")[1];
                    var currentRow = $(this).closest('tr');
                    $.ajax({
                        type: 'GET',
                        url: 'delete.php',
                        data: {
                            id: id
                        },
                        success: function (response) {
                            $('.status-message').html('<div class="alert alert-danger" role="alert">Deleted successfully</div>');
                            currentRow.remove();

                            setTimeout(function() {
                                $('.status-message').html('');
                            }, 5000);
                        },
                        error: function (error) {
                            console.log('Error:', error);
                        }
                    });
                });
            });
        </script>


    </div>
</body>

</html>
