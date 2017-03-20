<?php
require ("database_class.php");
require_once ("users_class.php");

if (session_status() == PHP_SESSION_NONE) { //start session only if it's not already started
    session_start();
}

$db = new Database();
$db->ConnectDB();

if ($db->ErrorDB()) {
    $msg .= "Connecting to database failed!";
    $failed = true;
}

if (isset($_GET["username"])) { //check if username exists
    $username = $_GET["username"];

    $checkUsernameQuery = $db->selectDB("SELECT username FROM users WHERE username = '$username';");
    if ($checkUsernameQuery->num_rows < 1) { //in this case username doesn't exist
        header('Content-Type: application/json');
        print json_encode ("loginFailed");
    }
    else {  //otherwise check if password is good
        if (isset($_GET["password"])) {
            $password = $_GET["password"];

            $checkPasswordQuery = $db->selectDB("SELECT password FROM users WHERE username = '$username' AND password = '$password';");

            if ($checkPasswordQuery->num_rows < 1) {
                header('Content-Type: application/json');
                print json_encode ("loginFailed");
            }
            else { //user successfully logged in
                $userInfoQuery = $db -> selectDB("SELECT userID, username, usertypes.name, email FROM users, usertypes WHERE username = '$username' AND usertypes.typeID=users.userType;");
                $userInfo = $userInfoQuery -> fetch_array();
                $currentTime = time();
                $userObject = new User();
                $userObject->SetData($userInfo[0], $userInfo[1], $userInfo[2], $userInfo[3], $currentTime);
                $_SESSION['session'] = $userObject;


                //set cookie if "Remember me" is checked

                $rememberMe = $_GET["rememberMe"];

                if ($rememberMe == 'true') {
                    $duration = time() + (60 * 60 * 24 * 7);
                    setcookie("loggedInUser", $username, $duration);
                }
                else { //delete cookie if "Remember me" is unchecked
                    setcookie("loggedInUser","", 0);
                    unset($_COOKIE["loggedInUser"]);
                }

                //header("Location: index.php");
                //exit;
                header('Content-Type: application/json');
                print json_encode ("loginOK");
            }
        }
    }
}
else {
    header('Content-Type: application/json');
    print json_encode ("loginFailed");
}
$db->DisconnectDB();
?>