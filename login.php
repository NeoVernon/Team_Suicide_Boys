<?php
session_start();
?>
<?php
require_once("includes/connection.php");
?>
<?php
include("includes/header.php");
?>

<?php
if(isset($_POST["login"])){
if(!empty($_POST['username']) && !empty($_POST['password'])) {
    $username=$_POST['username'];
    $password=$_POST['password'];
    $query =mysql_query("SELECT * FROM usertbl WHERE username='".$username."' AND password='".$password."'");
    $numrows=mysql_num_rows($query);
    if($numrows!=0)
    {
    while($row=mysql_fetch_assoc($query))
    {
     $dbusername=$row['username'];
     $dbpassword=$row['password'];
    }
    if($username == $dbusername && $password == $dbpassword)
    {
     $_SESSION['session_username']=$username;
     echo "<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=intropage.php'>";
    }
    } else {
     $message =  "Invalid username or password!";
    }
    } else {
     $message = "All fields are required!";
}
}
?>
    <div class="container mlogin">
            <div id="login">
    <h1>Вхід</h1>
<form name="loginform" id="loginform" action="" method="POST">
    <p>
        <label for="user_login">Логін<br />
        <input type="text" name="username" id="username" class="input" value="" size="20" /></label>
    </p>
    <p>
        <label for="user_pass">Пароль<br />
        <input type="password" name="password" id="password" class="input" value="" size="20" /></label>
    </p>
        <p class="submit">
        <input type="submit" name="login" class="button" value="Вхід" />
    </p>
        <p class="regtext"> Не зареєстрований? <a href="register.php" >Реєстрація</a>!</p>
</form>

    </div>

    </div>
<?php include("includes/footer.php");
?>

<?php if (!empty($message)) {echo "<p class=\"error\">" . "MESSAGE: ". $message . "</p>";}
?>
