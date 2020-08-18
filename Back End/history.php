<?php
    session_start();
    if (empty($_SESSION["account"])){
        header("Location:login.php"); 
        exit();
    }
?>

<!doctype html>
<?php include "../conf.php"; ?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        
    </head>

    <body>
        <div class="Container-lg">
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">from</th>
                <th scope="col">to</th>
                <th scope="col">title</th>
                <th scope="col">修改</th>
            </tr>
            </thead>
            <tbody>
            <?php
                $con = mysqli_connect("localhost", $DB_ACC, $DB_PASSWD, "schedule");

                $sql_command = "SELECT * FROM `Room 1` WHERE user_id =  " . $_SESSION['user_id'] . ";";

                $result = mysqli_query($con, $sql_command);
                $data = mysqli_fetch_all($result);
                
                for($i = 0; $i < count($data); $i++){
                    echo '<tr>';
                    for($j = 0; $j < 3; $j++){
                        echo '<td>';
                        echo( $data[$i][$j] );
                        echo '</td>';
                    }
                    echo '<td>';
                    echo '<button class="btn btn-secondary">modify</button>';
                    echo '</td>';
                    echo '</tr>';
                }
                
                mysqli_close($con);
            ?>
            </tbody>
        </table>
        </div>
    </body>

</html>