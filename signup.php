<?php
require_once "lib/db.php";
require_once "lib/init_session.php";

if ($_POST['signup_sub'] &&
    $_POST['email'] &&
    $_POST['password'] &&
    $_POST['retype'] &&
    $_POST['name'] &&
    $_POST['phone'] &&
    isset($_POST['jobs']))
{
    extract($_POST, EXTR_OVERWRITE);

    if (strlen($password) < 8)
        die("Password length too short!!!");
    if (strcmp($password, $retype))
        die("Passwords don't match");
    if (strlen($name) > 80)
        die("Name too long");
    if (strlen($email) > 255)
        die("Invalid email :-(");

    $users_db = new_db_connection();

    if (!($__TMP__ = $users_db->
          query("select * from users where email='$email'"))->num_rows)
    {
        $pass = password_hash($password, PASSWORD_DEFAULT);
        $__TMP__ = $users_db->
                 query("insert into users(email,password,name,jobs,phone)" .
                       " values ('$email','$pass','$name','$jobs','$phone')");
        if ($__TMP__)
            $notif = "Success: Created an account. Now Login.";
        else
            $notif = "Error: " . $users_db->error;
    }
    else
        $notif = "Error: Email is being used";
}
else
    $notif = "Error: Unexpected values were encountered";

++$notif_no;

require "index.php";