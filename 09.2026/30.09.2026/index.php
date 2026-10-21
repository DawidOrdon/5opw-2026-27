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
<form action="" method="post">
    <input type="text" name="imie" id="">
    <input type="submit" value="szukaj">
</form>
<pre>
    <?php
        $imie="%";
        if(!empty($_POST['imie'])&&strlen($_POST['imie'])>0){
            $imie="%".$_POST['imie']."%";
        }
        $db = new mysqli('localhost', 'root', '', 'sklep_join');
        $sql = "SELECT * FROM klienci where imie like ?";
        $query = $db->prepare($sql);
        $query->bind_param('s', $imie);
        $query->execute();
        $result = $query->get_result();
//        print_r($result->fetch_all());
//        var_dump($result->fetch_all());
        while ($row = $result->fetch_object()) {
//            echo $row['imie']." ";
//            echo $row['nazwisko'] . "<br>";
            print_r($row);
        }
    ?>
</pre>
</body>
</html>