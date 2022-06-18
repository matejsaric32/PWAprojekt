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

 session_start();
    include_once "utility.php";
    $connection = getConnection();

    if(!$_SESSION['registracijaKorisnika']){
        header("Location: login.php");
    }

?>

<body> 

<div class="globalContainer">


    <!-- 
        header
    -->

    <div class="headerContainer">

            <?php getHead() ?>
        
    </div>

    <!-- 
        content
    -->

    <div class="center col-6 bgArticle contentContainer row">
        <div class="col-2 mt-5"></div>
        <div class="col-8 mt-5">

            <h4>Username:</h4>
            <h5><?php echo $_SESSION['username']; ?></h5>
            <form method="post"> 
                <button class="btn btn-danger m-5" name="btnLogout">Log out</button>
            </form>
            </div>
        <div class="col-2 mt-5"></div>
        <?php 
            if(isset($_POST['btnLogout'])){
                echo "dqdwqd";
                $_SESSION['registracijaKorisnika'] = false;
                $_SESSION['razina'] = 2;
                header("Location: ../index.php");
            }
        ?>

            

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