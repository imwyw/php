<?php
session_start();

// 注销当前会话
session_destroy();

header("location:session_login.php");

