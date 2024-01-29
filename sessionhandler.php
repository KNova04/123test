<?php
session_start();
$num=$_SESSION["index"]+10 ;
$negnum=$_SESSION["index"]-10 ;
var_dump($_REQUEST);

if ($num<$_REQUEST['max']&& $_REQUEST['opt']=='p'){
$_SESSION['index']=$num;
    echo '1';
}
if ($negnum>=0&& $_REQUEST['opt']=='n'){
    $_SESSION['index']=$negnum;
    echo '2';
}
if($_REQUEST['opt']=='go'){
    $_SESSION['index']=$_REQUEST['max'];
    echo '3';
}
//$_SESSION['index']=0;
header("Location: index.php");
