<!DOCTYPE html>
<?php
   ob_start();
   session_start();
?>

<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>WOW</title>
<link rel="title icon" type="image/png" href="images/fast food icon.png"/>

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link href="css/style.css" media="all" rel="stylesheet" type="text/css"/>

<script src="js/jquery-2.1.4.min.js" type="text/javascript"></script>
<script src="js/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<!--<script type="text/javascript" src="js/jquery.min.js"></script>-->
<script type="text/javascript" src="js/sub-menu-script.js"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
</head>

<body>
<div id="wrap_all">
  <div id="header">
  <div class="header_link1"> <a href="index.php"><span class="logo_link"></span></a> </div>
  <div class="header_link2"> <a href="customer-login.php"><span class="customer_login"></span></a> </div>
	</div>
  
  <div id="top_nav_top_border"> </div>
  <div class="top_nav">
    <div class="all_nav_div vertMenu">
      <div class="main_dish_link"></div>
      <div class="food_menu_link"></div>
      <div class="dessert_link"><a href=""><span class="desert_menu_class"></span></a></div>
      <div class="about_us_link"><a href=""><span class="about_us_menu_class"></span></a></div>
      <div class="contact_us_link"><a href="contact-us.php"><span class="contact_us_menu_class"></span></a></div>
    </div>
    <div class="main_dish_submenu">
      <div class="submenu_top_left">
        <div class="submenu_top_right">
          <div class="submenu_top"> </div>
        </div>
      </div>
      <div class="submenu_content">
        <div class="submenu_item_first"><a href="">Grilled Steak Items</a></div>
        <div class="submenu_item"><a href="">Seafood Items</a></div>
        <div class="submenu_item"><a href="">Italian Items</a></div>
      </div>
      <div class="submenu_bottom_left">
        <div class="submenu_bottom_right">
          <div class="submenu_bottom"></div>
        </div>
      </div>
    </div>
    <div class="food_menu_submenu">
      <div class="submenu_top_left">
        <div class="submenu_top_right">
          <div class="submenu_top"> </div>
        </div>
      </div>
      <div class="submenu_content">
        <!--<div class="submenu_item_first"><a href="soups.html">Soups</a></div>-->
        <div class="submenu_item_first"><a href="">Appetiser</a></div>
        <div class="submenu_item"><a href="">Starters</a></div>
        <div class="submenu_item"><a href="">Salads</a></div>
        <div class="submenu_item"><a href="">Pizza</a></div>
        <div class="submenu_item"><a href="">Sides</a></div>
        <div class="submenu_item"><a href="">Sauces</a></div>
        <div class="submenu_item"><a href="">Tacos</a></div>
        <div class="submenu_item"><a href="">Fajitas</a></div>
      </div>
      <div class="submenu_bottom_left">
        <div class="submenu_bottom_right">
          <div class="submenu_bottom"> </div>
        </div>
      </div>
    </div>
    <div id="top_nav_bottom_border"> </div>
    <div class="main_body">    	
      <div class="main_body_content">
        <div class="welcome_text_area">
          <table width="93%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td class="welcome_title" style="width:172px;"> Customer Login </td>
              <td class="welcome_title_bg">&nbsp;</td>
            </tr>
          </table>
          
          
          <div class="werlcome_text">
            <h2>Enter Username and Password</h2> 
            <div class="container form-signin">
           
             <?php
                $msg = '';
                
                if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password'])) {
                   if ($_POST['username'] == 'admin' && $_POST['password'] == '123') {
                      $_SESSION['username'] = 'admin';
											if(isset($_POST['remember']))
			  								setcookie('username', 'admin', time()+20);
												
                      echo 'You have entered valid use name and password';
                   }
                   else {
                      $msg = 'Wrong username or password';
                   }
                }
             ?>
             
             
            <?php
						if(isset($_SESSION['username'])){
							$name=$_SESSION['username'];
							/*echo '<span style="color:#be7759">Welcome, </span>'.$_SESSION['username'].'<span style="color:#be7759"> You are logged in.</span><br>';*/
							echo "<span style='color:#be7759'>Welcome, $name, You are logged in.<span><br>";
							echo '<p style="color:#be7759">Click here to <a href="logout.php" title="Logout">Logout.</a></p>';
							die();
						}
						
						else if(isset($_COOKIE['username'])){
							$name=$_COOKIE['username'];
							/*echo '<span style="color:#be7759">Welcome, </span>'.$_SESSION['username'].'<span style="color:#be7759"> You are logged in.</span><br>';*/
							echo "<span style='color:#be7759'>Welcome, $name, You are logged in.<span><br>";
							echo '<p style="color:#be7759">Click here to <a href="logout.php" title="Logout">Logout.</a></p>';
							die();
						}
						
					
						?>
             
            </div> <!-- /container -->
         
            <div class="container">
               <form class="form-signin" role="form" action="customer-login.php" method="post">
                  <h5 class="form-signin-heading"><?php echo $msg; ?></h5>
                  <input type="text" class="form-control" name="username" placeholder="username = admin" required autofocus></br>
                  <input type="password" class="form-control" name="password" placeholder="password = 123" required>
                  <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Login</button>
                  <div class="remember_div">
                  	<input type="checkbox" class="remember" name="remember" value="on">Remember Me
                  </div>
               </form>
            		
               Click here to clean <a href="logout.php" title="Logout">Session.</a>
            </div>
      
          </div>
          
          
        </div>
      </div>
      <div class="footer">
        <div class="footer_text">Copyright &copy; wow.com.bd, 2015. All rights reserved.</div>
      </div>
    </div>
  </div>
</div>

<div class="scale">
  <div class="social-icons">
    <a href="https://www.facebook.com/"><i class="fa fa-facebook" style="color:#731603"></i></a>
    <a href="https://plus.google.com/"><i class="fa fa-google-plus" style="color:#731603"></i></a>
    <a href="http://www.skype.com/en/"><i class="fa fa-twitter" style="color:#731603"></i></a>
    <a href="https://twitter.com/"><i class="fa fa-skype" style="color:#731603"></i></a>
  </div>
</div>
</body>


</html>