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
    echo $_SESSION['razina'];
    include_once "utility.php";
    $connection = getConnection();
    if($_SESSION['registracijaKorisnika'] == NULL){
        header("Location: login.php");
    }
    elseif($_SESSION['razina'] == "1"){
        header("Location: login.php");
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

        <div class="articleContainer">
            <div name="listOfArticles">
                
                <h4>List of all articles</h4>

                <?php getAllArticles($connection) ?>
                
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                    <script>

                        function tableOfArticle(){

                            $(document).ready (function () {
                            var updater = setTimeout (function () {
                                $('#autoupdate').load ('utilityAdmin.php');
                                refresh();
                                }, 2000);
                            });
                        }

                </script>


            </div>
            
            <div class="containerFormInsert">
                <div class="row">
                    <div class="col-6">

                        <?php getFormInput(); ?>

                    </div>

                    
                </div>
            </div>
            
            <?php

                include_once "utility.php";
                if(isset($_POST['delete'])){
                    $articles = $_POST['article'];
                    if(!empty($_POST['article'])) {
                        foreach ($articles as $article){
                            deleteArticleById($connection, $article);
                        }
                        echo "<script> $('#autoupdate').load ('utilityAdmin.php');</script>";
                    }
                }

                if(isset($_POST['insertArticle'])){
                    $title = $_POST['title'];
                    $category = $_POST['category'];
                    $picture = $_POST['picture'];
                    $summery = $_POST['summery'];
                    $numOfParagraphs = $_POST['numOfArticles'];
                    $uvijet = TRUE;
                    if(empty($title)) {
                        $uvijet = FALSE;
                        echo '<script>document.getElementById("errorTitle").innerHTML="<br>Title is missing!<br>";</script>';
                    }
                    if(empty($category)) {
                        $uvijet = FALSE;
                        echo '<script>document.getElementById("errorCategory").innerHTML="<br>Category is missing!<br>";</script>';
                    }
                    if(empty($picture)) {
                        $uvijet = FALSE;
                        echo '<script>document.getElementById("errorPicture").innerHTML="<br>Picture URL is missing!<br>";</script>';
                    }
                    if(empty($summary)) {
                        $uvijet = FALSE;
                        echo '<script>document.getElementById("errorSummary").innerHTML="<br>Summary is missing!<br>";</script>';
                    }
                    if(empty($numOfParagraphs) || $numOfParagraphs <= 0) {
                        $uvijet = FALSE;
                        echo '<script>document.getElementById("errorNumP").innerHTML="<br>Number of paragraphs is missing!<br>";</script>';
                    }
                  
                    else{

                        insertNewArticle($connection, $title, $category, $picture, $summery);
                        
                        echo "
                        <script>
                            location.replace('./insertParagraph.php?pNum=".$numOfParagraphs."')
                        </script>";
                    
                        echo "<script> $('#autoupdate').load ('utilityAdmin.php');</script>";
                    }

                    $title = "";
                    $category = "";
                    $picture = "";
                    $summery = "";


                }
                
                if(isset($_POST['update'])){

                    $article = $_POST['article'];

                    if(sizeof($article)==1){
                        $idUpdate = $article[0];
                        echo "
                        <script>
                            location.replace('./update.php?id=".$idUpdate."')
                        </script>";
                    }
                    else{
                        echo "Error previse odabrano calanaka";
                    }


                }   
                
            

            ?>
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