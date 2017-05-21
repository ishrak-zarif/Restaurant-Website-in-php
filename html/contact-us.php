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
              <td class="welcome_title" style="width:172px;"> Contact Us </td>
              <td class="welcome_title_bg">&nbsp;</td>
            </tr>
          </table>
          
          
          <div class="werlcome_text">
            <p align="center"><strong><em>WOW Burger &amp; Pizza</em></strong> is located in the center of Dhaka at Uttara, a small distance from Airport.</p>
            <p align="center">House Building Road,<br/>
              Uttara, Dhaka-1230
            <div align="left" style="width:150px; margin:auto; margin-top:-10px;"> Tel:&nbsp;+(880)18-22-994292
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+(880)19-20-213696 </div>
            <br/>
            </p>
            <p align="center"> Opening Hours:</p>
            <p align="center">7 days a week
            <div align="center">10:00 am to 8:00 pm</div>
            </p>
            <p align="center"><br/>
              For reservations please call</p>
            
            <!--Contact for reserve form-->
            <div class="right_field contact_form_div_wrap">
              <form name="contact_us_form" id="contact_us_form" method="post" action="" onsubmit="return submit_contact_form('contact_us_form')">
                <div class="contact_form">
                  <div class="contact_form_left">Name:</div>
                  <div class="contact_form_right">
                    <input name="name" id="name" type="text" class="input_box" value="" />
                  </div>
                </div>
                <div class="contact_form">
                  <div class="contact_form_left">Telephone:</div>
                  <div class="contact_form_right">
                    <input name="telephone" id="telephone" class="input_box" value="" />
                  </div>
                </div>
                <div class="contact_form">
                  <div class="contact_form_left">Email:</div>
                  <div class="contact_form_right">
                    <input name="email" id="email" type="text" class="input_box" value="" />
                  </div>
                </div>
                <div class="contact_form">
                  <div class="contact_form_left">Comments:</div>
                  <div class="contact_form_right">
                    <textarea rows="" name="comment" cols="" id="comment" class="input_box" style="width:300px; height:100px" ></textarea>
                  </div>
                </div>
                <div class="contact_form">
                  <div class="contact_form_left">&nbsp;</div>
                  <div class="contact_form_right">
                    <input type="hidden" name="page_form_mandatory" id="page_form_mandatory" value="name,telephone,email,comment" />
                    <input type="hidden" name="page_form_valid_email" id="page_form_valid_email" value="email" />
                    <input type="hidden" name="admin_email" id="admin_email" value="" />
                    <input type="hidden" name="admin_name" id="admin_name" value="" />
                    <input type="hidden" name="thankyou_message" id="thankyou_message" value="Thank you for contact us." />
                    <input type="image" src="images/gc_submit.png" border="0" />
                  </div>
                </div>
              </form>
            </div>
            <!--End Reserve form-->
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