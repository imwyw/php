<?php
session_start();

$valid_code = $_POST["ValidCode"];

if (isset($valid_code) && isset($_SESSION["validcode"])) {
    if ($valid_code == $_SESSION["validcode"]) {
        echo "验证成功";
    } else {
        echo "验证失败";
    }
}

?>