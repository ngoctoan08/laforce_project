<?php
session_start();
unset($_SESSION['id_account']);
setcookie("username", "", time()-3600);
setcookie("password", "", time()-3600);
header("location: ../Auth");