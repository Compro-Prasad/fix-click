<?php

session_start();

if (!isset($_SESSION['notif_no']))
    $_SESSION['notif_no'] = 0;
$notif_no = &$_SESSION['notif_no'];
$notif = &$_SESSION['notif'][$notif_no];
?>