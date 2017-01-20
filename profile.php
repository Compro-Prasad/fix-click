<?php
require_once("lib/init_session.php");
require("views/load_html_head.php");

$user_name = "Abhishek";
$name = "Abhishek Prasad";
$phone = "9876543210";
$email = "email@host.dom";

ob_start();
?>

<div id="profile-div" class="jumbotron">
   <h1>Hello, <?php print($user_name) ?></h1>
   <div id="profile-content" class="jumbotron">
      <h3>Name:
         <font size="6em"><?php print($name) ?></font>
      </h3>
      <!-- input type="text" id="name" name="name" value="<?php print($name) ?>" class="input-lg form-control" -->
      <br>
      <h3>Phone:
         <font size="6em"><?php print($phone) ?></font>
      </h3>
      <br>
      <h3>Email:
         <font size="6em"><?php print($email) ?>
      </h3>
      <button class="btn btn-lg rightFloat orange-bg">
         <i class="fa fa-pencil-square-o btn rightFloat" aria-hidden="true"> Edit</i>
      </button>
   </div>
</div>

<?php

$page = ob_get_clean();

require("views/base.php");

?>
