<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Business Listing</title>
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

        $table_name = 'categories';
        $SQLcmd = "SELECT * FROM $table_name";
        $results = mysqli_query($connect, $SQLcmd);
        $categoriesList = array();
        while ($row =  mysqli_fetch_array($results)) {
            $categoriesList[] = $row;
        }
        ?>

        <h1>Business Listing</h1>
        <table>
            <tr>
                <td valign="top">
                    <?php
                    print '<table border=2>';
                    print '<th>Click on a category to find business listings:';
                    foreach ($categoriesList as $row) {
                        print "<tr><td><a href='biz_listing.php?CategoryID=$row[0]'>$row[1]</a></td></tr>";
                    }
                    print "</table>";
                    ?>
                </td>
                <td valign="top">
                    <?php
                    if (isset($_GET['CategoryID'])) {
                        $catID = $_GET['CategoryID'];
                        if (!empty($catID)) {
                            $table_name = "biz_categories";
                            $findBizQuery = "SELECT * FROM $table_name WHERE(CategoryID = '$catID')";
                            $results = mysqli_query($connect, $findBizQuery);
                            if ($results) {
                                $table_name = "businesses";
                                print '<table border=1>';
                                print '<th>ID<th>Name<th>Address<th>City<th>Telephone<th>URL';
                                while ($row = mysqli_fetch_row($results)) {
                                    $bizQuery = "SELECT * FROM $table_name WHERE(BusinessID = $row[0])";
                                    $bizs = mysqli_query($connect, $bizQuery);
                                    if ($bizs) {
                                        while($row = mysqli_fetch_row($bizs)) {
                                            print "<tr>";
                                            foreach($row as $field) {
                                                print "<td>$field</td>";
                                            }
                                            print "<tr/>";
                                        }
                                    
                                    }
                                }
                                print "</table>";
                            }
                        }
                    }
                    ?>
                </td>
            </tr>
        </table>
    </body>
</html>