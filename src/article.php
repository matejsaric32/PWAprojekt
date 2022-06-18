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


    include "utility.php";
    $connection = getConnection();
    $id = $_GET['id'];
    $row = getArticleData($connection,$id);

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

        <div class="articleContainer">

            <h4><?php echo $row['kategorija']; ?></h4>

            <h1><?php echo $row['naslov']; ?></h1>

            <p><?php echo $row['vrijemeObjave']; ?></p>

            <div class="contenImage">
                <img class="imgArticle" src="<?php echo $row['slika']; ?>">
            </div>

            <div class="containerSummarize">
                <?php echo "<h1>".$row['sazetak']."</h1>"; ?>
            </div>
            
            <div class="containerParagraphs">
                <?php  getParagraphs($connection, $id); ?>
            </div>


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