<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Page form</title>
    </head>
    <body>        
        <form action="PageDisplay.php" method="GET">
            <table>
                <tr>
                    <td>Tittle: </td>
                    <td><input type="text" name="title"></td>
                </tr>
                <tr>
                    <td>Year: </td>
                    <td><input type="text" name="year"></td>
                </tr>
                <tr>
                    <td>Copyright: </td>
                    <td><input type="text" name="copyright"></td>
                </tr>
                <tr>
                    <td>Content: </td>
                    <td><textarea name="content" rows="20" cols="80"></textarea></td>
                </tr>

                <tr><td><input type="submit" name="" value="submit"></td></tr>
            </table>
        </form>
    </body>
</html>