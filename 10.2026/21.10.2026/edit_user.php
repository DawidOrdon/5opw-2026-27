<?php
    $db=new mysqli("localhost","root","","sklep_join");
    $sql = "UPDATE sklep_join.klienci t SET 
        t.imie             = ?, 
        t.nazwisko         = ?,
        t.email            = ?,
        t.id_miasta        = ?
    WHERE t.id_klienta = ?;";
    $stmt=$db->prepare($sql);
    $stmt->bind_param("sssii",$_POST['imie'],$_POST['nazwisko'],$_POST['email'],$_POST['miasta'],$_GET['id']);
    $stmt->execute();
    header("Location: ./index.php");
?>