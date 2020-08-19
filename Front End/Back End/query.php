<!--
filter: people, begin, end, lasttime, room 
return: empty time slot
-->

<?php 
include "../conf.php"; 
include "db.php";

# CONNECT DB #
    $con = mysqli_connect($DB_NAME, $DB_ACC, $DB_PASSWD, "schedule");
    if (mysqli_connect_errno($con))  
    {  
        echo "连接 MySQL 失败: " . mysqli_connect_error();  
    }
    
# FORMAT #
    $q_room = "`" . $_POST['room'] . "`";
    $q_begin  = "\"" . $_POST['begin'] . "\"";
    $q_end = "\"" . $_POST['end'] . "\"";
    $interval = 1;

    #original time_slot
    $time_array = [];
    for($i = 0; $i < 9; $i++){
        $time_array[$i] = $i + 9;
    }
    //print_r( $time_array );

    # modify to empty_time_slot
    $sql_query = "SELECT CAST(s_begin as time), CAST(s_end as time)  FROM  $q_room  WHERE ";
    if( $q_begin != '' && $q_end != '' ){
        $sql_query = " '$sql_query'  s_begin >= '$q_begin' AND s_end <= '$q_end' "  ;
    }
    $result = mysqli_query($con, $sql_query);
    $data = mysqli_fetch_all($result);

    
    for($i = 0; $i < count($data); $i++){
        $del = ['s' => $data[$i][0], 'e' => $data[$i][1] ];
        echo $data[$i][0] . "  " .  $data[$i][1];
        echo '<br>';
        $time_array = _get_empty_slot($time_array, $del);
        
    }
    # print empty slot
    echo '<pre>';
    print_r( $time_array );
    echo '</pre>';
    mysqli_close($con);

    function _get_empty_slot($all = [], $del = []){
        $del['s'] = explode(':', $del['s'])[0]; // 14
        $del['e'] = explode(':', $del['e'])[0];
        $sub = $del['e'] - $del['s'];

        $left = [];
        for($i = 0; $i < $sub; $i ++)
        {
            $left[] = $del['s'] + $i . ":00"; // 14:00
        }

        foreach ($all as $i => $hour) {
            if (in_array($hour, $left)) {
                unset($all[$i]);
            }
        }
        return $all;
    }

?>