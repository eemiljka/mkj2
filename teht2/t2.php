<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="username">Username:</label><br>
    <input type="text" id="username" name="username" value="<?php echo isset($_COOKIE['username']) ? $_COOKIE['username'] : ''; ?>"><br>
    <input type="checkbox" id="remember" name="remember" value="isRememberMe">
    <label for="remember">Remember me</label><br>
    <input type="submit" value="Submit">
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    if (isset($_POST["remember"])) {
        setcookie("username", $username, time() + (86400 * 30), "/");
    } else {
        if (isset($_COOKIE["username"])) {
            setcookie("username", "", time() - 3600, "/");
        }
    }
}
?>