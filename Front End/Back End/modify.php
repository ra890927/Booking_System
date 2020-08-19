<?php
    session_start();
    if (empty($_SESSION["account"])){
        header("Location:../login.php"); 
        exit();
    }

    include "../conf.php";
    include "db.php";
#CONNECT DB#
    $con = mysqli_connect($DB_NAME, $DB_ACC, $DB_PASSWD, "schedule");
    if (mysqli_connect_errno($con))  
    {  
        echo "连接 MySQL 失败: " . mysqli_connect_error();  
    }

    $user_id = $_SESSION['user_id'];
    $room = $_POST['room'];
    $from = $_POST['from'];
    $to = $_POST['to'];



    if( count( check_available($con, $room , $from , $to) ) == 0 ){
        $sql_command="DELETE * FROM $room WHERE s_begin = $from AND s_end = $to AND user_id = $user_id;";
        
        $result = mysqli_query($con, $sql_command);
        mysqli_commit($con);
        mysqli_close($con);
    }
    
?>