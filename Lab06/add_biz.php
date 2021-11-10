<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Business Registration</title>
    </head>
    <body>
        <?php
        $server = 'localhost';
        $user = 'root';
        $pass = '';
        $mydb = 'business_service';

        $connect = mysqli_connect($server, $user, $pass, $mydb);
        if (!$connect) {
            die('Could not connect: ' . mysqli_connect_error());
        }

        $isRegistered = false;

        if (isset($_POST['bizName'])) {
            $bizName = $_POST['bizName'];
            $address = $_POST['address'];
            $city = $_POST['city'];
            $telephone = $_POST['telephone'];
            $categories = $_POST['categories'];
            $url = $_POST['url'];
            if ((!empty($bizName)) && (!empty($address)) && (!empty($city)) && (count($categories) > 0)) {
                $isRegistered = true;
            }
        }
        ?>

        <h1>Business Registration</h1>
        <form action="" method="POST">
            <table>
                <tr>
                    <td>
                        <p>
                            <?php
                                $table_name = 'categories';
                                $SQLcmd = "SELECT * FROM $table_name";
                                $results = mysqli_query($connect, $SQLcmd);
                                $categoriesList = array();

                                while ($row =  mysqli_fetch_array($results)) {
                                    $categoriesList[] = $row;
                                }

                                if(!$isRegistered) {
                                    echo "Click on one, or control-click on multiple categories:";
                                } else {
                                    $isRegisterSuccess = true;
                                    $table_name = 'businesses';
                                    $SQLcmd = "SELECT * FROM $table_name";
                                    $result = mysqli_query($connect, $SQLcmd);
                                    $bizID = mysqli_num_rows($result);
                                    $addQuery = "INSERT INTO $table_name(BusinessID, Name, Address, City, Telephone, URL) VALUES('$bizID', '$bizName', '$address', '$city', '$telephone', '$url')";
                                    $result = mysqli_query($connect, $addQuery);

                                    if ($result) {
                                        $table_name = "biz_categories";
                                        
                                        foreach ($categoriesList as $row) {
                                            if (in_array($row[1], $categories)) 
                                            {
                                                $catBizUpdateQuery = "INSERT INTO $table_name(BusinessID, CategoryID) VALUES($bizID, '$row[0]')";
                                                
                                                if (!mysqli_query($connect, $catBizUpdateQuery)) {
                                                    echo "Insert failed! query = $catBizUpdateQuery";
                                                    $isRegisterSuccess = false;
                                                    break;
                                                }
                                            }
                                        }
                                    } else {
                                        $isRegisterSuccess = false;
                                    }

                                    if ($isRegisterSuccess) {
                                        echo "Record inserted as shown below.";
                                    } else {
                                        echo "Insert failed! query = $addQuery";
                                    }
                                }
                            ?>
                        </p>
                        <p>Select category values are highlighted: </p>
                            <?php
                                if ($categoriesList) {
                                    print '<select name="categories[]" size=5 multiple>';
                                    foreach ($categoriesList as $row) {                
                                        if ($isRegistered) {
                                            if (in_array($row[1], $categories)) {
                                                print "<option selected>$row[1]</option>";
                                            } else {
                                                print "<option>$row[1]</option>";
                                            }
                                        } else {
                                            print "<option>$row[1]</option>";
                                        }
                                    }
                                    print "</select>";
                                } else {
                                    die ("Query Failed, SQLcmd=$SQLcmd");
                                } 
                            ?>
                        </p>
                    </td>
                    <td>
                        <table>
                            <tr>
                                <td>Business Name: </td>
                                <td><input type="text" name="bizName" size="40" value=""></td>
                            </tr>
                            <tr>
                                <td>Address: </td>
                                <td><input type="text" name="address" size="40" value=""></td>
                            </tr>
                            <tr>
                                <td>City: </td>
                                <td><input type="text" name="city" size="40" value=""></td>
                            </tr>
                            <tr>
                                <td>Telephone: </td>
                                <td><input type="text" name="telephone" size="40" value=""></td>
                            </tr>
                            <tr>
                                <td>URL: </td>
                                <td><input type="text" name="url" size="40" value=""></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                    <?php
                        if(!$isRegistered) {
                        echo '<input type="submit" value="Add Business">';
                        } else {
                        echo '<a href="add_biz.php">Add Another Business</a>';
                        }
                        $connect->close();
                    ?>
                    </td>
                </tr>
           </table>
        </form>
    </body>
</html>