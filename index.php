<!DOCTYPE html>
<html>
<head>
    <title>Registration and Login Forms</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            font-size: 28px;
            font-weight: bold;
            margin-top: 40px;
            margin-bottom: 20px;
            text-align: center;
        }
        form {
            max-width: 400px;
            margin: auto;
            border: 1px solid #ccc;
            padding: 35px;
            border-radius: 5px;
            background-color: #24776a;

        }
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            display: block;
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #3e8e41;
        }
        p.success {
            color: green;
            font-weight: bold;
        }
        p.error {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
<h1>Registration Form</h1>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="fname">First name:</label><br>
    <input type="text" id="fname" name="fname" required><br>
    <label for="lname">Last name:</label><br>
    <input type="text" id="lname" name="lname" required><br>
    <label for="email">Email address:</label><br>
    <input type="email" id="email" name="email" required><br>
    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password" required><br>
    <label for="confirm_password">Confirm Password:</label><br>
    <input type="password" id="confirm_password" name="confirm_password" required><br><br>
    <input type="submit" value="Register">
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Perform validation and display confirmation message
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    if ($password != $confirm_password) {
        echo "<p>Passwords do not match.</p>";
    } else {
        echo "<p style='text-align: center',>Registration successful for $fname $lname ($email).</p>";
    }
}
?>
<h1>Login Form</h1>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="email">Email address:</label><br>
    <input type="email" id="email" name="email" required><br>
    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password" required><br><br>
    <input type="submit" value="Login">
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Perform validation and redirect to welcome page
    $email = $_POST["email"];
    $password = $_POST["password"];
    if ($email == "test@example.com" && $password == "password") {
        // Successful login, redirect to welcome page
        header("Location: welcome.php?fname=John");
        exit();
    } else {
        echo "<p>Invalid email or password.</p>";
    }
}
?>
</body>
</html>
