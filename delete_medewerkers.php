<?php


if(isset($_GET['medewerkers_medewerkerscode'])){

    include 'database.php';
    $db = new database();

    $sql = "DELETE FROM medewerkers WHERE medewerkerscode =:medewerkerscode ";

    $placeholders = [
        'medewerkerscode'=>$_GET['medewerkers_medewerkerscode']
    ];

    
    $db->update_or_delete_medewerkers($sql, $placeholders);
}

?>