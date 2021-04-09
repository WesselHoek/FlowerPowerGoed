<?php
//index.php

// include the database class
include "database.php";

require_once('header.php');

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){

    $fields = ['winkelcode', 'artikelcode', 'aantal', 'medewerkerscode'];

    $error = false;

    foreach($fields as $field){
        if(!isset($_POST[$field]) || empty($_POST[$field])){
         $error = true;
    }
}

if(!$error){
    // store posted form values in variables
    $winkelcode= $_POST['winkelcode'];
    $artikelcode= $_POST['artikelcode'];
    $aantal= $_POST['aantal'];
    $medewerkerscode= $_POST['medewerkerscode'];
    print_r($_POST);
    $database = new database();
    // fixme: should supply more arguments
    // btw also fix number of params of bestellen()
    $database->bestellen($winkelcode, $artikelcode, $aantal, $medewerkerscode);

 }
}


?>
<body> 
<div class="none">
<?php
$database = new database();
$vestigingen = $database->select("SELECT winkelcode, winkelplaats, winkelnaam FROM winkel", []);
$artikel = $database->select("SELECT artikelcode, artikel, prijs FROM artikel", []);
$medewerkers = $database->select("SELECT medewerkerscode, gebruikersnaam, achternaam FROM medewerkers", []);
?>
</div>

<div class="container-fluid">
        <div class="row">
            <div class="col-7">
                <img class="img-fluid blur" style="float: left;" src="image/bloemenvelden.jpg" alt="bloemenvelden">
            </div>

        <div class="col-3 border shadow p-3 mb-5 bg-white rounded registreer">
            <form class="form-signin" action="artikel_bestellen.php" method="post">
            <h1 class="h3 mb-3 font-weight-normal">Artikel Bestellen</h1>

                <label for="winkel">winkel</label>
                <select name="winkelcode" class="form-control form-control-lg">
                <?php foreach ($vestigingen as $vestigingen): ?>
                    <option value="<?=$vestigingen["winkelcode"]?>"><?=$vestigingen["winkelplaats"]?> <?=$vestigingen["winkelnaam"]?></option>
                <?php endforeach ?>
                </select>
                <br>

                <label for="winkel">Artikel</label>
                <select name="artikelcode" class="form-control form-control-lg">
                <?php foreach ($artikel as $artikel): ?>
                    <option value="<?=$artikel["artikelcode"]?>"><?=$artikel["artikel"]?> <?=$artikel["prijs"]?></option>
                <?php endforeach ?>
                </select>
                <br>
 
                <label for="aantal">Aantal</label>
                <input type="text" name="aantal" class="form-control">
                <br>

                <label for="winkelcode">Medewerker</label>
                <select name="medewerkerscode" class="form-control form-control-lg">
                <?php foreach ($medewerkers as $medewerkers): ?>
                    <option value="<?=$medewerkers["medewerkerscode"]?>"><?=$medewerkers["gebruikersnaam"]?> <?=$medewerkers["achternaam"]?></option>
                <?php endforeach ?>
                </select>
                <br>

                <input type="submit" name="submit" class="btn btn-lg btn-success btn-block" value="submit">
                <a href="artikel_bestellen.php" id="zwart" class="btn btn-link" role="button">Login</a> 
            </form>
        </div>
    </div>
</div>  
</body>

<?php
require_once('footer.php');
?>