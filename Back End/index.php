<?php
    session_start();
    if (empty($_SESSION["account"])){
        header("Location:login.php"); 
        exit();
    }
?>
<?php include "../conf.php"; ?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <style>
            table tr td {border: 1px solid black;}
            .div1{
                margin: 0px auto;
                
                padding: 3px;
                margin: 1px;
            }
            .wrap ol {
                display: inline-block;
            }
            .InputW {
                border-style: dashed; 
                border-width: 2px;
                padding: 10px;
                
            }
            .center {
                margin: 0px auto;
            }

        </style>
        <title>登記系統</title>
    </head>

    <body bgcolor="white">
        <nav class="navbar navbar-light bg-dark">
            <a class="navbar-brand text-light" href="./">會議室預約系統</a>
            <form class="form-inline" action="logout.php">
                <input type="button" class="btn btn-outline-primary" onclick="javascript:location.href='history.php'" value="預約紀錄"></input>
                &nbsp
                <input class="btn btn-outline-primary" type="submit" value="登出">
            </form>
        </nav>
        <br>
        <div>
            <h1 align="center">行程預約</h1>
        </div>

        <div align="center">
            <div class="div1">
                <?php
                if($_GET['date'] == '' || $_GET['room'] == ''){ 
                    echo '
                    <label>Choose your date and room</label>
                    <form method="get" name="datePicker">
                        <div class="col-3 InputW">
                            <input type="date" name="date">
                            <select name="room">
                                <option value="Room 1">Room 1</option>
                                <option value="Room 2">Room 2</option>
                            </select>
                        </div>
                        <br>
                        <div>
                            <button class="btn btn-primary" type="submit" align="center">submit</button>
                        </div>
                    </form>
                    ';
                }
                ?>
            </div>
        
            <div class="div1"> 
                
                <form action="booking.php" method="post" name="myForm">
                        
                    <?php 
                        if( $_GET['date'] != '' && $_GET['room'] != ''){
                            $con = mysqli_connect("localhost", $DB_ACC, $DB_PASSWD, "schedule");
                            $sql_command = "SELECT * FROM `" . $_GET['room'] . "` WHERE CAST(s_begin as date) = \"" .$_GET['date']. "\" OR CAST(s_end as date) = \"" . $_GET['date'] . "\";" ;
                            $result = mysqli_query($con, $sql_command);
                            $data = mysqli_fetch_all($result);
                            echo '  <input type="hidden" name="date" value="' .$_GET['date']. '">
                                    <input type="hidden" name="room" value="' .$_GET['room']. '">
                                    <div class="wrap">
                                    <h2> schedule </h2>
                                    <ol>';
                            
                            for($i = 0; $i < count($data); $i++){
                                echo '<li>';
                                echo strip_tags(date("H:i",strtotime(gmdate($data[$i][0])).' +8 hours')."~".date("H:i",strtotime(gmdate($data[$i][1])).' +8 hours')." ".$data[$i][2]."");
                                echo '</li>';
                            }
                            mysqli_close($con);

                            echo '
                            </ol>
                            <div>
                                From
                                <select name="from">';
                                    for($t = 8; $t <= 16; $t++){
                                        echo sprintf('<option value=%02d:00:00>%02d:00</option>', $t, $t);
                                    };
                                echo '
                                </select>

                                To
                                <select name="to">';
                                    for($t = 9; $t <= 17; $t++){
                                        echo sprintf('<option value=%02d:00:00>%02d:00</option>', $t, $t);
                                    };
                                echo '
                                </select>
                            </div>
                            <div>
                                    標題
                                    <input type="textarea" name="title">
                            </div>
                            </div><br>
                            <div align="center">
                                <button type="submit" align="center">booking</button>
                                <input type="button" onclick="history.back()" value="reset" ></input>
                            </div>';
                        }
                    ?>
                </form>
            </div>
        </div>
    </body>
</html>
