<?php
?>
<!DOCTYPE html>
<html>

<head>
    <title>Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f0f0f0;
            animation-name: changeBackground;
            animation-duration: 10s;
            animation-timing-function: linear;
            animation-iteration-count: infinite;
        }

        @keyframes changeBackground {
            0% {
                background-color: #f0f0f0;
            }

            50% {
                background-color: #e66465;
            }

            100% {
                background-color: #9198e5;
            }
        }

        .container {
            margin-top: 80px;
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-label {
            font-weight: bold;
        }

        .form-control {
            margin-bottom: 15px;
        }

        .text-danger {
            color: red;
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

        .cstm-cont {
            width: 40%;
            margin-top: 10% !important;
        }

        .new {
            margin-left: 65% !important;
            gap: 61px;

        }

        /* .alert-success {
            position: absolute;
            margin-top: -63%;
            background: inherit;
            border: none;
            font-size: 28px;
        } */


        @media (max-width: 768px) {
            .cstm-cont {
                width: 100% !important;
            }

        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"> <i class="fa-solid fa-text-slash" style="font-size: 50px;"></i></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto new">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5 cstm-cont" style=" background: linear-gradient(#e66465, #9198e5);">
        <h1>Registration Form</h1>
        <form id="form" action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="firstname" class="form-label">First Name:</label>
                <input type="text" class="form-control" id="firstname" name="firstname">
                <span class="text-danger" id="firstnameError"><?php echo $firstnameErr; ?></span>
            </div>

            <div class="mb-3">
                <label for="lastname" class="form-label">Last Name:</label>
                <input type="text" class="form-control" id="lastname" name="lastname">
                <span class="text-danger" id="lastnameError"><?php echo $lastnameErr; ?></span>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email">
                <span class="text-danger" id="emailError"><?php echo $emailErr; ?></span>
            </div>
            <div class="mb-3">
                <label class="form-label">Gender:</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                    <label class="form-check-label" for="male">Male</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                    <label class="form-check-label" for="female">Female</label>
                </div>
                <span class="text-danger" id="genderError"><?php echo $genderErr; ?></span>

            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address:</label>
                <textarea class="form-control" id="address" name="address" rows="3"></textarea>
                <span class="text-danger" id="addressError"><?php echo $addressErr; ?></span>

            </div>

            <div class="mb-3">
                <label for="subject" class="form-label">Subject:</label>
                <input type="text" class="form-control" id="subject" name="subject">
                <span class="text-danger" id="subjectError"><?php echo $subjectErr; ?></span>

            </div>

            <div class="mb-3">
                <label for="country" class="form-label">Country:</label>
                <select class="form-select" id="country" name="country">
                    <option value="">Select a country</option>
                    <option value="usa">USA</option>
                    <option value="canada">Canada</option>
                    <option value="uk">UK</option>
                    <option value="australia">Australia</option>
                    <option value="germany">Germany</option>
                    <option value="japan">Japan</option>
                    <option value="france">France</option>
                    <option value="brazil">Brazil</option>
                    <option value="china">China</option>
                    <option value="india">India</option>

                </select>
                <span class="text-danger" id="countryError"><?php echo $countryErr; ?></span>
            </div>
            <div class="mb-3">
                <label for="city" class="form-label">City:</label>
                <input type="text" class="form-control" id="city" name="city">
                <span class="text-danger" id="cityError"><?php echo $cityErr; ?></span>
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Message:</label>
                <textarea class="form-control" id="message" name="message" rows="5"></textarea>
                <span class="text-danger" id="messageError"><?php echo $messageErr; ?></span>
            </div>
            <div class="mb-3">
                <label for="fileupload" class="form-label">File Upload:</label>
                <input type="file" class="form-control" id="fileupload" name="fileupload">
                <span class="text-danger"><?php echo $fileErr; ?></span>
            </div>

            <button type="submit" name="submit" id="submit" class="btn btn-primary btn-view">Submit</button>
        </form>
        <div class="status-message"></div>
        <a href="table.php" class="btn btn-primary btn-view">View Data</a>


    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
    $("#form").submit(function(event) {
        event.preventDefault();

        var formData = new FormData($(this)[0]);

        $.ajax({
    type: "POST",
    url: "validate.php",
    data: formData,
    processData: false,
    contentType: false,
    success: function(response) {
        if (response.status === 'success') {
            $(".status-message").text(response.message);

        } else {
            $("#firstnameError").text(response.errors.firstnameErr);
            $("#lastnameError").text(response.errors.lastnameErr);
            $("#emailError").text(response.errors.emailErr);
            $("#genderError").text(response.errors.genderErr);
            $("#addressError").text(response.errors.addressErr);
            $("#subjectError").text(response.errors.subjectErr);
            $("#countryError").text(response.errors.countryErr);
            $("#cityError").text(response.errors.cityErr);
            $("#messageError").text(response.errors.messageErr);
            $("#fileuploadError").text(response.errors.fileErr);
        }
    },
    error: function(xhr, status, error) {
        console.error(xhr.responseText);
    }
});

    });
});

</script>
  




</body>


</html>