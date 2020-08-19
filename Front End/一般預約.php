<?php
    session_start();
    if (empty($_SESSION["account"])){
        header("Location:login.php?ret=ㄧ般預約.php"); 
        exit();
    }
?>
<!DOCTYPE html>
<?php include "conf.php"; ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>一般預約</title>
        <meta name="viewpoint", content="width=device-width, initial-scale=1.0">

        <!--Bootstrap css-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

        <!--jQuery ui-->
        <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>

        <link rel="stylesheet" href="css/css.css">
        <script src="js/function.js"></script>

        <style>
            #header{
                height: 70px;
                color: white;
                background: #46A3FF;
                padding: 10px;
                text-align: center;
            }
        </style>
    </head>

    <body>
        <nav class="navbar nav-dark bg-primary" style="border: solid 1px black">
            <div class="navbar-band" style="position: absolute; left: calc(50% - 90px); width: 180px; padding: 10px; color: white;"><h1>一般預約</h1></div>

            &nbsp;
            <div>
                <label style=""><font color="#FFFFFF"><?php echo $_SESSION['account']?>   </font></label>
                
                <button type="button" class="btn btn-outline-info" style="color: white;" onclick="location.href='logout.php'">登出</button>
                <button type="button" class="btn btn-outline-info" style="color: white;" onclick="location.href='Back End/history.php'">預約紀錄</button>
            </div>

            <!--<div>
                <button type="button" class="btn btn-outline-dark" style="color: white;">登入</button>
            </div>-->
        </nav>

        <div class="container">
            <div class="row">
                <div class="col Space"></div>
            </div>
        </div>

        <form action="一般預約.php" method="POST">
            <div class="container" style="border: solid 1px gray; text-align: center;">
                <div class="row">
                    <div class="col-3 form-group">
                        <div style="text-align: left;">
                            <label for="Location" type="text" name="Location" title="地點" class="Label_text">地點</label>
                        </div>

                        <div class="Input_wrapper">
                            <input id="Location" type="text" name="Location" placeholder="地點" style="margin: 5px;">
                            <div class="dropdown show">
                                <a style="display: flex; align-items: center;" class="btn btn-default" id="Location" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-list-ul" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                                      </svg>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="Location">
                                    <a class="dropdown-item" href="#" onclick="add_location('TATOOINE')">TATOOINE</a>
                                    <a class="dropdown-item" href="#" onclick="add_location('NABOO')">NABOO</a>
                                    <a class="dropdown-item" href="#" onclick="add_location('CORUSCANT')">CORUSCANT</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-3 form-group">
                        <div style="text-align: left;">
                            <label for="Number" type="text" name="Number" title="人數" class="Label_text">人數</label>
                        </div>

                        <div class="Input_wrapper">
                            <input id="Number" type="text" name="Number" placeholder="人數" style="margin: 5px;">
                            <div class="dropdown show">
                                <a style="display: flex; align-items: center;" class="btn btn-default" id="Number" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-list-ul" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                                      </svg>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="Number">
                                    <a class="dropdown-item" href="#" onclick="add_number('1')">1</a>
                                    <a class="dropdown-item" href="#" onclick="add_number('2')">2</a>
                                    <a class="dropdown-item" href="#" onclick="add_number('3')">3</a>
                                    <a class="dropdown-item" href="#" onclick="add_number('4')">4</a>
                                    <a class="dropdown-item" href="#" onclick="add_number('5')">5</a>
                                    <a class="dropdown-item" href="#" onclick="add_number('6')">6</a>
                                    <a class="dropdown-item" href="#" onclick="add_number('7')">7</a>
                                    <a class="dropdown-item" href="#" onclick="add_number('8')">8</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-3 form-group">
                        <div style="text-align: left;">
                            <label for="Date" type="text" name="Date" title="日期" class="Label_text">日期</label>
                        </div>

                        <div class="Input_wrapper" id="datepicker">
                            <input id="Date" type="text" name="Date" placeholder="YYYY/MM/DD" style="margin: 5px;">
                            <button type="button" class="btn btn-default" style="display: flex; align-items: center;">
                                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-calendar-date" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6.445 11.688V6.354h-.633A12.6 12.6 0 0 0 4.5 7.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61h.675zm1.188-1.305c.047.64.594 1.406 1.703 1.406 1.258 0 2-1.066 2-2.871 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82h-.684zm2.953-2.317c0 .696-.559 1.18-1.184 1.18-.601 0-1.144-.383-1.144-1.2 0-.823.582-1.21 1.168-1.21.633 0 1.16.398 1.16 1.23z"/>
                                    <path fill-rule="evenodd" d="M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1zm1-3a2 2 0 0 0-2 2v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H2z"/>
                                    <path fill-rule="evenodd" d="M3.5 0a.5.5 0 0 1 .5.5V1a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 .5-.5zm9 0a.5.5 0 0 1 .5.5V1a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 .5-.5z"/>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="col-3 form-group">
                        <div style="text-align: left;">
                            <label for="Time" type="text" name="Time" title="時間" class="Label_text">時間</label>
                        </div>

                        <div class="Input_wrapper">
                            <select id="Time_from" name="Time_from" class="Select_time">
                                <option value="08:00">08:00</option>
                                <option value="09:00">09:00</option>
                                <option value="10:00">10:00</option>
                                <option value="11:00">11:00</option>
                                <option value="12:00">12:00</option>
                                <option value="13:00">13:00</option>
                                <option value="14:00">14:00</option>
                                <option value="15:00">15:00</option>
                                <option value="16:00">16:00</option>
                            </select>

                            <span style="font-size: 18px;">到</span>

                            <select id="Time_to" name="Time_to" class="Select_time">
                                <option value="09:00">09:00</option>
                                <option value="10:00">10:00</option>
                                <option value="11:00">11:00</option>
                                <option value="12:00">12:00</option>
                                <option value="13:00">13:00</option>
                                <option value="14:00">14:00</option>
                                <option value="15:00">15:00</option>
                                <option value="16:00">16:00</option>
                                <option value="16:00" selected="selected">17:00</option>
                            </select>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn-lg btn-outline-secondary" style="margin: 10px;">查詢</button>
            </div>
        </form>
        <?php

            if( $_POST['Location'] != '' && $_POST['Date'] != ''){
                $Location = $_POST['Location'];
                $Date = date("Y-m-d",strtotime($_POST['Date']));
                $Number = $_POST['Number'];
                $Time_from = date("H:i:s",strtotime($_POST['Time_from']));
                $Time_to = date("H:i:s", strtotime($_POST['Time_to']));

                
                $con = mysqli_connect($DB_NAME, $DB_ACC , $DB_PASSWD , "schedule");

                $sql_command = "SELECT * FROM `$Location` WHERE 
                (CAST(s_begin as date) = ' $Date ' OR 
                 CAST(s_end   as date) = ' $Date '   ) AND
                ((s_begin <= ' $Date $Time_to   ' AND s_begin >= ' $Date $Time_from ') OR
                 (s_end   >= ' $Date $Time_from ' AND s_end <= ' $Date $Time_to '))" ;
                
                $result = mysqli_query($con, $sql_command);
                $data = mysqli_fetch_all($result);
                #print_r($data);

                for($i = 0; $i < count($data); $i++){
                    echo $data[$i][0];
                    echo '<br>';
                }

            }
        ?>
    </body>
</html>