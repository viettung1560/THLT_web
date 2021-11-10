<html>
    <head>
        <meta charset="utf-8">
        <title>User Sorting</title>
    </head>
    <body>
        <?php
        function user_sort($a, $b) {
        // smarts is all-important, so sort it first
        if($b == 'smarts') {
            return 1;
        }
        else if($a == 'smarts') {
            return -1;
        }

        return ($a == $b) ? 0 : (($a < $b) ? -1 : 1);
        }
        $submitted = 0;

        $values = array('name' => 'Buzz Lightyear',
            'email_address' => 'buzz@starcommand.gal',
            'age' => 32,
            'smarts' => 'some'
        );

        $unsorted = array('name' => 'Buzz Lightyear',
        'email_address' => 'buzz@starcommand.gal',
        'age' => 32,
        'smarts' => 'some'
        );

        if (isset($_POST["submit"])) {
            $sort_type = $_POST["sort_type"];
            $submitted = 1;
        }

        if($submitted) {
            if($sort_type == 'usort' || $sort_type == 'uksort' || $sort_type == 'uasort') {
                $sort_type($values, 'user_sort');
            }
            else {
                $sort_type($values);
            }
        }
        ?>

        <form action="UserSorting.php" method="post">
            <table>
                <tr>
                    <td>
                        <input type="radio" name="sort_type" value="sort" checked="checked" />  Standard sort<br />
                        <input type="radio" name="sort_type" value="rsort" />   Reverse sort<br />
                    </td>
                    <td>
                        <input type="radio" name="sort_type" value="usort" />   User-defined sort<br />
                        <input type="radio" name="sort_type" value="ksort" />   Key sort<br />
                    </td>
                    <td>
                        <input type="radio" name="sort_type" value="krsort" />  Reverse key sort<br />
                        <input type="radio" name="sort_type" value="uksort" />  User-defined key sort<br />
                    </td>
                    <td>
                        <input type="radio" name="sort_type" value="asort" />  Value sort<br />
                        <input type="radio" name="sort_type" value="arsort" /> Reverse value sort<br />
                        <input type="radio" name="sort_type" value="uasort" /> User-defined value sort<br />
                    </td>
                </tr>
            </table>

        <p align="center">
            <input type="submit" value="Sort" name="submit" />
        </p>
            <table>
                <tr>
                    <td>Values unsorted (before sort):</td>
                    <td>
                        <ul>                           
                            <?php
                            foreach($unsorted as $key=>$value) {
                                echo "<li><b>$key</b>: $value</li>";
                            }
                            ?>
                        </ul>
                    </td>
                    <td>Values <?= $submitted ? "sorted by $sort_type" : "unsorted"; ?>:</td>
                    <td>
                        <ul>                           
                            <?php
                            foreach($values as $key=>$value) {
                                echo "<li><b>$key</b>: $value</li>";
                            }
                            ?>
                        </ul>
                    </td>
                </tr>
            </table>
        </form>            
    </body>
</html>