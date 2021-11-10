<html>
    <head>
        <meta charset="utf-8">
        <title>Date Time Function</title>
    </head>
    <body>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <table>
                <tr><td><br><h4>First User</h4></td></tr>
                <tr>
                    <td>Name:</td>
                    <td><input type="text" name="name1"></td>
                </tr>
                <tr>
                    <td>Birthday:</td>
                    <td><input type="date" name="date1"></td>
                </tr>
                <tr><td><br><h4>Second User</h4></td></tr>
                <tr>
                    <td>Name:</td>
                    <td><input type="text" name="name2"></td>
                </tr>
                <tr>
                    <td>Birthday:</td>
                    <td><input type="date" name="date2"></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Submit" /></td>
                    <td><input type="reset" value="Restart" /></td>
                </tr>
            </table>
        </form>

        <?php
        function differenceInDays($date1, $date2){
            $diff = strtotime($date1) - strtotime($date2);
            return abs(round($diff / 86400));
        }
        function differenceInYears($date1, $date2){
            $year1 = date('Y', strtotime($date1));
            $year2 = date('Y', strtotime($date2));
            return abs($year1 - $year2);
        }

        $name1 = $_POST["name1"];
        $date1 = $_POST["date1"];
        $name2 = $_POST["name2"];
        $date2 = $_POST["date2"];
        $now = date('d-m-Y');
        echo "<br>Hi, $name1 <br> DOB : " . date('l, F jS, Y', strtotime($date1)) . "<br>Age : " . date_diff(date_create($date1), date_create('now'))->y . "<br>";
        echo "<br>Hi, $name2 <br> DOB : " . date('l, F jS, Y', strtotime($date2)) . "<br>Age : " . date_diff(date_create($date2), date_create('now'))->y . "<br>";
        echo "<br>The differences in days between " . date('d/m/Y', strtotime($date1)) . " and " . date('d/m/Y', strtotime($date2)) . " is " . differenceInDays($date1, $date2) . " days<br>";
        echo "<br>The differences years between two person is " . differenceInYears($date1, $date2) . " years<br>";
        
        ?>
    </body>
</html>