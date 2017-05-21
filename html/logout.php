<!DOCTYPE html>
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
              <td class="welcome_title" style="width:172px;"> Customer Logout </td>
              <td class="welcome_title_bg">&nbsp;</td>
            </tr>
          </table>
          
          
          <div class="logout">
          <?php
						 session_start();
						 unset($_SESSION["username"]);
						 unset($_SESSION["password"]);
						 setcookie('username', 'admin', time()-60);
					?>
					<h2 style="color:#be7759">You have cleaned session.</h2>
					<?php
						 header('Refresh: 2; URL=customer-login.php');
					?>
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