<?php
var_dump($_POST);
$db = new mysqli("localhost", "root", "", "sklep_join");
$sql = "INSERT INTO klienci (imie, nazwisko, email, id_miasta, data_rejestracji) values (?,?,?,?,CURRENT_DATE())";
$stmt = $db->prepare($sql);
$stmt->bind_param("sssi",$_POST['imie'],$_POST['nazwisko'],$_POST['email'],$_POST['miasta']);
$stmt->execute();
print_r($stmt->affected_rows);
$stmt->close();
$db->close();
header('Location: ./index.php');