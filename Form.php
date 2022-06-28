<!DOCTYPE HTML>
<html>

<head>
    <title>PHP Form Validation</title>
</head>

<body>

    <?php
    //All validation errors stay blank until conditions are satisfied
    $nameErr = $emailErr1 = $emailErr2 = $passwordErr = "";

    //All fields are initially blank
    $name = $email1 = $email2 = $password = "";

    //This if statement will only run when POST method is invoked
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = $_POST["name"];
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
                $nameErr = "Only letters and white space allowed";
            }
        }


        if (empty($_POST["email1"])) {
            $emailErr = "Email is required";
        } else {
            $email1 = $_POST["email1"];
            // check if e-mail address is well-formed
            if (!filter_var($email1, FILTER_VALIDATE_EMAIL)) {
                $emailErr1 = "Invalid email format";
            }
        }

        if (empty($_POST["email2"])) {
            $emailErr2 = "Email is required";
        } else {
            $email2 = $_POST["email2"];
            // check if e-mail address is well-formed
            if ($email1 !== $email2) {
                $emailErr2 = "Emails are not same";
            }
        }


        if (empty($_POST["password"])) {
            $passwordErr = "Password is required";
        } else {
            $password = $_POST["password"];
        }
    }
    ?>

    <h2>PHP Form Validation</h2>
    <form method="post">
        Name: <input type="text" name="name"> <?php echo $nameErr; ?>
        <br><br>
        E-mail: <input type="text" name="email1"> <?php echo $emailErr1; ?>
        <br><br>
        Repeat E-mail: <input type="text" name="email2"> <?php echo $emailErr2; ?>
        <br><br>
        Password: <input type="password" name="password"> <?php echo $passwordErr; ?>
        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
    echo "<h2>Your Input:</h2>";
    echo $name;
    echo "<br>";
    echo $email1;
    echo "<br>";
    echo $email2;
    echo "<br>";
    echo $password;
    ?>

</body>

</html>