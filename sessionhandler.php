<?php
session_start();
$num=$_SESSION["index"]+10 ;
$negnum=$_SESSION["index"]-10 ;
var_dump($_REQUEST);
if ($_REQUEST['opt']== 'n' && $num<=$_REQUEST['max']){
    $_SESSION['index']=$num;
    echo '1';
}
    
if ($_REQUEST['opt']== 'p' && $negnum>=0){
    $_SESSION['index']=$negnum;
    echo '2';
}

if($_REQUEST['opt']=='go'){
    $_SESSION['index']=$_REQUEST['max'];
    echo '3';
    
}




header("Location: index.php");

