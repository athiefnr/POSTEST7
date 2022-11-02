<?php

session_start();

session_unset();

session_destroy();

HEADER("Location:login.php");