<?php
require_once("functions.php");
?>
<div class="container">
<form action="" method="post">
        <div class="form-group">
            <label for="formGroupExampleInput">Voornaam</label>
            <input class="form-control" type="text" name="voornaam"> <br>
            <label for="formGroupExampleInput">Tussenvoegsel</label>
            <input class="form-control" type="text" name="tussenvoegsel"><br>
            <label for="formGroupExampleInput">Achternaam</label>
            <input class="form-control" type="text" name="achternaam"> <br>
            <label for="formGroupExampleInput">Geslacht</label>
            <input class="form-control" type="text" name="geslacht"> <br>
            <label for="formGroupExampleInput">Team nummer</label>
            <label for="teamnr"> </label>
            <select name="teamnr" class="form-select">
                <?php
                $data2 = $database->select("team","teamNr");
                foreach($data2 as $item2) {

                    $teamnr = $item2['teamNr'];
                    ?> <option value= <?php echo $teamnr ?>> <?php echo $teamnr  ?> </option>;
                <?php } ?>
        </div>
        <input type="submit" class="btn btn-primary" value="Verander" name="verander">
</form>
    <?php
    if(isset($_POST['verander'])){

        $database->insert("leden", [
            "voornaam"=>$_POST['voornaam'],
            "tussenvoegsel"=>$_POST['tussenvoegsel'],
            "achternaam"=>$_POST['achternaam'],
            "geslacht"=>$_POST["geslacht"],
            "teamNr"=>$_POST["teamnr"]
            ]);
        header( "refresh:1; url=index.php" );
    }






    ?>
