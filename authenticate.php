<?php session_start();
require "database.php";
require "header.php";

$con = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DB);

if (isset($_POST['existing-username'], $_POST['existing-password'])) {
    $username = $_POST['existing-username'];
    $password = md5($_POST['existing-password']);

    $statement = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

    $result = mysqli_query($con, $statement);
    if (mysqli_num_rows($result) == 1) {
        $_SESSION["logged-in"] = true;
        $_SESSION['name'] = $username;
        header("Location:index.php");
    } else {
        $login_json = array("login_error" => true);
        echo json_encode($login_json);
    }
}

if (isset($_POST['new-username'], $_POST['new-password'])) {
    $username = $_POST['new-username'];
    $password = md5($_POST['new-password']);

    $statement = "SELECT * FROM users WHERE username = '$username'";

    $result = mysqli_query($con, $statement);
    if (mysqli_fetch_assoc($result) == 0) {
        $sql_new_user = "INSERT INTO users (user_id, username, password) VALUES (NULL,'$username','$password')";
        mysqli_query($con, $sql_new_user);
    } else {
        echo "User already exists";
    }
}
?>
<script src="js/script.js"></script>