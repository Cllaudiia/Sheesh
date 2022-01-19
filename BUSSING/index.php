<?php
require_once('functions.php');
?>
<!DOCTYPE html>
<head>

</head>
<body id="table2">
<a class="btn btn-primary" href="create.php">Aanmaken</a>
<a class="btn btn-primary" href="createteam.php">Team aanmaken</a>
<table class="table table-striped table-hover" id="table">
  <thead>
    <tr>
      <th scope="col">Lid nummer</th>
      <th scope="col">Voornaam</th>
      <th scope="col">Tussenvoegesel</th>
      <th scope="col">Achternaam</th>
        <th scope="col">Team nummer</th>
        <th scope="col">Aanpassen/Verwijderen</th>
    </tr>
  </thead>
    <tdbody>
<?php
$data = $database->select("leden", "*");
foreach($data as $item) {
    echo"<tr>";
    echo"<td>".$item['lidNr']."</td>";
    echo"<td>".$item['voornaam']."</td>";
    echo"<td>".$item['tussenvoegsel']."</td>";
    echo"<td>".$item['achternaam']."</td>";
    echo"<td>".$item['teamNr']."</td>";
    ?>
    <td><a class="btn btn-primary" href="verander.php?lidNr=<?php echo $item['lidNr']; ?>">Aanpassen</a> <a class="btn btn-danger" href="delete.php?lidNr=<?php echo $item['lidNr'];?>">Verwijderen</a></button></td>

        <?php
}
?>
</tr>

</tdbody>
</table>
</body>
<script>
    $('#table').DataTable();
</script>

</html>