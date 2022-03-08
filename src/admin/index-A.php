<?php
require_once 'scr/BDD/Bdd.php';
require_once 'scr/Modele/Vol.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Start Bootstrap Theme</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">

    <link href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">


</head>
<body id="page-top">
<!-- Navigation-->
<nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="#page-top">[ADMIN] AJOUT/MODIFICATION/SUPPRESSION</a>
        <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="admin/admin.php">Acceuil ADMIN</a></li>
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="scr/traitement/update_vol.php">Modifier</a></li>
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="scr/traitement/suppression_vol.php">Supprimer</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- Masthead-->
<header class="masthead bg-primary text-white text-center">
    <div class="container d-flex align-items-center flex-column">

        <!-- Masthead Heading-->
        <h1 class="masthead-heading text-uppercase mb-0">VOLS</h1>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Masthead Subheading-->
        <p class="masthead-subheading font-weight-light mb-0"></p>
    </div>
</header>
<form action="scr/Traitement/traitement_vol.php" method="post" class="main-form">
    <h3>Insérer votre vol</h3>
    <div class="row">

        <div class="col-md-9">

            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                    <label > Date </label>
                    <br>
                    <input class="form-control" placeholder="Any" type="date" name="date_depart">
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                    <label >Heure départ</label>
                    <input class="form-control" placeholder="Any" type="time" name="heure_depart">
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                    <label >Heure arriver</label>
                    <input class="form-control" placeholder="Any" type="time" name="heure_arrivee">
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                    <br>
                    <label >Pilote</label>
                    <select class="js-example-basic-single" name="ref_pilote">


                        <option value="">--Choisissez un pilote--</option>
                        <?php
                        require_once 'scr/Modele/Pilote.php';
                        $bdd = new Bdd();
                        $pilote = new Pilote();

                        $pilote = $pilote->AfficherPilote($pilote);

                        foreach ($pilote as $value){
                            echo "<option value=".$value['id_pilote'].">".$value['nom']." ".$value['prenom']."</option>";
                        }?>
                    </select>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                    <br>
                    <label >Avion</label>

                    <select class="js-example-basic-single" name="ref_avion">
                        <option value="">--Choisissez un avion--</option>
                        <?php
                        require_once 'scr/Modele/Avion.php';
                        $bdd = new Bdd();
                        $avion = new Avion();
                        $avion = $avion->AfficherAvion($avion);

                        foreach ($avion as $value){
                            echo "<option value=".$value['id_avion'].">".$value['nom']."</option>";
                        }?>
                    </select><br>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
            <br>
            <button class="form-control" type="submit">Inserer</button>

        </div>
    </div>

</form>
<br>
<br>
<br>
<br>
<hr>
<!-- Portfolio Section-->
<section class="page-section portfolio" id="portfolio">
    <div class="container">
        <!-- Portfolio Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Tableau des vols</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <body>
        <div class="container" style="margin-top:50px;">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>date_depart</th>
                    <th>heure_depart</th>
                    <th>heure_arrivee</th>
                    <th>ref_pilote</th>
                    <th>ref_avion</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $bdd= new Bdd();
                $vol = new Vol(array());

                foreach ($vol->Afficher($bdd) as $values) {
                    ?>
                    <tr>
                        <td><?php echo $values['date_depart']?></td>
                        <td><?php echo $values['heure_depart']?></td>
                        <td><?php echo $values['heure_arrivee']?></td>
                        <td><?php echo $values['ref_pilote']?></td>
                        <td><?php echo $values['ref_avion']?></td>
                    </tr>
                <?php  } ?>
                </tbody>
            </table>
        </div>

        </body>
        <!-- Contact Section Form-->
        <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-7">
                <!-- * * * * * * * * * * * * * * *-->
                <!-- * * SB Forms Contact Form * *-->
                <!-- * * * * * * * * * * * * * * *-->
                <!-- This form is pre-integrated with SB Forms.-->
                <!-- To make this form functional, sign up at-->
                <!-- https://startbootstrap.com/solution/contact-forms-->
                <!-- to get an API token!-->

            </div>
        </div>
    </div>
</section>


<script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" ></script>

<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
        $('.table').DataTable();
        $('.js-example-basic-single').select2();

    });
</script>
<script>
    $(document).ready(function() {
    });
</script>
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<!-- * *                               SB Forms JS                               * *-->
<!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
</body>
</html>