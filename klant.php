<?php
// this inserts the header
require_once('header.php');

// include the database class
 include "database.php";

    $db = new database();
    echo $_SESSION['uname'];
?>

<body>
<div class="containter">
    <div class="row">
        <div class="col-4"></div>
        <div class="col-3">
            <button type="button" class="btn btn-primary btn-lg btn-success"><a href="artikel_bestellen.php">Artikel bestellen</a></button>
        </div>

        <div class="col-3">
        <button type="button" class="btn btn-primary btn-lg btn-success"><a href="overzicht_klant.php">gegevens bewerken</a></button>
        </div>
        <div class="col-3">
            
        </div>
    </div>
</div>
</body>



<?php
// this inserts the header
    require_once('footer.php');
?>