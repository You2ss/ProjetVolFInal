<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
session_start();

$bdd= new PDO('mysql:host=localhost;port=3306;dbname=projetvol;charset=utf8', 'root', '');
if(isset($_POST['valider'])) {
    if (!empty($_POST['email']) && !empty($_POST['nom']) && !empty($_POST['mdp'])) {
        $cle = rand(1000000, 9000000);
        $email = $_POST['email'];
        $nom = $_POST['nom'];
        $mdp = $_POST['mdp'];
        $insererUser = $bdd->prepare('INSERT INTO users (email, nom, mdp, cle, confirme)VALUES(?, ?, ?, ?, ?)');
        $insererUser->execute(array($email, $nom, $mdp, $cle, 0));
        $recupUser = $bdd->prepare('SELECT * FROM users WHERE email= ?');
        $recupUser->execute(array($email));
        if ($recupUser->rowCount() > 0) {
            $userInfos = $recupUser->fetch();
            $_SESSION['id'] = $userInfos ['id'];

            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth = true;                                   //Enable SMTP authentication
                $mail->Username = 'testphpmailer92@gmail.com';                     //SMTP username
                $mail->Password = 'phpmailer123';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom('testphpmailer92@gmail.com');
                $mail->addAddress($email);

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Confirmation d\email';
                $mail->Body = 'http://localhost/ProjetVolFinal/src/connexion/verif.php?id='.$_SESSION['id'].'&cle='.$cle;
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
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
                <h2 class="heading-section">Page d'Inscription</h2>
                <li><a href="../../src/connexion/connexion.php">Connexion</a></li>
                <li><a href="../../index.php">Acceuil</a></li>
            </div>
        </div>
        <center>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="login-wrap p-4 p-md-8">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-user-o"></span>
                        </div>

                        <h3 class="text-center mb-4">Inscrivez-vous</h3>
                        <form method="POST" action="">

                            <label>
                                <input type="email" name="email" placeholder="Entre votre mail">
                                <br>
                                <br>
                                <input type="text" name="nom" placeholder="Entre votre Nom">
                                <br>
                                <br>
                                <input type="password" name="mdp" placeholder="Entre votre mot de passe">
                                <br>
                                <br>
                                <input type="submit" name="valider"class="btn btn-primary rounded submit p-3 px-5"></button>
                                <br>
                                <br>
                            </label>


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

</ul>
</form>
</body>
</html>
