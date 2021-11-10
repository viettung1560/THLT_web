<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Result</title>
    </head>
    <body>
        <?php

        $name = $_POST["name"];
        $class = $_POST["class"];
        $school = $_POST["school"];
        $email = $_POST["email"];
        $website = $_POST["website"];
        $gender = $_POST["gender"];        

        echo "Hello, $name <br>";
        echo "Gender: $gender <br>";
        echo "You are studying at $class, $school <br>";
        if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo "Your e-mail is $email <br>";
        }
        if(!empty($website) && filter_var($website, FILTER_VALIDATE_URL)){
        echo "Your website is $website <br>";
        }
        echo "Your hobby is <br>";        
        $k = 1;
        for ($n = 1; $n <= 3; $n++) {    
            if($n==1)
            {
                $hobby = $_POST["hobby1"];
                if(!empty($hobby))
                {
                    echo "$k. $hobby <br>" ;
                    $k++;
                }
            }
            if($n==2) 
            {
                $hobby = $_POST["hobby2"];                
                if(!empty($hobby))
                {
                    echo "$k. $hobby <br>" ;
                    $k++;
                }
            }
            if($n==3) 
            {
                $hobby = $_POST["hobby3"];                
                if(!empty($hobby))
                {
                    echo "$k. $hobby <br>" ;
                    $k++;
                }
            }
        }
        ?>
    </body>
</html>