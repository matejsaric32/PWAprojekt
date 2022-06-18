<!DOCTYPE html>
<html>
<head>
    <title>LeExpress</title>
    <meta charset="UTF-8">
    <meta name="description" content="PWA projekt">
    <meta name="author" content="Matej Šarić">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">    
    <link rel="stylesheet" href="style/style.css">

</head>

<?php
    session_start();
    include "src/utility.php";
    $connection = getConnection();
?>


<body> 

<div class="globalContainer">

    <!-- 
        header
    -->

    <div class="headerContainer">

        <div class="logoContainer">
            <img class="logo" src="images/l-express-logo-1.png" alt="logo">
        </div>

        <nav class="justify-content-center">
            <div class="center">
                <ul class="navbar navbar-expand-sm justify-content-left align-middle col-3 center size1200" >
                    <li class="nav-item">
                        <a class="nav-link linkStlye1" href="index.php">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link linkStlye1" href="src/categoryWidgets.php?id=Monde">MONADE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link linkStlye1" href="src/categoryWidgets.php?id=Economie">ECONOMIE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link linkStlye1" href="src/adminPanel.php">ADMINISTRACIJA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link linkStlye1" href="src/profile.php">PROFILE</a>
                    </li>
                </ul>
            </div>
        </nav>

        
    </div>

    <!-- 
        content
    -->

    <div class="contentContainer size1200 center">
    
        <!-- 
            Monde part
        -->

        <div class="container4Widgets">
            <h3>Monde</h3>
            <div class="widgetsGroupBy container align-items-start">
                <div class="row height height300">

                    <?php getWidgets("Monde", $connection); ?>

                </div>
            </div>
        </div>
    
    <!-- 
        Ecpnomie part
    -->

        <div class="container4Widgets">
            <h3>Economie</h3>
            <div class="widgetsGroupBy container align-items-start">
                <div class="row height height300">

                    <?php getWidgets("Economie", $connection); ?>

                </div>
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