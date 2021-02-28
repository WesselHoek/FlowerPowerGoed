<?php
//index.php

// start the session
session_start();

// include the database class
include "database.php";

require_once('header.php');

$db = new database();

$winkels=$db->artikel_select();
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    
    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>

<body>
<div class="containter-fluid">
<button type="button" class="btn btn-primary btn-lg btn btn-light"><a href="medewerker.php">terug</a></button>
    <div class="row">
        <div class="col-3"></div>

        <div class="col-5">
            <select name="winkel" class="form-control form-control-lg">
                <?php foreach ($artikels as $artikel): ?>
                    <option><?=$artikels["artikelcode"]?><?=$artikels["artikel"]?><?=$artikels["prijs"]?></option>
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