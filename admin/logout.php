<?php

session_start();

unset($_SESSION["uid"]);

unset($_SESSION["name"]);

session_destroy();

header("location:admin_login.php");
