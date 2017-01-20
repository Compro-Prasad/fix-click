<?php
function new_db_connection() {
    $users_db = new mysqli('localhost', 'temp', 'temporary', 'users');

    if ($users_db->connect_error) {
        die("Unable to open database [Connect Error (" .
            $users_db->connect_errno . "): '" .
            $users_db->connect_error . "']");
    }

    return $users_db;
}
?>