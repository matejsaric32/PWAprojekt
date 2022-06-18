<!DOCTYPE html>
<html>
<head>
    <title>LeExpress</title>
    <meta charset="UTF-8">
    <meta name="description" content="PWA projekt">
    <meta name="author" content="Matej Šarić">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style/styleArticle.css">

</head>

<?php

    include_once "utility.php";
    $connection = getConnection();
    $pNum = $_GET['pNum'];

    if(isset($_POST['insertParagraphs'])){
        $text = $_POST['text'];
        $uvijet = TRUE;

        for ($x = 0; $x < $pNum; $x++){
            if(empty($text[$x])){
                $uvijet = FALSE;
            }
        }

        if($uvijet == TRUE){
            insertNewParagraph($connection, $pNum, $text);
            echo '<script>window.location.href = "adminPanel.php";</script>';
        }

    }


?>

<body> 

<div class="globalContainer">


    <!-- 
        header
    -->

    <div class="headerContainer">

        <?php getHead(); ?>

    </div>

    <!-- 
        content
    -->

    <div class="center size1200 bgArticle contentContainer">

        <div name="containerFormParagraphs" class="m-4">
            <form method="post">
                <?php
                    getTextArea($_GET['pNum']);
                ?>
                <button name="insertParagraphs" class="btn btn-primary mt-4">New Article</button>

            </form>
        </div>
    </div>

            

    <!-- 
        footer 
    -->

    <div class="footerContainer">

        <footer>

            <div class="size1200 center footerStyle">
                <p>Les sites du reseau Groupe : Food avec. Myones. fr</p>
                <br>
                <p>@ L'Express-</p>
            </div>

        </footer>

    </div>

</div>

</body>

</html>