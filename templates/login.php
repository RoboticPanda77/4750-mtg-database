<!DOCTYPE html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<p></p>
<p></p>
<h4 style="font-weight:bold;color:orange;margin-left:20px;"> Login if you have an account</h4>
<form name="logInForm" method="post">
    <div class="row mb-3 mx-3">
        <p class="font-weight-bold" style="font-weight:bold;color:orange;font-size:20px;margin-left:200px">Enter Username:</p>
        <input type="text" class="form-control" name="userName" required style="width:1000px;margin-left:auto;margin-right:auto"/>
        <p class="font-weight-bold" style="font-weight:bold;color:orange;font-size:20px;margin-left:200px">Enter Password:</p>
        <input type="text" class="form-control" name="password" required style="width:1000px;margin-left:auto;margin-right:auto"/>
        <input class="btn btn-primary" type="submit" name="loginAction" value="Sign in" required style="width:1000px;margin-left:auto;margin-right:auto"/>
    </div>
</form>
<?php
    if(isset($_POST["userName"]) and isset($_POST["password"]) and isset($_POST["loginAction"])){
        if($_POST["userName"] == ""){
            echo "<html>";
            echo "<p style='margin-left:660px;font-weight:bold;color:red;'>Please Enter a Valid Username </p>";
            echo "</html>";
        }
        else{
            $checkU = $this->db->query("select * from users where username='" . $_POST["userName"] . "';");
            if(count($checkU) == 1){
                echo nl2br($checkU[0]['password'] . "/n" . password_hash($_POST["password"], PASSWORD_DEFAULT));
                if (password_verify($_POST["password"], $checkU[0]['password'])){
                    session_destroy();
                    session_start();
                    $_SESSION["loggedin"] = true;
                    $_SESSION["id"] = $checkU[0]['u_id'];
                    $_SESSION["username"] = $checkU[0]['username'];
                    header("Location: http://localhost/4750-mtg-database/index.php");
                    exit();
                }
                else{
                    echo "<html>";
                    echo "<p style='margin-left:705px;font-weight:bold;color:red;'>Wrong Password </p>";
                    echo "</html>";
                }
            }
            else{
                echo "<html>";
                echo "<p style='margin-left:660px;font-weight:bold;color:red;'>Please Enter a Valid Username </p>";
                echo "</html>";
            }
        }
    }
?>
<p></p>
<p></p>
<h4 style="font-weight:bold;color:orange;margin-left:20px;"> Sign up if you don't have an account</h4>
<form name="signUpForm" method="post">
    <div class="row mb-3 mx-3">
        <p class="font-weight-bold" style="font-weight:bold;color:orange;font-size:20px;margin-left:200px">Enter Username:</p>
        <input type="text" class="form-control" name="userName2" required style="width:1000px;margin-left:auto;margin-right:auto"/>
        <p></p>
        <p class="font-weight-bold" style="font-weight:bold;color:orange;font-size:20px;margin-left:200px">Enter Password:</p>
        <input type="text" class="form-control" name="password2" required style="width:1000px;margin-left:auto;margin-right:auto"/>
        <p></p>
        <input class="btn btn-info" type="submit" name="signUpAction" value="Sign up" required style="width:1000px;margin-left:auto;margin-right:auto"/>
    </div>
</form>
<?php
    if(isset($_POST["userName2"]) and isset($_POST["password2"]) and isset($_POST["signUpAction"])){
        if($_POST["userName2"] == ""){
            echo "<html>";
            echo "<p style='margin-left:660px;font-weight:bold;color:red;'>Please Enter a Valid Username </p>";
            echo "</html>";
        }
        else{
            $checkU = $this->db->query("select * from users where username='" . $_POST["userName2"] . "';");
            if(count($checkU) == 0){
                $maxId = $this->db->query("select max(u_id) from users");
                $newId = intval($maxId[0]['max(u_id)']) + 1;
                $hashed_p = password_hash($_POST["password2"], PASSWORD_DEFAULT);
                $this->db->query("insert into users values(". $newId . ", '" . $_POST["userName2"] . "', 0, '". $hashed_p . "');");
                $_SESSION["loggedin"] = true;
                $_SESSION["id"] = $newId;
                $_SESSION["username"] = $_POST["userName2"];
                echo "<html>";
                echo "<script type='text/javascript'>";
                echo "window.location.href = 'http://localhost/4750-mtg-database/index.php'";
                echo "</script>";
                echo "</html>";

            }
            else{
                echo "<html>";
                echo "<p style='margin-left:660px;font-weight:bold;color:red;'>This username is already being used </p>";
                echo "</html>";
            }
        }
    }
?>
</html>
