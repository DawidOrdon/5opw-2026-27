<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="./script.php" method="post">
    <input type="text" name="in1" id="">
    <input type="text" name="in2" id="">
    <input type="submit" value="wyślij">
</form>
<?php
$zmienna = 567.654;
//        if($zmienna==1){
//            echo "1";
//        }else if($zmienna==2){
//            echo "2";
//        }else{
//            echo "inna";
//        }
if (is_int($zmienna)) {
    echo "int";

} else if (is_float($zmienna)) {
    echo "float";
} else if (is_string($zmienna)) {
    echo "string";
}
echo gettype($zmienna);
var_dump($zmienna);
$db = new mysqli("localhost", "root", "", "piwo");
$sql = $db->prepare("SELECT * FROM `piwa`");
$sql->execute();
$result = $sql->get_result();
echo "<pre>";
var_dump($result);
var_dump($result->fetch_all());
echo "</pre>";
?>
<a href="./script2.php?id=4&&cos=4323"><button>wyslij2</button></a>

<form action="./script2.php" method="post">
    <input type="hidden" name="id" value="4">
    <input type="hidden" name="cos" value="4323">
    <input type="submit" value="wyslij2">
</form>
</body>
</html>