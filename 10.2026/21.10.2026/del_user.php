<?php
var_dump($_GET);
$db = new mysqli("localhost", "root", "", "sklep_join");
$sql="delete from klienci where id_klienta = ?";
$stmt=$db->prepare($sql);
$stmt->bind_param("i", $_GET["id"]);
$stmt->execute();
header("Location: ./index.php");