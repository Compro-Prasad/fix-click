<?php
require_once("init_session.php");

$hndl = fopen('/home/compro/test.log', 'w');
fwrite($hndl, 'hello world');
fclose($hndl);

if ($_GET['id']) {
    if ($_SESSION['notif'][$_GET['id']])
        unset($_SESSION['notif'][$_GET['id']]);
    //    echo "<html><body>hello world</body></html>";
}

//echo "<html><body>hello world</body></html>";
?>