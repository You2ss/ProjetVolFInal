<?php

if(date("H")<18)
    $bienvenue="Bonjour et bienvenue ".
        " dans votre espace personnel";
else
    $bienvenue="Bonsoir et bienvenue ".
        " dans votre espace personnel";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <style>
        *{
            font-family:arial;
        }
        body{
            margin:20px;
        }
        a{
            color:#EE6600;
            text-decoration:none;
        }
        a:hover{
            text-decoration:underline;
        }
    </style>
</head>
<body onLoad="document.fo.login.focus()">
<h2><?php echo $bienvenue?></h2>
[ <a href="../../index.php">Acceuil</a> ]
[ <a href="../../src/connexion/modifier.php">Modifier son profil</a> ]
[ <a href="../../src/connexion/logout.php">Se déconnecter</a> ]
</body>
</html>
<!DOCTYPE html>
<html>