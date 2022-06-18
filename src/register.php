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

?>

<?php   
    $register = false;
    if(isset($_POST['button1'])) { 
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];
        $razina = $_POST['adminRadio'];
        $hashedPassword = password_hash($password, CRYPT_BLOWFISH);
        $querrySelect = "SELECT username FROM korisnik WHERE username =?";
        $stmt = mysqli_stmt_init($connection);
        if(mysqli_stmt_prepare($stmt, $querrySelect)){
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
        }

        if(mysqli_stmt_num_rows($stmt) > 0){
            echo "<script>alert('Username taken!')</script>";
        }
        else{
            $querryInsertUser = "INSERT INTO korisnik (username, pass, razina) VALUES (?, ?, ?)";
            $stmtInsert = mysqli_stmt_init($connection);
            if(mysqli_stmt_prepare($stmtInsert, $querryInsertUser)){
                mysqli_stmt_bind_param($stmtInsert, "ssi", $username, $hashedPassword, $razina);
                mysqli_stmt_execute($stmtInsert);;
                $register = TRUE;
            }
        }

    }
    
    if($register){
        echo "<script>alert('Uspjesna registracaija!')</script>";
        $_SESSION['username'] = $username;
        $_SESSION['razina'] = $razina;
        $_SESSION['registracija'] = $register;
        if($razina == 2){
            header('Location:adminPanel.php');
        }
        else{
            header('Location: ../index.php');
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

    <div class="center col-4 bgArticle contentContainer">

        <div class="articleContainer col-12 center p-5">
            

            <form method="post" name = "regFrom">
                <div class="col-md-12 mt-3 ">
                    <label for="inputTitle" class="form-label">Username:</label>
                    <input type="text" class="form-control" name="username" id="username">
                    <span id="errorUsername" class="error"></span>
                </div>

                <div class="col-md-12 mt-3 ">
                    <label for="inputTitle" class="form-label">Password:</label>
                    <input type="text" class="form-control" name="password" id="pass">
                    <span id="errorPass" class="error"></span>
                </div>
                
                <div class="col-md-12 mt-3 ">
                    <label for="inputTitle" class="form-label">Repeat password:</label>
                    <input type="text" class="form-control" name="password2" id="pass2">
                    <span id="errorPass2" class="error"></span>
                </div>

                <div class="form-check mt-3">
                    <input class="form-check-input" type="radio" name="adminRadio" value="2" id="radio2">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Admin
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="adminRadio" value="1" id="radio3" checked>
                    <label class="form-check-label" for="flexRadioDefault2">
                        Guest
                    </label>
                </div>

                <button type="submit" name="button1" value="signup" id ="signup" class="btn btn-primary mt-4">Register</button>
            </form>

            <script type="text/javascript">
               
                document.getElementById("signup").onclick = function(event) {
                
                var uvijet = true;
                var username = document.getElementById("username").value;
                if(username.length == 0) {
                    uvijet = false;
                    document.getElementById("errorUsername").innerHTML="Missing username!<br>";

                }
                var pass = document.getElementById("pass").value;
                if(pass.length == 0) {
                    uvijet = false;
                    document.getElementById("errorPass").innerHTML="Missing password!<br>";
                }
                var pass2 = document.getElementById("pass2").value;
                if(pass2.length == 0) {
                    uvijet = false;
                    document.getElementById("errorPass2").innerHTML="Missing password!<br>";
                }
                else if(pass2 != pass) {
                    uvijet = false;
                    document.getElementById("errorPass2").innerHTML="Passwords are not same!<br>";
                }
                
                if (uvijet != true) {
                    event.preventDefault();

                }
                };
            </script>
            


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