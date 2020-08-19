<?php

?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>預約系統登入頁面</title>
    <script>
        function check_data() {
            if (document.myForm.account.value.length == 0) {
                alert("帳號欄位不可以空白！");
            } else if (document.myForm.password.value.length == 0) {
                alert("密碼欄位不可以空白！");
            } else {
                myForm.submit();
            }
        }
    </script>
</head>

<body style="background: #84CFF0;">
    <div class="container-fluid">
        <br><br><br><br>
    </div>
    <div class="card shadow-lg p-1 mb-5 bg-white rounded" style="width: 25rem; margin: 0 auto; float: none;">
        <div class="container card-body">
            <p align="center"><h3>登入</h3></p>
        </div>
        
        <div class="container card-body">
            <form action="/Back End/checkpwd.php?ret=<?php $_GET['ret']?>"  method="post" name="myForm">
                <div class="form-group">
                    <font color="#000000">帳號:</font>
                    <input class="form-control" name="account" id="account" type="text" size="20" required>
                </div>
                <div class="form-group">    
                    <font color="#000000">密碼:</font>
                    <input class="form-control" type="password" id="passwd" name="password"  size="20" required>
                </div>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" id="sub" value="登入" >
                    <a href="join.html">忘記密碼</a>
                </div>
            </form>
            <?php
                if(!empty($_GET['errno'])){
                    if($_GET['errno']==1){
                        echo "<font color=\"orange\">使用者名稱或密碼錯誤</font>";
                    }
                }
            ?>
        </div>
    </div>
</body>


</html>
