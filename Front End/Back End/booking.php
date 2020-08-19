<!-- request format post {date, from, to, title}-->
<!-- {user_id} -->

<?php
    session_start();
    if ( empty( $_SESSION["account"] ) ){
        header("Location:login.php");
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

#RECEIVE POST DATA#
    ###HTTP Post data ( start = date + from )
    $p_date  = date('Y-m-d',strtotime($_POST['date']));
    $p_start = date("Y-m-d",strtotime($_POST['date'])) . " " . $_POST['from'] ;
    $p_end   = date("Y-m-d",strtotime($_POST['date'])) . " " . $_POST['to']   ;
    $p_title = $_POST['title'];
    $p_room  = "`" . $_POST['room'] . "`";
    $user_id = $_SESSION['user_id'];

#CHECK#
    ###檢查時間合理性
    if( $p_start > $p_end ){
        echo '時間不合理<br>';
        echo '<input type="button" onclick="history.back()" value = "return">';
        return 0;
    }
    

    ###Check room avaliable
    $fetch = check_available($con, $p_room, $p_start, $p_end);
    if( count( $fetch ) != 0 ){
        echo '該時間已被預約<br>';
        echo '<input type="button" onclick="history.back()" value = "return">';
        return 0;
    }

#UPDATE DB#
    ###Update booking data
    $sql_command = "INSERT INTO  $p_room  
           ( s_begin, s_end, title, user_id ) 
            VALUES 
            (' $p_start ',
             ' $p_end   ',
             ' $p_title ',
             ' $user_id ');";

    $result = mysqli_query($con, $sql_command);
    if( mysqli_error( $con ) )
    {
        echo 'Update booking data failed.';
        print_r( mysqli_error($con) );
        return 0;
    }
  
    mysqli_commit($con);
    mysqli_close($con);

    ###If booking success 
    header("Location: ./"); //return to main page
?>