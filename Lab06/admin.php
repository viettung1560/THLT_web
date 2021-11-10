<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Category Administration</title>
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

        if (isset($_POST["CategoryID"])) {
            $catID = $_POST["CategoryID"];
            if(!empty($catID)) {
                $title = $_POST["Title"];
                $description = $_POST["Description"];
                $sql = "INSERT INTO categories VALUES ('$catID', '$title', '$description')";
                if (mysqli_query($connect, $sql)) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($connect);
                }
            }
        }
        ?>
        
        <h1>Category administration</h1>
        <table>
            <thead>
                <tr style="background: silver">
                    <th>CatID</th>
                    <th>Title</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM categories";
                $result = mysqli_query($connect, $sql);
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['CategoryID'] . "</td>";
                    echo "<td>" . $row['Title'] . "</td>";
                    echo "<td>" . $row['Description'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
            <form method="post" action="">
                <tr>
                    <td><input type="text" name="CategoryID" size="10" required ><br></td>
                    <td><input type="text" name="Title" size="40"><br></td>
                    <td><input type="text" name="Description" size="40"><br></td>
                </tr>
                <tr><td><button type="submit">Add Category</button></td></tr>
            </form>
        </table>
    </body>
</html>