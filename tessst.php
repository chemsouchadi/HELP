<?php
$_SERVEurBD = "localhost";
$nomUtilisateur = "root";
$motDePasse = "";

$nomBaseDeDonne = "sss";
@mysql_connect($_SERVEurBD, $nomUtilisateur, $motDePasse);
$db = mysql_connect('localhost', 'root');
mysql_select_db('tester1', $db);
$sql = 'SELECT * FROM tester1';
$req = mysql_query($sql) or die('Erreur SQL !<br>' . $sql . '<br>' . mysql_error());
while ($data = mysql_fetch_assoc($req)) {
    echo '<b>' . $data['NomEnf'] . '' . $data['cle'] . '</b>(.$data' . $data['PreEnf'] . ')';
}
