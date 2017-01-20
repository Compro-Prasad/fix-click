<?php
require_once "lib/init_session.php";
require_once "lib/db.php";

if ($_POST['login_sub'] && $_POST['email'] && $_POST['password'])
{
    extract($_POST, EXTR_OVERWRITE);
    $users_db = new_db_connection();
    $Email = $email;
    $email = $users_db->real_escape_string($email);

    if (($_TMP_ = $users_db->query("select name, password from users ".
                                   "where email='$email'"))->num_rows)
    {
        $user_details = $_TMP_->fetch_assoc();
        if (password_verify($password, $user_details['password']))
        {
            require "lib/end_session.php";
            require "lib/init_session.php";
            $_SESSION['name'] = $user_details['name'];
            $_SESSION['email'] = $Email;
            $_TMP_->free();
            $notif_no = -1;
        }
        else
            $notif = "Error: Unsuccessful login";
    }
    else
        $notif = "Error: Unsuccessful login";
}
else
    $notif = "Error: Login fields should not be empty";

++$notif_no;

require "index.php";