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
require_once('header.php');
$db = new database();

if(isset($_GET['artikel_artikelcode'])){
    $db = new database();
    $artikel = $db->select("SELECT * FROM artikel WHERE artikelcode = :artikelcode", ['artikelcode'=>$_GET['artikel_artikelcode']]);
    //print_r($artikel); // uitkomst in browser: Array ( [0] => Array ( [id] => 5 [artikel] => bloesem [prijs] => 5.95 ) )
}
    
// if(isset($_POST['submit'])){
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $sql = "UPDATE artikel SET artikel=:artikel, prijs=:prijs WHERE artikelcode=:artikelcode";

    $placeholders = [
        'artikel'=>$_POST['artikel'],
        'prijs'=>$_POST['prijs'],
        'artikelcode'=>$_POST['artikelcode']
    ];

    
    $db->update_or_delete($sql, $placeholders);

}
?>

<div class="container">
    <form action="edit_artikel.php" method="POST">
        <div class="form-group">
            <input type="hidden" name="artikelcode" value="<?php echo isset($_GET['artikel_artikelcode']) ? $_GET['artikel_artikelcode'] : '' ?>">
            <!-- ternary operator: https://www.codementor.io/@sayantinideb/ternary-operator-in-php-how-to-use-the-php-ternary-operator-x0ubd3po6 -->
            <!-- 
            artikel is een array met een index 9 (= Array ( [0] => Array ( [id] => 5 [artikel] => bloesem [prijs] => 5.95 ) )). 
            value van de index is een array. Daarom moeten we van artikel de 0e index nemen ($artikel[0]). dat is: Array ( [id] => 5 [artikel] => bloesem [prijs] => 5.95 )
            Van deze array kunnen wij alleen de values ophalen aan de hand van de keys. daarom doen we bijv $artikel[0]['prijs']. -->
            <label for="Artikel">Artikel</label>
            <input type="text" class="form-control" name="artikel" placeholder="artikel" value="<?php echo isset($artikel) ? $artikel[0]['artikel'] : ''?>">
            <br>
            <label for="Prijs">Prijs</label>
            <input type="text" class="form-control" name="prijs" placeholder="prijs" value="<?php echo isset($artikel) ? $artikel[0]['prijs'] : ''?>">
            <br>
            <input type="submit" class="btn btn-lg btn-success btn-block" value="Edit">
        </div>
    </form>
</div>
</body>
</html>