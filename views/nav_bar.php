<nav role="navigation" class="navbar navbar-default navbar-inverse navbar-fixed-top">
   <div class="container nav-container">
      <div class="navbar-header">
         <button type="button" data-target="#navbarCollapse"
                 data-toggle="collapse" class="navbar-toggle">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
         </button>
      </div>

      <div id="navbarCollapse" class="collapse navbar-collapse">
         <ul class="nav nav-pills">

            <li class="active"><a href="#">Home</a></li>

            <li><a href="#">About Us</a></li>

            <?php if ($_SESSION['notif_no']): ?>
               <li class="navbar-right dropdown to-be-hovered">
                  <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                     Notifications<b class="caret"></b>
                  </a>
                  <ul class="dropdown-menu to-be-shown notif">
                     <?php foreach ($_SESSION['notif'] as $key => $notif): ?>
                        <div class="notif-list error">
                           <?php print($notif); ?>
                           <button id="<?php print($key); ?>" class="close">&times;</button>
                        </div>
                     <?php endforeach; ?>
                  </ul>
               </li>
	       <script type="text/javascript" src="assets/js/notification.js"></script>
            <?php endif; ?>
            <?php if (isset($_SESSION['name'])): ?>
               <li class="navbar-right dropdown to-be-hovered">
                  <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                     <?php echo $_SESSION['name']; ?><b class="caret"></b>
                  </a>
                  <ul class="dropdown-menu to-be-shown">
                     <li><a href="profile.php">Profile</a></li>
                     <li><a href="logout.php">Logout</a></li>
                  </ul>
               </li>
            <?php else: ?>
               <li class="navbar-right dropdown to-be-hovered">
                  <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                     Sign Up<b class="caret"></b>
                  </a>
                  <div role="menu"
                       class="dropdown-menu signup-dropdown to-be-shown">
                     <form method="POST" action="signup.php">
                        <div class="row nomargin">
                           <div class="col-sm-12 full-input-div">
                              <input class="form-control orange-border"
                                     type="text" name="name"
                                     pattern="^[A-Za-z]{1,75}( [A-Za-z]{1,75})* [A-Za-z]{1,80}$"
                                     placeholder="Name" required="required"
                                     minlength="3" maxlength="80" />
                           </div>
                        </div>
                        <div class="row nomargin">
                           <div class="col-sm-12 full-input-div">
                              <input class="form-control orange-border"
                                     name="email" type="email"
                                     pattern="^[a-zA-Z0-9!#$%&\'*+\\/=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&\'*+\\/=?^_`{|}~-]+)*@(?:[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?\.)+\.[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?$"
                                     placeholder="Email" required="required"
                                     minlength="6" maxlength="255" />
                           </div>
                        </div>
                        <div class="row nomargin">
                           <div class="col-sm-6 left-input-div">
                              <input class="form-control orange-border"
                                     type="text" name="phone"
                                     placeholder="Phone" required="required"
                                     minlength="10" maxlength="11" />
                           </div>
                           <div class="col-sm-6 right-input-div">
                              <input class="form-control orange-border"
                                     pattern="^[01]?[0-9]{1}$"
                                     type="text" name="jobs" autocomplete="off"
                                     placeholder="Jobs" required="required" />
                           </div>
                        </div>
                        <div class="row nomargin">
                           <div class="col-sm-6 left-input-div">
                              <input class="form-control orange-border"
                                     type="password" name="password"
                                     placeholder="Password" />
                           </div>
                           <div class="col-sm-6 right-input-div">
                              <input class="form-control orange-border"
                                     type="password" name="retype"
                                     placeholder="Retype Password"
                                     minlength="8" />
                           </div>
                        </div>
                        <div class="row nomargin full-input-div" style="padding-top: 1%; float:right">
                           <input type="submit" name="signup_sub" value="Signup"
                                  class="form-control orange-bg orange-border black-txt" />
                        </div>
                     </form>
                  </div>
               </li>
               <li class="navbar-right dropdown to-be-hovered">
                  <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                     Login<b class="caret"></b>
                  </a>
                  <div role="menu"
                       class="dropdown-menu login-dropdown to-be-shown">
                     <form method="POST" action="login.php">
                        <div class="row nomargin">
                           <div class="col-sm-6 left-input-div">
                              <input class="form-control orange-border"
                                     name="email" type="email"
                                     autocomplete="off"
                                     pattern="^[a-zA-Z0-9!#$%&\'*+\\/=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&\'*+\\/=?^_`{|}~-]+)*@(?:[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?\.)+\.[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?$"
                                     placeholder="Email" required="required"
                                     minlength="6" maxlength="255" />
                           </div>
                           <div class="col-sm-6 right-input-div">
                              <input class="form-control orange-border"
                                     autocomplete="off"
                                     type="password" name="password"
                                     required="required" minlength="8"
                                     placeholder="password" />
                           </div>
                        </div>
                        <div class="row nomargin full-input-div" style="padding-top: 1%; float:right">
                           <input type="submit" name="login_sub" value="Login"
                                  class="form-control orange-bg orange-border black-txt" />
                        </div>
                     </form>
                  </div>
               </li>
            <?php endif; ?>
         </ul>
      </div>
   </div>
</nav>
