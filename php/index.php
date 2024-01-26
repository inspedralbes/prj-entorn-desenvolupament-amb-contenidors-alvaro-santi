<h1>HOLA</h1>
<p>
<?php
echo "Soc codi php";
error_log(" ATENCIO ATENCIO --> Aixo apareixera als logs del contenidor");
error_log(" Juntament amb els logs de l'apache i del mysql");
?>


</p>
</h2>Soc HTML</h2>
<?php
error_log("Establim dades connexio i provem de connectar-nos-hi");
$servername = "db";
$username = "root";
$password = "1Password";
$dbname = "persones";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  echo "ERROR CONNECTION";
  error_log("Impossible connectar amb el mysql".$conn->connect_error);
  error_log("MySQL ja esta aixecat? segur? prova accedir des d Adminer");
  die("Connection failed: " . $conn->connect_error);
}

echo "<p>Connexió realitzada, mostrem dades de la taula noms</p>";
$sql = "SELECT id, nom FROM noms";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Nom: " . $row["nom"]."<hr>";
  }
} else {
  echo "Taula buida, res a mostrar";
}
$conn->close();

?>
<br><br>
<h3>Administració via web del MySql --><a href="http://localhost:9091">Adminer</a> </h3>