<?php
session_start();
$bdd= new PDO('mysql:host=localhost;port=3306;dbname=projetvol;charset=utf8', 'root', '');
if(isset($_GET['id']) AND !empty($_GET['id']) AND isset($_GET['cle']) AND !empty($_GET['id'])){
    $getid = $_GET['id'];
    $getcle = $_GET['cle'];
    $recupUser = $bdd->prepare('SELECT * FROM users WHERE id = ? AND cle = ?');
    $recupUser->execute(array($getid, $getcle));
    if($recupUser->rowCount() > 0){
        $userInfo = $recupUser->fetch();
        if($userInfo['confirme'] != 1){
            $updateConfimation = $bdd->prepare('UPDATE users SET confirme = ? WHERE id = ?');
            $updateConfimation->execute(array(1, $getid));
            $_SESSION ['cle'] = $getcle;
            header('Location:  ../../src/connexion/session.php');
        }
        else{
            $_SESSION ['cle'] = $getcle;
            header('Location:  ../../src/connexion/session.php');
        }
    }
    else{
        echo "Votre cle ou identifiant est incorrect";
    }
}
else{
    echo "Aucun utilisateur trouvé";
}
?>