<html>
<head><script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>
</head>
<body>
<li><a href="../../admin/admin.php">Acceuil ADMIN</a></li>
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
    require_once 'src/bdd/Bdd_.php';
    require_once 'src/modele/Vol_2.php';

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