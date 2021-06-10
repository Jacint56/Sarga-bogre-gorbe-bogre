<?php
/*
    setcookie("member_login", null,time()- (86400), "/");
    //unset($_COOKIE["member_login"]);
    setcookie("member_password", null,time() - (86400), "/");
    //unset($_COOKIE["member_password"]);
    setcookie("name", null,time() - (86400), "/");
    //unset($_COOKIE["name"]);
    setcookie("lastname", null,time() - (86400), "/");
    //unset($_COOKIE["lastname"]);
    */

    session_start();
    $_SESSION = [];

    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    session_destroy();

    echo "
            <script>window.location = \"../index.php\";</script>
        ";
    exit();
?>