<!DOCTYPE html>
<html>
    <head><title>Date Check</title></head>
    <body>
        <?php
        $date = $_POST["date"];
        $two='[[:digit:]]{2}';
        $month='[0-1][[:digit:]]';
        $day='[0-3][[:digit:]]';
        $year="2[[:digit:]]$two";
        if (mb_ereg("^($month)/($day)/($year)$", $date)){
            $d = DateTime::createFromFormat('m/d/Y', $date);
            if ($d && $d->format('m/d/Y') == $date){
                print "Valid date = $date <br>";
            } else {
                print "Invalid date = $date <br>";
            }           
        } else {
            print "Invalid format <br>";
        }

        ?>
    </body>
</html>