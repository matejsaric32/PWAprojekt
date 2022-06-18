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
    $id = $_GET['id'];
    $id4Index = $id;

   
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

        <div name="containerUpdate" class="p-5">
            
            <form method="post" name="insertForm">
                            
                <div class="col-md-6 mt-3">
                    <label for="inputTitle" class="form-label">Title:</label>
                    <input type="text" class="form-control" name="title">
                    <span id="errorTitle" class="error"></span>
                </div>                            
    
                <div class="col-md-4 mt-3">
                    <label for="inputCategory" class="form-label">Category:</label>
                    <select class="form-select" name="category">
                        <option selected>Category</option>
                        <option value="Monde">Monde</option>
                        <option value="Economie">Economie</option>
                    </select>
                    <span id="errorCategory" class="error"></span>
                </div>
    
                <div class="col-md-6 mt-3">
                    <label for="inputPicture" class="form-label">Picture:</label>
                    <input type="text" class="form-control" name="picture">
                    <span id="errorPicture" class="error"></span>
                </div>
    
                <div class="col-md-6 mt-3">
                    <label for="inputSummery" class="form-label">Summery:</label>
                    <input type="text" class="form-control" name="summery">
                    <span id="errorTi" class="error"></span>
                </div>
                
                <div class="col-md-6 mt-3 row">
                    <div class="col-5 col">
                        <label for="inputEmail4" class="form-label">Number of Articles:</label>
                        <input id ="num" type="number" class="form-control" name="numOfArticles">
                    </div>
                    <div class="col-md col mt-4">
                        <button class="btn btn-primary mt-2" name="addPar">Add More Paragraphs</button>

                    </div>
                </div>


                <div class="mt-5">

                    <?php getTextAreaFilled($connection, $id) ?>
                    <?php 
                        if(isset($_POST['addPar'])){
                          
                            if(empty($_POST['numOfArticles'])){

                            }
                            else{
                                addMoreTextArea($connection, $id, $_POST['numOfArticles']);
                            }
                        }
                    ?>
                </div>
                
                <button class="btn btn-primary mt-5" name="updateParagrph">Update</button>

            </from>
            <?php
             if(isset($_POST['updateParagrph'])){
                $title = $_POST['title'];
                $category = $_POST['category'];
                $picture = $_POST['picture'];
                $summery = $_POST['summery'];
                $numOfParagraphs = $_POST['numOfArticles'];
                $uvijet = TRUE;
                $text = $_POST['text'];
                echo"qdwdqqdq";
                for ($x = 0; $x < $numOfParagraphs; $x++){
                    if(empty($text[$x])){
                        $uvijet = FALSE;
                    }
                }
        
                if(empty($title)) {
                    echo "T";
                }
                elseif ($category == "Category") {
                    echo "C";
                }
                elseif (empty($picture)) {
                    echo "P";
                }
                elseif (empty($summery)) {
                    echo "S";
                }
                elseif($uvijet==FALSE){
                    echo "P";
                }
                else{
                    echo "Radi?";
                    updateArticleAll($connection, $id,  $title, $category, $picture, $summery, $numOfParagraphs, $text);
                    echo '<script>window.location.href = "adminPanel.php";</script>';
                }
        
            }
            
            ?>
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