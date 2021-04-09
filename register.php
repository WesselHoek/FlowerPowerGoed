<?php
//index.php

// include the database class
include "database.php";

require_once('header.php');

if(isset($_POST['submit'])){

    $fields = ['voorletters', 'achternaam', 'adres', 'postcode', 'woonplaats', 'geboortedatum', 'uname', 'pword'];

    $error = false;

    foreach($fields as $field){
        if(!isset($_POST[$field]) || empty($_POST[$field])){
         $error = true;
    }
}

if(!$error){
    // store posted form values in variables
    $voorletters= $_POST['voorletters'];
    $tussenvoegsel= isset($_POST['tussenvoegsel']) ? $_POST['tussenvoegsel'] : '';
    $achternaam= $_POST['achternaam'];
    $adres= $_POST['adres'];
    $postcode= $_POST['postcode'];
    $woonplaats= $_POST['woonplaats'];
    $geboortedatum= $_POST['geboortedatum'];
    $username= $_POST['uname'];
    $password= $_POST['pword'];


        
    $database = new database();
    // login function
    $database->registreer_klant($voorletters, $tussenvoegsel, $achternaam, $adres, $postcode, $woonplaats, $geboortedatum, $username, $password);
 }
}
?>

<body> 
<div class="container-fluid">
        <div class="row">
            <div class="col-7">
                <img class="img-fluid blur" style="float: left;" src="image/bloemenvelden.jpg" alt="bloemenvelden">
            </div>

        <div class="col-3 border shadow p-3 mb-5 bg-white rounded registreer">
            <form class="form-signin" action="" method="post">
            <h1 class="h3 mb-3 font-weight-normal">Registrieren FlowerPower</h1>

                <label for="voorletters">voorletters</label>
                <input type="text" name="voorletters" class="form-control" required="">
                <br>

                <label for="Tussenvoegsel">Tussenvoegsel</label>
                <input type="text" name="tussenvoegsel" class="form-control">
                <br>

                <label for="achternaam">achternaam</label>
                <input type="text" name="achternaam" class="form-control" required="">
                <br>

                <label for="adres">adres</label>
                <input type="text" name="adres" class="form-control" required="">
                <br>

                <label for="postcode">postcode</label>
                <input type="text" name="postcode" class="form-control" required="">
                <br>

                <label for="woonplaats">woonplaats</label>
                <input type="text" name="woonplaats" class="form-control" required="">
                <br>

                <label for="geboortedatum">geboortedatum</label>
                <input type="date" name="geboortedatum" class="form-control"required="" >
                <br>

                <label for="gebruikersnaam">gebruikersnaam</label>
                <input type="text" name="uname" class="form-control" required="">
                <br>

                <label for="Wachtwoord">Wachtwoord</label>
                <input type="password" name="pword" class="form-control" required="">
                <br>

                <input type="submit" name="submit" class="btn btn-lg btn-success btn-block" value="submit">
                <a href="loginCustomer.php" id="zwart" class="btn btn-link" role="button">Login</a>
            </form>
        </div>
    </div>
</div>  
</body>

<?php
require_once('footer.php');
?>