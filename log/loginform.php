<?php
session_start();
//if ($_SESSION['name'] != '') {
   // header("Location: index.php");
//}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <style>
        .error {
            color: red;
        }
    </style>
    <script>
        $(document).ready(function() {
            $("#myForm").validate({
                rules: {
                    email: {
                        required: true,
                        email: true,
                    },
                    pass: {
                        required: true,
                        minlength: 6,
                    }
                },
                messages: {
                    email: {
                        required: "Please enter a valid email address",
                    },
                    pass: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 6 characters long",
                    }
                },
                submitHandler: function(form) {
                    $.ajax({
                        url: "login.php",
                        method: "POST",
                        data: $(form).serialize(),
                        success: function(response) {
                            window.location.href = "index.php";

                        },
                        error: function(response) {
                            alert(response);
                        }
                    });
                    return false;
                }
            });
        });
    </script>
</head>

<body>
    <h2>Login Form</h2>
    <form action="" method="post" id="myForm">
        <label for="email">Email: </label>
        <input type="email" name="email" id="email"><br>

        <label for="pass">Password: </label>
        <input type="password" name="pass" id="pass"><br>

        <input type="submit" value="Login">
    </form>
</body>

</html>