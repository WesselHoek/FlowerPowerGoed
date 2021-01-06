<?php
//index.php

// start the session
session_start();

// include the database class
include "database.php";
require_once('header.php');



// $title contains the title for the page
$title = "Login";

// this inserts the header and the navbar
//require_once('header.php');  

// start a new db connection
$db = new DB('localhost', 'root', '', 'flowerpower', 'utf8');

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
<body class="text-center" cz-shortcut-listen="true">
    <?php
        // if $message is set then echo it
        if(isset($message)){
            echo '<label class="test-danger">' . $message . '</label>';
        }
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-7" style="padding: 0;">
                <img class="img-fluid blur" style="float: left;" src="image/bloemenvelden.jpg" alt="bloemenvelden">
            </div>

        <div class="col-3 ruimte">
            <form class="form-signin" action="" method="post">
            <h1 class="h3 mb-3 font-weight-normal">Log in</h1>

                <label for="text" >Gebruikersnaam</label>
                <input type="text" name="text" class="form-control" placeholder="Email address" required="" autofocus="" autocomplete="off">
                <br>

                <label for="Password">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password" required="" autocomplete="off">
                <br>
                
                <input type="submit" name="login" class="btn btn-lg btn-success btn-block" value="Login">

            </form>
        </div>
    </div>
</div>
</body>
</html>
<?php
require_once('footer.php');
?>