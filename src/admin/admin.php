<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Tableau de bord</title>
    <link rel="icon" type="image/png" href="..img/logo.png">
    <link rel="stylesheet" href="../admin/style/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>

<body>
<div class="admin-section-header">
    <div class="admin-logo">
        YouCinema
    </div>
    <div class="admin-login-info">
        <i class="far fa-bell admin-notification-button"></i>
        <i class="far fa-comment-alt"></i>
        <a href="#">Bonjour, Admin</a>
        <img class="admin-user-avatar" src="../img/avatar.png" alt="">
    </div>
</div>
<div class="admin-container">
    <div class="admin-section admin-section1 ">
        <ul>
            <li><i class="fas fa-sliders-h"></i><a href="../../index.php">Acceuil Site de bord</a><i class="fas admin-dropdown fa-chevron-right"></i></li>
            <li><i class="fas fa-ticket-alt"></i><a href="../../src/admin/index-A.php">[VOL]Ajout/Modification/Suppression</a> <i class="fas admin-dropdown fa-chevron-right"></i></li>
            <l

            </ul>

    </div>
    <div class="admin-section admin-section2">
        <div class="admin-section-column">
            <div class="admin-section-panel admin-section-stats">
                <div class="admin-section-stats-panel">
                    <i class="fas fa-ticket-alt" style="background-color: #cf4545"></i>
                    <h2 style="color: #cf4545"></h2>
                    <h3>Reservation</h3>
                </div>
                <div class="admin-section-stats-panel">
                    <i class="fas fa-" style="background-color: #4547cf"></i>
                    <h2 style="color: #4547cf"></h2>
                    <h3>Vols</h3>
                </div>
                <div class="admin-section-stats-panel">
                    <i class="fas fa-alt" style="background-color: #bb3c95"></i>
                    <h2 style="color: #bb3c95"></h2>
                    <h3>Pilote disponible</h3>
                </div>
                <div class="admin-section-stats-panel" style="border: none">
                    <i class="fas fa-envelope" style="background-color: #3cbb6c"></i>
                    <h2 style="color: #3cbb6c"></h2>
                    <h3>Messages admin</h3>
                </div>
            </div>
            <div class="admin-section-panel admin-section-panel1">

                <html>
                <head><script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">

                    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>
                </head>
                <body>
                <li><a href="../../src/traitement/datatable.php">Agrandir la fenetre</a></li>
                <br>
                <br>
                <table id="table_id" class="display">
                    <thead>
                    <tr>
                        <th>Date depart</th>
                        <th>Heure depart</th>
                        <th>Heure d'arrivee</th>
                        <th>Le pilote</th>
                        <th>L'avion</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    require_once '../../src/bdd/Bdd2.php';
                    require_once '../../src/modele/Vol_2.php';

                    $vol = new Vol(array());
                    foreach ($vol->setSelect() as $values){
                        ?>
                        <tr>
                            <td><?php echo $values['date_depart']?></td>
                            <td><?php  echo $values['heure_depart'] ?></td>
                            <td><?php  echo $values['heure_arrivee'] ?></td>
                            <td><?php  echo $values['ref_pilote'] ?></td>
                            <td><?php  echo $values['ref_avion'] ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <script>$(document).ready( function () {
                        $('#table_id').DataTable();
                    } );</script>

                </body>
                </html>



            </div>

            <script src="../scripts/jquery-3.3.1.min.js "></script>
            <script src="../scripts/owl.carousel.min.js "></script>
            <script src="../scripts/script.js "></script>
</body>

</html>