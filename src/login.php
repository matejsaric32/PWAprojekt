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
    $registracija = false;
    if(isset($_POST['button1'])){
        echo "dqdqw";
        $username = $_POST['username'];
        $password = $_POST['password'];
        $razina = 0;
        $uvijet = TRUE;
        if(empty($username)){

            $uvijet = FALSE;
            echo '<script type="text/javascript">document.getElementById("errorUsername").innerHTML="<>Username is missing!<br>";</script>';
        }
        if(empty($password)){

            $uvijet = FALSE;
            echo '<script>document.getElementById("errorPass").innerHTML="<br>Title is missing!<br>";</script>';
        } 
        if($uvijet){
            echo "dqdwqwq";
            $querry = "SELECT username, pass, razina FROM korisnik WHERE username = ?;";
            $stmt = mysqli_stmt_init($connection);
            if(mysqli_stmt_prepare($stmt, $querry)){
                mysqli_stmt_bind_param($stmt, 's', $username);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                mysqli_stmt_bind_result($stmt, $username, $hashedPassword, $razina);
                mysqli_stmt_fetch($stmt);
                $hash = password_hash($password, CRYPT_BLOWFISH);
                if(password_verify($password, $hashedPassword)){
                    echo '<script>alert ("Welcome back!!!") </script>';
                    $registracija = true;
                }
                else{
                    echo '<script>alert ("Wrong password or username!")</script>';
                    $registracija = false;
                }
            }
        }


    }
    

    if($registracija == true){
        echo "dwqdq";
        $_SESSION['username'] = $username;
        $_SESSION['razina'] = $razina;
        echo $razina;
        echo $_SESSION['razina'];
        $_SESSION['registracijaKorisnika'] = $registracija;
        if($razina == "2"){
            echo "dqdwqwq";
            header("Location: adminPanel.php");
        }
        else{
            header("Location: ../index.php");
        }
    }

    if(isset($_POST['button2'])){
        header("Location: register.php");
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

            <form method="post" action="">
                <div class="col-md-12 mt-3 ">
                    <label for="inputTitle" class="form-label">Username:</label>
                    <input type="text" class="form-control" name="username" id="username">
                    <span id="errorUsername" class="error"></span>
                </div>

                <div class="col-md-12 mt-3 ">
                    <label for="inputTitle" class="form-label">Password:</label>
                    <input type="password" class="form-control" name="password" id="pass">
                    <span id="errorPass" class="error"></span>
                </div>
                

                <button type="submit" name="button1" value="button1" id ="button1s" onsubmit="return submit();" class="btn btn-primary mt-4">Log in</button><br>
                <a href="register.php" class = "mt-2">Register here!</a>
            </form>
        
        </div>
        <script type="text/javascript">

                document.getElementById("button1s").onclick = function(event) {
                var uvijet = true;
                var username = document.getElementById("username").value;
                if(username.length == 0) {
                    uvijet = false;
                    document.getElementById("errorUsername").innerHTML="Missing username!<br>";

                }
                var pass= document.getElementById("pass").value;
                if(pass.length == 0) {
                    uvijet = false;
                    document.getElementById("errorPass").innerHTML="Missing password!<br>";
                }

                if (uvijet != true) {
                    event.preventDefault();

                }
            };
        </script>
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