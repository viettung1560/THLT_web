<html>
    <head>
        <meta charset="utf-8">
        <title>Degree Conversion</title>
    </head>
    <body>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <table>
                <tr>
                    <td><input type="radio" name="choice" value="0">Radians to Degrees</td>
                    <td><input type="radio" name="choice" value="1">Degrees to Radians</td>
                </tr>
                <tr><td><input type="text" name="number" required></td></tr>
                <tr>
                    <td><input type="submit" value="Submit"></td>
                    <td><input type="reset" value="Reset"></td>
                </tr>
            </table>
        </form>

        <?php
        function toDeg($rad) {
            return $rad * 180 / M_PI;            
        }
        function toRad($deg) {
            return $deg * M_PI / 180;            
        }
        if (isset($_POST["choice"]) && is_numeric($_POST["number"])) {
            $choice =  $_POST["choice"];
            $number = $_POST["number"];
            echo "<h1>Result</h1>";
            switch ($choice) {
                case 0:
                    $temp = toDeg($number);
                    echo "<br>$number <i>rad</i> ≈ " . number_format($temp, 4) . "°";
                    echo "<br><mark>Formula</mark>: $number <i>rad</i> × 180/π ≈ " . number_format($temp, 4) . "°";
                    break;
                case 1:
                    $temp = toRad($number);
                    echo "<br>$number<i>°</i> ≈ " . number_format($temp, 4) . " <i>rad</i>";
                    echo "<br><mark>Formula</mark>: $number<i>°</i> × π/180 ≈ " . number_format($temp, 4) . " <i>rad</i>";
                    break;
                default:
                    break;
            }
        }
        ?>
    </body>
</html>