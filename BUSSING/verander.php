<?php
require_once("functions.php");
if (isset($_GET['lidNr'])){
    $lidnr = $_GET['lidNr'];
}
$data = $database->select("leden", "*", [
    "lidNr" => $lidnr
]);
?>
<div class="container">

<form action="" method="post">
    <?php foreach($data as $item) { ?>
    <?php $oudevoornaam = isset($item['voornaam']) ? $item['voornaam'] : 0 ?>
    <div class="form-group">
        <label for="formGroupExampleInput">Voornaam</label>
    <input class="form-control" type="text" name="voornaam" value=<?php echo $oudevoornaam ;  ?>> <br>
        <label for="formGroupExampleInput">Tussenvoegsel</label>
        <input class="form-control  " type="text" name="tussenvoegsel" value=<?php echo $item['tussenvoegsel']?>><br>
        <label for="formGroupExamp  leInput">Achternaam</label>
        <input class="form-control" type="text" name="achternaam" value=<?php echo $item['achternaam'] ; ?>> <br>
        <label for="formGroupExampleInput">Team nummer</label>
        <label for="teamnr"> </label>
            <select name="teamnr" class="form-select">
        <?php
        $data2 = $database->select("team",["teamNr",]);
        foreach($data2 as $item2) {
            $teamnr = $item2['teamNr'];
            ?> <option value= <?php echo $teamnr ?>> <?php echo $teamnr  ?> </option>;
        <?php } ?>
    </div>
        <input type="submit" class="btn btn-primary" value="Verander" name="verander">

    <?php }?>

</form>
    </div>

<?php
if(isset($_POST['verander'])){
    $voornaam = isset($_POST['voornaam']) ? $_POST['voornaam'] : 0;
    $tussenvoegsel = isset($_POST['tussenvoegsel']) ? $_POST['tussenvoegsel'] : 0;
    $achternaam= isset($_POST['achternaam']) ? $_POST['achternaam'] : 0;
    $teamnummer= isset($_POST['teamnr']) ? $_POST['teamnr'] : 0;

    $database->update("leden",[
            "voornaam" => $voornaam,
            "tussenvoegsel" => $tussenvoegsel,
            "achternaam" => $achternaam,
            "teamNr" => $teamnummer,
    ],
        [
            "lidNr" => $lidnr
    ]);
    ?>
    <div class="alert alert-secondary" role="alert">
        Gegevens geupdate!
    </div>
<?php
    header( "refresh:2; url=index.php" );
}
?>

