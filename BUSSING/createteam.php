<?php
require_once("functions.php");
?>
<div class="container">
    <form action="" method="post">
        <div class="form-group">
            <label for="formGroupExampleInput">Team nummer</label>
            <input class="form-control" type="number" name="teamnumber"> <br>
            <label for="formGroupExampleInput">Competitie</label>
            <input class="form-control" type="text" name="competitie"><br>
        </div>
        <input type="submit" class="btn btn-primary" value="Verander" name="verander">
    </form>
<?php
if(isset($_POST['verander'])){

    $database->insert("team", [
        "teamNr"=>$_POST['teamnumber'],
        "competitie"=>$_POST['competitie'],
    ]);
 ?>
    <div class="alert alert-secondary" role="alert">
        Team aangemaakt!
    </div
    <?php
    header( "refresh:1; url=index.php" );
}
