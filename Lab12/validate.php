<!DOCTYPE html>
<html>
    <head>
        <title>Validate</title>
    </head>
    <body>
        <?php
        $email = $_POST["email"];
        $url = $_POST["url"];
        $phone = $_POST["phone"];

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            print "Valid email = $email<br>";
        } else {
            print "Invalid email = $email<br>";
        }

        if (filter_var($url, FILTER_VALIDATE_URL)) {
            print "Valid URL = $url<br>";
        } else {
            print "Invalid URL = $url<br>";
        }

        $phone_format = '/^[0-9\-\(\)\/\+\s]*$/';
        if (preg_match($phone_format, $phone)){
            print "Valid phone number = $phone<br>";
        } else {
            print "Invalid phone number = $phone<br>";
        }
        ?>
    </body>
</html>