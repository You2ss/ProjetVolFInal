<?php
session_start()


?>
<!DOCTYPE html>
<html lang="en">
<head>


    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">

<section >

<center>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="container">
        <form action="../../src/traitement/update_volBdd.php" method="post" class="main-form">
            <h3>Modifier votre vol</h3>
            <br>
            <li><a href="../../src/admin/index-A.php">Retour</a></li>
            <br>
            <br>
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                            <label >Id</label>
                            <input class="form-control" placeholder="" type="number" name="id_vol">
                        </div>
                        <br>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                            <label >Date</label>
                            <input class="form-control" placeholder="Any" type="date" name="date_depart">
                        </div>
                        <br>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                            <label >Heure départ</label>
                            <input class="form-control" placeholder="Any" type="time" name="heure_depart">
                        </div>
                        <br>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                            <label >Heure arriver</label>
                            <input class="form-control" placeholder="Any" type="time" name="heure_arrivee">
                        </div>
                        <br>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                            <label >Pilote</label>
                            <input class="form-control" placeholder="" type="number" name="ref_pilote">
                        </div>
                        <br>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                            <label >Avion</label>
                            <input class="form-control" placeholder="" type="number" name="ref_avion">
                        </div>
                        <br>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                    <button class="form-control" type="submit">Modifier</button>
                </div>
            </div>
        </form>
    </div>
</center>
</section>


<!-- footer -->
<footer>

</footer>
<!-- end footer -->
<!-- Javascript files-->
<script src="../../js/jquery.min.js"></script>
<script src="../../js/popper.min.js"></script>
<script src="../../js/bootstrap.bundle.min.js"></script>
<script src="../../js/jquery-3.0.0.min.js"></script>
<script src="../../js/plugin.js"></script>
<!-- sidebar -->
<script src="../../js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="../../js/custom.js"></script>
<!-- javascript -->
<script src="../../js/owl.carousel.js"></script>
<script>
    $(document).ready(function() {
        var owl = $('.owl-carousel');
        owl.owlCarousel({
            margin: 10,
            nav: true,
            loop: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        })
    })
</script>

</head>
</html>