<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Page display</title>
        <style>
            .header {
                width: 100%;
                height: 50px;
                font-size: 30px;
                text-align:center;
                margin-top: 10px;
                margin-bottom: 10px;
            }
            
            .body {
                min-height: 500px;
                width: 100%;
                font-size: 18px;
                margin: 0;
                padding: 10px;
                display: flex;                
            }
            
            .footer {
                width: 100%;
                font-size: 20px;
                color: gray;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <?php
        require 'PageClass.php';
        $title = $_GET["title"];
        $year = $_GET["year"];
        $copyright = $_GET["copyright"];
        $content = $_GET["content"];
        $page = new Page($title, $year, $copyright);
        $page->addContent($content);
        echo $page->get();        
        ?>
    </body>
</html>