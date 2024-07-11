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
                    fname: {
                        required: true,
                        minlength: 3,
                    },
                    lname: {
                        required: true,
                        minlength: 3,
                    },
                    email: {
                        required: true,
                        email: true,
                    },
                    phone: {
                        required: true,
                        minlength: 10,
                        maxlength: 10,
                    },
                    dob: {
                        required: true,
                    },
                    gender: {
                        required: true,
                    },
                    lang: {
                        required: true,
                    },
                    pass: {
                        required: true,
                        minlength: 6,
                    }
                },
                messages: {
                    fname: {
                        required: "Please enter your first name",
                        minlength: "Your first name must be at least 3 characters long",
                    },
                    lname: {
                        required: "Please enter your last name",
                        minlength: "Your last name must be at least 3 characters long",
                    },
                    email: {
                        required: "Please enter a valid email address",
                    },
                    phone: {
                        required: "Please enter your phone number",
                        minlength: "Your phone number must be exactly 10 characters long",
                        maxlength: "Your phone number must be exactly 10 characters long",
                    },
                    dob: {
                        required: "Please enter your date of birth",
                    },
                    gender: {
                        required: "Please select your gender",
                    },
                    lang: {
                        required: "Please select a language",
                    },
                    pass: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 6 characters long",
                    }
                },
                submitHandler: function(form) {
                    $.ajax({
                        url: "register.php",
                        method: "POST",
                        data: $(form).serialize(),
                        success: function(response) {
                            alert(response);
                            window.location.href = "loginform.php";
                        },
                        error: function() {
                            alert("An error occurred. Please try again.");
                        }
                    });
                    return false;
                }
            });
        });
    </script>
</head>

<body>
    <h2>Registration Form</h2>
    <form action="" method="post" id="myForm">
        <label for="fname">First name: </label>
        <input type="text" name="fname" id="fname"><br>

        <label for="lname">Last name: </label>
        <input type="text" name="lname" id="lname"><br>

        <label for="email">Email: </label>
        <input type="email" name="email" id="email"><br>

        <label for="phone">Phone number: </label>
        <input type="tel" name="phone" id="phone"><br>

        <label for="dob">DOB: </label>
        <input type="date" name="dob" id="dob"><br>

        <label for="male">Male</label>
        <input type="radio" name="gender" id="male" value="male">
        <label for="female">Female</label>
        <input type="radio" name="gender" id="female" value="female"><br>

        <label for="lang">Languages: </label>
        <select name="lang" id="lang">
            <option value="Hindi">Hindi</option>
            <option value="English">English</option>
            <option value="Haryanvi">Haryanvi</option>
        </select><br>

        <label for="pass">Password: </label>
        <input type="password" name="pass" id="pass"><br>

        <input type="submit" value="Register">
    </form>
</body>

</html>