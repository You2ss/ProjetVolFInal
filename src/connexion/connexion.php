<?php
session_start();
$bdd= new PDO('mysql:host=localhost;port=3306;dbname=projetvol;charset=utf8', 'root', '');
if(isset($_POST['valider'])) {
    if (!empty($_POST['email']) && !empty($_POST['mdp'])) {
        $recuperUser = $bdd->prepare('SELECT * FROM users WHERE email = ? AND mdp= ?');
        $recuperUser->execute(array($_POST['email'], $_POST['mdp']));
        if($recuperUser->rowCount() > 0){
            $userInfo = $recuperUser->fetch();
            if($userInfo['confirme'] == 1){
                if($userInfo['admin'] ==1){     //rediriger vers page admin
                    header('Location: admin/admin.php');
                }
                else{
                    header('Location: ../../index.php');
                }
            }
            else {
                echo "Vous n'etes pas confirmée au niveau du site";
            }
        }else{
            echo "L'utilisateur n'existe pas";
        }
    }else{
        echo "Veuillez mettre votre email";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/style.css">

</head>
<body>
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section">Page de Connexion</h2>
                <li><a href="../../scr/Connexion/Incription.php">Inscription</a></li>
            </div>
        </div>
        <center>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="login-wrap p-4 p-md-8">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-user-o"></span>
                        </div>

                        <h3 class="text-center mb-4">Connectez-vous</h3>
                        <form method="POST" action="">
                            <input type="email" name="email" placeholder="Entre votre email">
                            <br>
                            <br>
                            <input type="password" name="mdp" placeholder="Enter votre mot de passe">
                            <br/>
                            <br>
                            <input type="submit" name="valider"class="btn btn-primary rounded submit p-3 px-5"></form>
                        <br>
                        <br>

                        <div class="form-group">

        </center>
    </div>
    </form>
    </div>
    </div>
    </div>
    </div>
</section>

<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>

