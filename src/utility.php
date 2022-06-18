<?php



    function getConnection(){
            
        $serverName = "localhost";
        $userName = "root";
        $dbName = 'projekt';

        return new mysqli($serverName, $userName,'', $dbName);
    }

    function getHead(){
        echo '
        <div class="logoContainer">
        <img class="logo" src="../images/l-express-logo-1.png" alt="logo">
            </div>

            <nav class="justify-content-center">

                <div class="center">

                    <ul class="navbar navbar-expand-sm justify-content-left align-middle col-3 center size1200" >

                        <li class="nav-item">
                            <a class="nav-link linkStlye1" href="../index.php">HOME</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link linkStlye1" href="categoryWidgets.php?id=Monde">MONADE</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link linkStlye1" href="categoryWidgets.php?id=Economie">ECONOMIE</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link linkStlye1" href="adminPanel.php">ADMINISTRACIJA</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link linkStlye1" href="profile.php">PROFILE</a>
                        </li>

                    </ul>

                </div>

            </nav>
        ';
    }

    function getWidgets($category, $connection){

        $querrySelect = "SELECT * FROM clanak where kategorija = ? LIMIT 4;";
        $stmt = $connection -> prepare($querrySelect);
        $stmt -> bind_param("s",$category);
        $stmt -> execute();
        $result2 = $stmt -> get_result();
        
        $i = 0;
        while($row = mysqli_fetch_assoc($result2)) {
            $i++;
            
            if($i == 1){


                echo "
                <div class='col-3 height100'>
                    <div class='widgetWraper mt-3 mb-3'>
                        <a href='src/article.php?id=".$row['id']."'>
                            <div class='widgetImageContainer align-top'>
                                <img class='imgWidget'src=".$row["slika"]." alt='widgetSlika'>
                            </div>
                            <div class='widgetTextContainer align-bottom'>
                                <h6 class='widgetH6'>".$row["naslov"]."<h6>
                                <p class='widgetP'>".$row["sazetak"]."</p>
                            </div>
                        </a>
                    </div>
                </div>
            ";
            }
            else{
                echo "
                <div class='col-3 height100 widgetBorder mt-3 mb-3'>
                    <div class='widgetWraper'>
                        <a href='src/article.php?id=".$row['id']."'>
                            <div class='widgetImageContainer align-top'>
                                <img class='imgWidget'src=".$row["slika"]." alt='widgetSlika'>
                            </div>
                            <div class='widgetTextContainer align-bottom'>
                                <h6 class='widgetH6'>".$row["naslov"]."<h6>
                                <p class='widgetP'>".$row["sazetak"]."</p>
                            </div>
                        </a>
                    </div>
                </div>
            ";
            }
            
        } 
    }

    function getArticleData($connection, $idArticle){
        
        $querrySelect = "SELECT * FROM clanak where id=?;";
        $stmt = $connection->prepare($querrySelect);
        $stmt->bind_param("i",$idArticle);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    function getParagraphs($connection, $idArticle){

        $querrySelect = "SELECT * FROM paragrafi where idClanak=?;";
        $stmt = $connection->prepare($querrySelect);
        $stmt->bind_param("i",$idArticle);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            echo "<p>".$row['textParagrafa']."</p>";
        }



    }


    function getAllArticles($connection){

        $querrySelect = "SELECT * FROM clanak;";
        $stmt = $connection->prepare($querrySelect);
        $stmt->execute();
        $result = $stmt->get_result();

        echo 
        '
        <form method="POST" id="autoupdate" action="" name="formList">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Time of realese</th>
                    <th scope="col">Picture</th>
                    <th scope="col">sazetak</th>
                <tr>
            </thead>
            <tbody>
            ';
        
        while($row = $result->fetch_assoc()) {
            echo
            '
                <tr>
                    <th scope="row"><input type="checkbox" name="article[]" value='.$row["id"].'></th>
                    <td>'.$row["naslov"].'</td>
                    <td>'.$row["kategorija"].'</td>
                    <td>'.$row["vrijemeObjave"].'</td>
                    <td><img src='.$row["slika"].' width="120px"></td>
                    <td>'.$row["sazetak"].'</td>
                </tr>            
            
            
                ';
        }
        echo '      </tbody> 
                </table> 
                <button name="delete" class="btn btn-danger mt-4">Delete</button>
                <button name="update" class="btn btn-warning mt-4 mx-4">Update</button>

            </from>';
    }

    function deleteArticleById($connection, $id){

        $querryDelP = "DELETE FROM paragrafi where idClanak=?;";
        $stmtP = $connection->prepare($querryDelP);
        $stmtP->bind_param("i",$id);
        $stmtP->execute();

        $querry = "DELETE FROM clanak where id=?;";
        $stmt = $connection->prepare($querry);
        $stmt->bind_param("i",$id);
        $stmt->execute();

        
    }

    function getWidgetsAll($category, $connection){
        $querrySelect2 = "SELECT COUNT(id) FROM clanak where kategorija = ?;";
        $stmt1 = $connection -> prepare($querrySelect2);
        $stmt1 -> bind_param("s",$category);
        $stmt1 -> execute();
        $result3 = $stmt1 -> get_result();
        $row = mysqli_fetch_assoc($result3);
        $cout = $row['COUNT(id)'];

        $querrySelect = "SELECT * FROM clanak where kategorija = ?;";
        $stmt = $connection -> prepare($querrySelect);
        $stmt -> bind_param("s",$category);
        $stmt -> execute();
        $result2 = $stmt -> get_result();
        
        $i = 0;
        $x = 0;
        while($row = mysqli_fetch_assoc($result2)) {
            $i++;
            $x++;
            if($i == 1){
                echo "<div class='widgetsGroupBy container align-items-start'>";
                echo "<div class='row'>";
            }

            if($i == 1){


                echo "
                <div class='col-3 height100'>
                    <div class='widgetWraper mt-3 mb-3'>
                        <a href='article.php?id=".$row['id']."'>
                            <div class='widgetImageContainer align-top'>
                                <img class='imgWidget'src=".$row["slika"]." alt='widgetSlika'>
                            </div>
                            <div class='widgetTextContainer align-bottom'>
                                <h6 class='widgetH6'>".$row["naslov"]."<h6>
                                <p class='widgetP'>".$row["sazetak"]."</p>
                            </div>
                        </a>
                    </div>
                </div>
            ";
            }
            else{
                echo "
                <div class='col-3 height100 widgetBorder mt-3 mb-3'>
                    <div class='widgetWraper'>
                        <a href='article.php?id=".$row['id']."'>
                            <div class='widgetImageContainer align-top'>
                                <img class='imgWidget'src=".$row["slika"]." alt='widgetSlika'>
                            </div>
                            <div class='widgetTextContainer align-bottom'>
                                <h6 class='widgetH6'>".$row["naslov"]."<h6>
                                <p class='widgetP'>".$row["sazetak"]."</p>
                            </div>
                        </a>
                    </div>
                </div>
            ";
            }

            if($i == 4){
                $i = 0;
                echo "</div>";
                echo "</div>";
            }
            else if($x == $cout){
                echo "</div>";
                echo "</div>";
            }
           
            
        } 
    }


    function getFormInput(){
        echo '
        <form method="post" name="insertForm" class="mb-5">
                        
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
                <label for="inputPicture" class="form-label">Picture URL:</label>
                <input type="text" class="form-control" name="picture">
                <span id="errorPicture" class="error"></span>
            </div>

            <div class="col-md-6 mt-3">
                <label for="inputSummery" class="form-label">Summery:</label>
                <input type="text" class="form-control" name="summery">
                <span id="errorSummary" class="error"></span>
            </div>
            
            <div class="col-md-2 mt-3">
                <label for="inputEmail4" class="form-label">Number of Articles:</label>
                <input id ="num" type="number" class="form-control" name="numOfArticles">
                <span id="errorNumP" class="error"></span>
            </div>

            <button name="insertArticle" class="btn btn-primary mt-4 mb-5">New Article</button>

        </from>';




    }

    function insertNewArticle($connection, $title, $category, $picture, $summery){

        $date = date("Y-m-d H:i:s");

        $querry = "INSERT INTO clanak (naslov, kategorija, vrijemeObjave, slika, sazetak) VALUES (?, ?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($connection);
        
        if (mysqli_stmt_prepare($stmt, $querry)) {

            mysqli_stmt_bind_param($stmt, "sssss", $title, $category, $date, $picture, $summery);
            mysqli_stmt_execute($stmt);
            echo "Unos je uspješan";
        }

        
    }

    function getTextArea($numberOfTextArea){

        for ($x = 0; $x < $numberOfTextArea; $x++) {
            echo '
            <div class="form-outline">
            <label class="form-label" for="textAreaExample">Paragraph '.$x.'.</label>
                <textarea class="form-control" id="textAreaExample1" name="text[]" rows="4"></textarea>
            </div>';
        }
    }

    function insertNewParagraph($connection, $numberOfParagraphs, $paragraphs){

        $querryMax = "SELECT MAX(id) FROM clanak;";
        $stmtMax= $connection->prepare($querryMax);
        $stmtMax ->execute();
        $resultMax = $stmtMax->get_result();

        $row = mysqli_fetch_assoc($resultMax);
        $maxx = $row["MAX(id)"];
        $querryInsert = "INSERT INTO paragrafi (idClanak, textParagrafa) VALUES (?, ?)";
        $stmtInsert = $connection->prepare($querryInsert);

        for ($x = 0; $x < $numberOfParagraphs; $x++) {
            echo $paragraphs[$x];
            $stmtInsert->bind_param("is", $maxx, $paragraphs[$x]);
            $stmtInsert ->execute();
        }   

    }

    function updateArticle($connection, $id, $text){

        $querryUpdate = "UPDATE paragrafi SET textParagrafa=? WHERE id=?";
        $stmt = $connection->prepare($querryUpdate);
        $stmt ->bind_param("ss", $text, $id);
        $stmt ->execute();

    }

    function getTextAreaFilled($connection, $id){

        $querrySelectParagraph = "SELECT * FROM paragrafi WHERE idClanak=?";
        $stmt = $connection->prepare($querrySelectParagraph);
        $stmt ->bind_param("s", $id);
        $stmt ->execute();
        $result = $stmt->get_result();
        $x = 0;
        while ($row = $result->fetch_assoc()) {
            $x++;
            echo '
            <div class="form-outline mt-3"> 
            <label class="form-label" for="textAreaExample">Paragraph '.$x.'.</label> <br>
                <textarea class="form-control mt-1" id="textAreaExample1" name="text[]" rows="4">'.$row['textParagrafa'].'</textarea>
            </div>';
        }


    }
    
    function addMoreTextArea($connection, $id, $num){
        $querryMax = "SELECT COUNT(id) FROM paragrafi WHERE idClanak=?;";
        $stmtMax = $connection->prepare($querryMax);
        $stmtMax -> bind_param("s", $id);
        $stmtMax -> execute();
        $resultMax = $stmtMax->get_result();

        $row = mysqli_fetch_assoc($resultMax);
        $maxx = $row["COUNT(id)"];
        $maxx++;

        for($x = 0; $x < $num; $x++){
            echo '
            <div class="form-outline mt-3"> 
            <label class="form-label" for="textAreaExample">Paragraph '.$x + $maxx.'.</label> <br>
                <textarea class="form-control mt-1" id="textAreaExample1" name="text[]" rows="4"></textarea>
            </div>';
        }

    }

    function updateArticleAll($connection, $id, $title, $category, $picture, $summery, $numberOfParagraphs, $paragraphs){

        $querryMax = "SELECT COUNT(id) FROM paragrafi WHERE idClanak=?;";
        $stmtMax = $connection->prepare($querryMax);
        $stmtMax -> bind_param("s", $id);
        $stmtMax -> execute();
        $resultMax = $stmtMax->get_result();
        $row = mysqli_fetch_assoc($resultMax);
        $maxx = $row["COUNT(id)"];


        $querryUpdateArticel = "UPDATE clanak 
                                SET naslov=?, kategorija=?, vrijemeObjave=?, slika=?, sazetak=?
                                where id = ?";
        
        $querryDelete = "DELETE FROM paragrafi WHERE idClanak =?";

        $querryInsertParagraph = "INSERT INTO paragrafi (idClanak, textParagrafa) VALUES (?, ?)";

       
        $stmtInsertParagraph = $connection -> prepare($querryInsertParagraph);

        $date = date("Y-m-d H:i:s");
        $stmtUpdateArticel = $connection -> prepare($querryUpdateArticel);
        $stmtUpdateArticel -> bind_param("ssssss", $title, $category, $date, $picture, $summery, $id);
        $stmtUpdateArticel -> execute();

        $stmtDelete = $connection -> prepare($querryDelete);
        $stmtDelete ->bind_param("s", $id);
        $stmtDelete -> execute();
        
        $stmtInsertParagraph = $connection -> prepare($querryInsertParagraph);

        for ($x = 0; $x < sizeof($paragraphs); $x++) {
            $stmtInsertParagraph -> bind_param("is", $id, $paragraphs[$x]);
            $stmtInsertParagraph ->execute();
        }
        

    }

    function getRegisterForm(){

    }

?>