<?php
include "../conf.php"; 
# CHECK PWD #
session_start();
    $link = mysqli_connect($DB_NAME,$DB_ACC, $DB_PASSWD, 'users');
    $account = $_POST["account"];
    $sql = "SELECT * FROM users WHERE account = '$account'";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_NUM);
    
if($_POST['password'] == $row[2]){
    mysqli_free_result($result);
    mysqli_close($link);
    $_SESSION['account'] = $_POST['account'];
    $_SESSION['user_id'] = $row[0];
    if($_GET['ret'] != ''){
        header("location: " . $_GET['ret']);  
    }
    else{
        header("location: ../index.php");
    }
    exit();
}
else{
    mysqli_free_result($result);
    mysqli_close($link);
    header("location:../login.php?errno=1"); 
}
?>