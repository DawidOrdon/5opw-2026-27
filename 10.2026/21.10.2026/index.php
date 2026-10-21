<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        #t1 td, #t1 th, #t1>tr, #t1{
            border:1px solid black;
            border-collapse: collapse;
            padding: 2px 4px;
        }
        table{
            /*display: block;*/
            float: left;
        }
        section{
            float:left;
        }
    </style>
</head>
<body>
<table id="t1">
    <tr>
        <th>id</th>
        <th>Imie</th>
        <th>Nazwisko</th>
        <th>email</th>
        <th>Miasto</th>
        <th>data rejestracji</th>
        <th>usuń</th>
    </tr>
    <?php
        $db = new mysqli("localhost", "root", "", "sklep_join");
        $sql = "SELECT * from klienci join miasta on klienci.id_miasta = miasta.id_miasta";
        $query = $db->prepare($sql);
        $query->execute();
        $result = $query->get_result();
        while($row = $result->fetch_object()) {
            echo "<tr>";
            echo "<td>" . $row->id_klienta . "</td>";
            echo "<td>" . $row->imie . "</td>";
            echo "<td>" . $row->nazwisko . "</td>";
            echo "<td>" . $row->email . "</td>";
            echo "<td>" . $row->nazwa . "</td>";
            echo "<td>" . $row->data_rejestracji . "</td>";
            echo "<td><a href='./del_user.php?id=".$row->id_klienta."'><button>usuń</button></a></td>";
            echo "<td><a href='./index.php?id=".$row->id_klienta."'><button>edytuj</button></a></td>";
            echo "</tr>";
        }
    ?>
</table>
<section>
    <form <?php
            if(isset($_GET['id'])){
                echo"action='edit_user.php?id=".$_GET['id']."'";
            }else{
                echo "action='add_user.php'";
            }
          ?> method="post">
        <?php
            if(isset($_GET['id'])){
                $sql="SELECT * FROM klienci WHERE id_klienta=?";
                $query = $db->prepare($sql);
                $query->bind_param("i", $_GET['id']);
                $query->execute();
                $result = $query->get_result();
                $row = $result->fetch_object();
            }
        ?>
        <table style="border: 0">
            <tr>
                <td><label for="imie">Imie</label></td>
                <td><input type="text" name="imie" id="imie" value="<?php echo isset($_GET['id'])?$row->imie:""?>"></td>
            </tr>
            <tr>
                <td><label for="nazwisko">Nazwisko</label></td>
                <td><input type="text" name="nazwisko" id="nazwisko" value="<?php echo isset($_GET['id'])?$row->nazwisko:""?>"></td>
            </tr>
            <tr>
                <td><label for="email">Email</label></td>
                <td><input type="email" name="email" id="email" value="<?php echo isset($_GET['id'])?$row->email:""?>"></td>
            </tr>
            <tr>
                <td><label for="miasta">Miasto</label></td>
                <td>
                    <select name="miasta" id="miasta" style="width: 100%">
                        <?php
                        if(!isset($_GET['id'])){
                            $id_miasta=0;
                        }else{
                            $id_miasta =$row->id_miasta;
                        }
                        $sql="SELECT id_miasta, nazwa FROM miasta";
                        $query = $db->prepare($sql);
                        $query->execute();
                        $result = $query->get_result();
                        while($row = $result->fetch_object()) {
                            if($row->id_miasta==$id_miasta){
                                $sel="selected";
                            }else{
                                $sel="";
                            }
                            echo "<option value='" . $row->id_miasta . "' $sel>" . $row->nazwa . "</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="<?php echo isset($_GET['id'])?"edytuj":"dodaj"?>" style="width: 100%;"></td>
            </tr>
        </table>


    </form>
</section>
</body>
</html>