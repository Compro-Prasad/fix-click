<?php
require_once("lib/init_session.php");

$styles = [
    "node_modules/font-awesome/css/font-awesome.min.css",
    "node_modules/bootstrap/dist/css/bootstrap.min.css",
    "assets/css/fix-click-common.css",
    "assets/css/fix-click-home.css"
];

$scripts = [
    "node_modules/jquery/dist/jquery.min.js",
    "node_modules/bootstrap/dist/js/bootstrap.min.js",
    "assets/js/fix-click-common.js"
];

$title = "Home";

ob_start();

require("views/home.php");

$page = ob_get_clean();

require("views/base.php");