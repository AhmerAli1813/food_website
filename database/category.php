<?php
include "conf.php";
 $q=$conn->query("SELECT * FROM `catagory`");

 while($result = mysqli_fetch_assoc($q)){
    $output[] = $result;
 }

 echo" <pre>";
 echo print_r($output);
 echo" </pre>";