<?php 
session_start();

if(isset($_SESSION["cart"])){
    echo  '<span class="badge bg-success">'.count($_SESSION["cart"]).'</span>';
}else{
    echo "";
}

?>