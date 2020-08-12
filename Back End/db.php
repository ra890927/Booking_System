<?php

function check_available($con, $room, $begin, $end){
    $sql_crash = "SELECT * FROM ". $room . " WHERE 
       (    (   s_begin   >=  ' $begin '   AND   s_begin  < ' $end ') OR
            (   s_end     >   ' $begin '   AND   s_begin  < ' $end ') OR 
            ( ' $begin '  >=     s_begin   AND  '$begin ' <   s_end ) OR
            ( ' $end   '  >      s_begin   AND  '$begin ' <   s_end ));";
    $check_result = mysqli_query($con, $sql_crash);
    $fetch = mysqli_fetch_all($check_result);
    return $fetch;
}

?>
