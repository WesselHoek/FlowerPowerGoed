<?php
//index.php

// start the session
session_start();

// include the database class
include "database.php";

require_once('header.php');

if(isset($_POST['submit'])){

    $fields = ['artikel', 'prijs'];

    $error = false;

    foreach($fields as $field){
        if(!isset($_POST[$field]) || empty($_POST[$field])){
         $error = true;
    }
}

if(!$error){
    // store posted form values in variables
    $artikel= $_POST['artikel'];
    $prijs= $_POST['prijs'];



        
    $database = new database();
    // login function
    $database->artikel_toevoegen($artikel, $prijs);
 }
}
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medewerker toevoegen</title>

    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    
    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>

<body> 
<div class="container-fluid">
        <div class="row">
            <div class="col-7">
                <img class="img-fluid blur" style="float: left;" src="image/bloemenvelden.jpg" alt="bloemenvelden">
            </div>

        <div class="col-3 ruimte border shadow p-3 mb-5 bg-white rounded registreer">
        
            <form class="form-signin" action="" method="post">
            <h1 class="h3 mb-3 font-weight-normal">Artikel toevoegen</h1>

                <label for="artikel">Artikel</label>
                <input type="text" name="artikel" class="form-control" required="">
                <br>

                <label for="prijs">Prijs</label>
                <input type="number" name="prijs" class="form-control" required="">
                <br>

                <input type="submit" name="submit" class="btn btn-lg btn-success btn-block" value="submit">
            </form>
            <br>
            <button type="button" class="btn btn-primary btn-lg btn btn-light"><a href="medewerker.php">terug</a></button>
        </div>
    </div>
</div>  
</body>

<?php
require_once('footer.php');
?>