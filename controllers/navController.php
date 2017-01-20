<?php

require_once "../lib/db.php";
require_once "../lib/init_session.php";

function login()
{
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
                require "../lib/end_session.php";
                require "../lib/init_session.php";
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

    require "../index.php";
}

function logout()
{
    require "../lib/end_session";
    require "../index.php";
}

function signup()
{
    if ($_POST['signup_sub'] &&
        $_POST['email'] &&
        $_POST['password'] &&
        $_POST['retype'] &&
        $_POST['name'] &&
        $_POST['mob'] &&
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
                     query("insert into users(email,password,name,jobs,mobile)" .
                           " values ('$email','$pass','$name','$jobs','$mob')");
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

    require_once "../index.php";
}