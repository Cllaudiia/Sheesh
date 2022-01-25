<?php
session_start();
$_SESSION["test"] = "test";
require "functions.php";

$data = $database->select("drank", "*");
var_dump($data);
$data2 = $database->select("bon","*",[
    $tafelnummer => "tafelNr"
]);
echo $tafelnummer;

?>
    <body>

    <a href="test.php">asdasdsa</a>
    <form method="get" action="">
        <label for="Drank"> </label>
            <?php
            $data2 = $database->select("drank", ["drankNr",]);
            foreach ($data2 as $item2) {
                $dranknr = $item2['drankNr'];
                ?>
                <label for="Drank"> <?php echo $item2['drankNr']. ":" ?> </label>
                <input type="text" id="drank" name="<?php echo $item2['drankNr'] ?>"><br>
            <?php } ?>
            <input type="submit" id="Printen" name="versturen">
    </form>
    </body>
<?php
if(isset($_GET['versturen'])) {
    $data2 = $database->select("drank", ["drankNr","prijs",]);
    foreach ($data2 as $item2) {
        $prijs = $item2["prijs"];
        $dranknaam = $item2['drankNr'];
        $totaalprijs = $prijs * $_GET[$dranknaam];
        $tafelnummer = 1;
        echo $_GET[$dranknaam] . " " . $item2['drankNr']." totaal". $totaalprijs . " ";
        $database->insert("bon", [
            "drank" => $item2['drankNr'],
            "drankhvl" => $_GET[$dranknaam],
            "tafelNr" => $tafelnummer,
            "prijs" => $totaalprijs,

        ]);


    }
}

?>