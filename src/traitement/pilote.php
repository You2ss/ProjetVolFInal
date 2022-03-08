<!DOCTYPE html>
<html lang="en">
<head>
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.6.0.min.js%22%3E"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>
<body>
<section>
    <center>
        <br>
        <br>
        <br>
        <br>
        <br>
    <div class="banner-main">
        <div class="container">
            <div class="text-bg">
                <div class="container">
                    <h2>Selectionner un Pilote</h2>
                    <select name="pilote" id="pilote">
                        <?php
                        require_once '../../src/modele/Pilotes.php';
                        $pilotes = new Pilotes();
                        foreach ($pilotes->setPilote() as $values){
                            ?>
                            <option><?php echo $values['nom']?></option>

                        <?php } ?>

                    </select>
                </div>
            </div>
        </div>
    </div>
    </center>
</section>

<script src="../../js/select2.js"></script>
<script >$(document).ready(function(){
        $('#pilote').select2()
    })</script>

</body>
</html>