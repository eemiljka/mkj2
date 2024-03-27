<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    if (isset($_POST["remember"])) {
        $_SESSION["username"] = $username;
    } else {
        if (isset($_SESSION["username"])) {
            unset($_SESSION["username"]);
        }
    }
}
?>
<form action=<?php echo $_SERVER['PHP_SELF']; ?> method="post">
    <label for="username">Username:</label><br>
    <input type="text" id="username" name="username" value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>"><br>
    <input type="checkbox" id="remember" name="remember" value="isRememberMe">
    <label for="remember">Remember me</label><br>
    <input type="submit" value="Submit">
</form>