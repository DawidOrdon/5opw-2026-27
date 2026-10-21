<?php
var_dump($_POST);
if(isset($_POST["in1"])){
    if(!empty($_POST["in1"])){
        if(is_numeric($_POST["in1"])){
            echo"zmienna to numer";
        }else{
            echo"zmienna to inny typ";
        }
    }else{
        echo"zmienna jest pusta";
    }
}else{
    echo "nie ma zmiennej";
}