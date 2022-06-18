<!DOCTYPE html>
<html>
<head>
    <title>LeExpress</title>
    <meta charset="UTF-8">
    <meta name="description" content="PWA projekt">
    <meta name="author" content="Matej Šarić">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">    
    <link rel="stylesheet" href="../style/style.css">

</head>

<?php
    session_start();
    include "utility.php";
    $connection = getConnection();
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

    <div class="contentContainer size1200 height800 center">
    
        <!-- 
            Monde part
        -->

        <div class="container4Widgets2">
            <h3><?php echo $_GET["id"]; ?></h3>
            <div class="widgetsGroupBy container align-items-start">
                <div class="row height">

                    <?php getWidgetsAll($_GET["id"], $connection); ?>

                </div>
            </div>
        </div>
    
    <!-- 
        Ecpnomie part
    -->

    </div>

    <!-- 
        footer 
    -->

    <div class="footerContainer mt-5">

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