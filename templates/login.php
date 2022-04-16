<!DOCTYPE html>
<body style="background-color:#4a524d;color: white;">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<p></p>
<p></p>
<div class="container">
    <h4 style="font-weight:bold;color:orange;"> Login if you have an account</h4>
</div>
<form name="logInForm" method="post">
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <p class="font-weight-bold" style="font-weight:bold;color:orange;font-size:20px">Enter Username:</p>
            </div>
            <div class="col-sm">
                <p class="font-weight-bold" style="font-weight:bold;color:orange;font-size:20px">Enter Password:</p>
            </div>
            <div class="col-sm">

            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <input type="text" class="form-control" name="userName" required style="width:160px"/>
            </div>
            <div class="col-sm">
                <input type="password" class="form-control" name="password" required style="width:150px"/>
            </div>
            <div class="col-sm">
                <input class="btn btn-primary" type="submit" name="loginAction" value="Sign in" required style="width:100px"/>
            </div>
        </div>
    </div>
</form>
<?php
    if(isset($_POST["userName"]) and isset($_POST["password"]) and isset($_POST["loginAction"])){
        if($_POST["userName"] == ""){
            echo "<html>";
            echo "<div class='row'><p></p></div>";
            echo "<div class='row'><p></p></div>";
            echo "<center><p style='font-weight:bold;color:red;'>Please Enter a Valid Username</p><center>";
            echo "</html>";
        }
        else{
            $checkU = $this->db->query("select * from users where username= ?;", "s", $_POST["userName"]);
            if(count($checkU) == 1){
                if (password_verify($_POST["password"], $checkU[0]['password'])){
                    $_SESSION["loggedin"] = true;
                    $_SESSION["id"] = $checkU[0]['u_id'];
                    $_SESSION["username"] = $checkU[0]['username'];
                    echo "<html>";
                    echo "<script type='text/javascript'>";
                    echo "window.location.href = 'index.php'";
                    echo "</script>";
                    echo "</html>";
                }
                else{
                    echo "<html>";
                    echo "<div class='row'><p></p></div>";
                    echo "<div class='row'><p></p></div>";
                    echo "<center><p style='font-weight:bold;color:red;'>Wrong Password</p></center>";
                    echo "</html>";
                }
            }
            else{
                echo "<html>";
                echo "<div class='row'><p></p></div>";
                echo "<div class='row'><p></p></div>";
                echo "<center><p style='font-weight:bold;color:red;'>Please Enter a Valid Username</p></center>";
                echo "</html>";
            }
        }
    }
?>
<div class="row">
    <p></p>
</div>
<div class="row">
    <p></p>
</div>
<div class="row">
    <p></p>
</div>
<div class="row">
    <p></p>
</div>
<div class="container">
    <h4 style="font-weight:bold;color:orange;"> Sign up if you don't have an account</h4>
</div>
<form name="signUpForm" method="post">
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <p class="font-weight-bold" style="font-weight:bold;color:orange;font-size:20px">Enter Username:</p>
            </div>
            <div class="col-sm">
                <p class="font-weight-bold" style="font-weight:bold;color:orange;font-size:20px">Enter Password:</p>
            </div>
            <div class="col-sm">
                
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <input type="text" class="form-control" name="userName2" required style="width:160px;"/>
            </div>
            <div class="col-sm">
                <input type="password" class="form-control" name="password2" required style="width:150px"/>
            </div>
            <div class="col-sm">
                <input class="btn btn-info" type="submit" name="signUpAction" value="Sign up" required style="width:100px"/>
            </div>
        </div>
    </div>
</form>
<?php
    if(isset($_POST["userName2"]) and isset($_POST["password2"]) and isset($_POST["signUpAction"])){
        if($_POST["userName2"] == ""){
            echo "<html>";
            echo "<p style='font-weight:bold;color:red;'>Please Enter a Valid Username </p>";
            echo "</html>";
        }
        else{
            $checkU = $this->db->query("select * from users where username= ?;", "s", $_POST["userName2"]);
            if(count($checkU) == 0){
                $maxId = $this->db->query("select max(u_id) from users");
                $newId = intval($maxId[0]['max(u_id)']) + 1;
                $hashed_p = password_hash($_POST["password2"], PASSWORD_DEFAULT);
                $this->db->query("insert into users values(". $newId . ", '" . $_POST["userName2"] . "', 0, '". $hashed_p . "');");
                $this->db->query("insert into wishlist values(". $newId . ", 0);");
                $_SESSION["loggedin"] = true;
                $_SESSION["id"] = $newId;
                $_SESSION["username"] = $_POST["userName2"];
                echo "<html>";
                echo "<script type='text/javascript'>";
                echo "window.location.href = 'index.php'";
                echo "</script>";
                echo "</html>";

            }
            else{
                echo "<html>";
                echo "<div class='row'><p></p></div>";
                echo "<div class='row'><p></p></div>";
                echo "<center><p style='font-weight:bold;color:red;'>This username is already being used </p></center>";
                echo "</html>";
            }
        }
    }
?>
</body>
</html>
