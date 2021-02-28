<?php
// this inserts the header
    require_once('header.php');

   // include the database class
    include "database.php";
    session_start();

$db = new database();
echo $_SESSION['uname'];
$winkels=$db->winkel_select();

?>


<body>
<div class="containter-fluid">
    <div class="row ruim">
        <div class="col-3 ruimte"></div>

        <div class="col-2">
            <button type="button" class="btn btn-primary btn-lg btn-success"><a href="overzicht_artikelen.php">Overzicht artikelen</a></button>
        </div>

        

        <div class="col-2">
            <button type="button" class="btn btn-primary btn-lg btn-success"><a href="overzicht_medewerker.php">Overzicht medewerker</a></button>
        </div>

        <div class="col-2">
            <select name="winkel" class="form-control form-control-lg">
                <?php foreach ($winkels as $winkel): ?>
                    <option><?=$winkel["winkelcode"]?><?=$winkel["winkelnaam"]?></option>
                <?php endforeach ?>
            </select>
        </div>

        <div class="col-3"></div>
    </div>
</div>
</body>




    

<?php
// this inserts the header
    require_once('footer.php');
?>