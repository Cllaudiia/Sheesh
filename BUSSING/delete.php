<?php
require_once("functions.php");
if (isset($_GET['lidNr'])){
    $lidnr = $_GET['lidNr'];
}
$data = $database->select("leden", "*", [
    "lidNr" => $lidnr
]);
foreach($data as $item) {
?>
    <div class="alert alert-danger" id="table2"  role="alert">

        Weet u zeker dat u dit wil verwijderen: <?php echo $item['lidNr']." ".$item['voornaam']." ".$item['tussenvoegsel']." ".$item['achternaam'] ?>
        <?php } ?>
    </div>
    <form id="table2" action="" method="post">
        <input type="radio" name="antwoord" value="ja">ja <br>
        <input type="radio" name="antwoord" value="nee">nee <br>
        <input type="submit" name="jaofnee" value="verstuur">
    </form>
<?php
if(isset($_POST['jaofnee'])) {
    if($_POST['antwoord'] == "ja"){
    if (isset($_GET['lidNr'])) {
        $lidnr = $_GET['lidNr'];

        $database->delete("leden", [
            "lidNr" => $lidnr
        ]);
    }
        header( "refresh:1; url=index.php");
    }
    else if ($_POST['antwoord'] == "nee"){
        echo"U word terug gestuurd";
        header( "refresh:1; url=index.php");
    }
}
?>