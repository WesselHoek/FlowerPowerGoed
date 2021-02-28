<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
include 'database.php';
$db = new database();



if(isset($_GET['medewerkers_medewerkerscode'])){
    $db = new database();
    $medewerker = $db->select("SELECT * FROM medewerkers WHERE medewerkerscode = :medewerkerscode", ['medewerkerscode'=>$_GET['medewerkers_medewerkerscode']]);
    //print_r($artikel); // uitkomst in browser: Array ( [0] => Array ( [id] => 5 [artikel] => bloesem [prijs] => 5.95 ) )
}
    
// if(isset($_POST['submit'])){
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $sql = "UPDATE medewerkers SET voorletters=:voorletters, voorvoegsel=:voorvoegsel, achternaam=:achternaam, gebruikersnaam=:gebruikersnaam WHERE medewerkerscode=:medewerkerscode";

    $placeholders = [
        'voorletters'=>$_POST['voorletters'],
        'voorvoegsel'=>$_POST['voorvoegsel'],
        'achternaam'=>$_POST['achternaam'],
        'gebruikersnaam'=>$_POST['gebruikersnaam'],
        'medewerkerscode'=>$_POST['medewerkerscode']
    ];

    
    $db->update_or_delete($sql, $placeholders);

}
?>


<form action="edit_medewerkers.php" method="POST">
<input type="hidden" name="medewerkerscode" value="<?php echo isset($_GET['medewerkers_medewerkerscode']) ? $_GET['medewerkers_medewerkerscode'] : '' ?>">
<input type="text" name="voorletters" placeholder="voorletters" value="<?php echo isset($medewerker) ? $medewerker[0]['voorletters'] : ''?>">
<input type="text" name="voorvoegsel" placeholder="voorvoegsel" value="<?php echo isset($medewerker) ? $medewerker[0]['voorvoegsel'] : ''?>">
<input type="text" name="achternaam" placeholder="achternaam" value="<?php echo isset($medewerker) ? $medewerker[0]['achternaam'] : ''?>">
<input type="text" name="gebruikersnaam" placeholder="gebruikersnaam" value="<?php echo isset($medewerker) ? $medewerker[0]['gebruikersnaam'] : ''?>">
<input type="submit" value="Edit">

</form>
    
</body>
</html>