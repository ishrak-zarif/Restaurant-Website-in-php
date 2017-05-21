<!DOCTYPE html>

<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title><?php echo SITE_NAME . (isset($this->current_page_name) ? ' | ' . $this->current_page_name : '');?></title>
<link rel="title icon" type="image/png" href="images/fast food icon.png"/>

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/smoothness/jquery-ui-1.8.16.custom.css" />

<link href="css/style.css" media="all" rel="stylesheet" type="text/css"/>

<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script src="js/gmaps.js"></script>
<script src="js/jquery-2.1.4.min.js" type="text/javascript"></script>
<script src="js/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="js/sub-menu-script.js"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/script.js"></script>

<?php if (isset($tooltip) && $tooltip === true) {?>
	<link rel="stylesheet" type="text/css" href="css/jquery.tooltip.css" />
	<script type="text/javascript" src="js/jquery.tooltip.min.js"></script>
	<script type="text/javascript">
    	jQuery(document).ready(function(e) {
			$('.toolTipItems').tooltip({
				delay: 0,
				showURL: false,
				bodyHandler: function() {
					$('#tooltip div.body').css({'height': '207px'});
					return this.rel != '' && this.rel != null ? $("<img/>").attr("src", this.rel) : '';
				}
			});
		});
    </script>
<?php
}?>
<?php if (isset($reservation_form) && $reservation_form === true) {
?><script type="text/javascript" src="js/reservation.js"></script><?php	
}?>
    
</head>

<body>
<div id="wrap_all">

<div id="header">
  <div class="header_link1"> <a href="<?php echo BASE_URL;?>"><span class="logo_link"></span></a> </div>  
  
  <div class="customer-login-wrap">
    <div class="heeaderRight pull-right text-right">
        <div class="loginLink"><a href="javascript:void(0);">Customer Login</a></div>
     </div>
        
    <div class="customerLoginForm">
        <p class="custLoginFormName">Customer Login</p>
        <p class="errCustomerLogin">Login Failed</p>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" id="custLoginForm">
            <p>
                <label>Username</label>
                <input type="text" name="username" id="username" value="<?php echo $this->custLoginUsername;?>" class="formField" /><span class="errUserName"></span>
            </p>
            <p>
                <label>Password</label>
                <input type="password" name="password" id="password" value="<?php echo $this->custLoginPassword;?>" class="formField" /><span class="errUserPass"></span>
            </p>
            <p class="pull-left" style="width:100%;">
              <input class="pull-left" style="margin-right: 5px;" type="checkbox" id="remember" name="remember" <?php echo (!empty($this->custLoginRemember) && $this->custLoginRemember == 'on' ? 'checked' : '');?> />
                <label class="pull-left" for="remember">Remember me</label>
            </p>
            <p>
                <a href="<?php echo BASE_URL;?>register.php" class="registerBtn">Register Now</a>
                <input type="button" name="customerCancel" value="Cancel" class="formButton" />
                <input type="submit" name="customerLogin" value="Login" class="formButton" />
            </p>
        </form>
    </div>
  </div>
            
</div> 

  <div id="top_nav_top_border"> </div>
  <div class="top_nav">
  
  <nav class="top-navbar">
    <div class="container-fluid">
      <div class="navbar-collapse collapse" id="navbar">
        <ul id="nav" class="nav navbar-nav">
          <li class="<?php echo (!isset($current_menu_id) || empty($current_menu_id)) && (!empty($this->current_file_info['basename']) && $this->current_file_info['basename'] == 'index.php') ? 'active' : '';?>"><a href="<?php echo BASE_URL;?>">Home </a></li>
          <?php if (count($this->top_menu)) {
            foreach($this->top_menu as $top_menu_item) {
				$hasSubMenu = count($top_menu_item['fcategory']);
                ?><li class="<?php echo (!empty($current_menu_id) && $current_menu_id == $top_menu_item['id'] ? 'active' : '') . ($hasSubMenu ? ' dropdown' : '');?>">
                <a href="javascript:void(0);" <?php echo ($hasSubMenu ? ' aria-expanded="false" aria-haspopup="true" role="button" data-toggle="dropdown" class="dropdown-toggle"' : '');?>>
					<?php echo $top_menu_item['title'] . ($hasSubMenu ? ' <span class="caret"></span>' : '');?>
                </a><?php 
                if ($hasSubMenu) {
                    ?><ul class="dropdown-menu"><?php
                    foreach($top_menu_item['fcategory'] as $fcat) {
                        ?><li><a href="<?php echo BASE_URL;?>food-menu.php?cid=<?php echo $fcat['id'];?>"><?php echo $fcat['title'];?></a></li><?php
                    }//end foreach
                    ?></ul><?php
                }//end if
                ?></li><?php
            }//end foreach	
        }//end if?>
        	<li class="<?php echo (!isset($current_menu_id) || empty($current_menu_id)) && (!empty($this->current_file_info['basename']) && $this->current_file_info['basename'] == 'contact-us.php') ? 'active' : '';?>"><a href="<?php echo BASE_URL;?>contact-us.php">Contact Us</a></li>				
        	
      
        </ul>
        <ul class="nav navbar-nav navbar-right hide">          
          <li>
          	<div class="heeaderRight customer-login-wrap">
          		<div class="loginLink"><a href="javascript:void(0);">Customer Login</a></div>
            </div>
  
            <div class="customerLoginForm">
                <p class="custLoginFormName">Customer Login</p>
              <p class="errCustomerLogin">Login Failed</p>
                <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" id="custLoginForm">
                    <p>
                        <label>Username</label>
                        <input type="text" name="username" id="username" value="" class="formField" /><span class="errUserName"></span>
                    </p>
                    <p>
                        <label>Password</label>
                        <input type="password" name="password" id="password" value="" class="formField" /><span class="errUserPass"></span>
                    </p>
                    <p>
                        <label for="remember-mob">
                        <input type="checkbox" id="remember-mob" name="remember" <?php echo (!empty($this->err) && !empty($remember) && $remember == 'on' ? 'checked' : (!empty($this->resLoginRemember) && $this->resLoginRemember == 'on' ? 'checked' : ''));?> />
                        Remember me</label>
                    </p>
                    <p>
                        <a href="<?php echo BASE_URL;?>register.php" class="registerBtn">Register Now</a>
                        <input type="button" name="customerCancel" value="Cancel" class="formButton" />
                        <input type="submit" name="customerLogin" value="Login" class="formButton" />
                    </p>
                </form>
            </div>
          </li>
        </ul>
      </div><!--/.nav-collapse -->
    </div><!--/.container-fluid -->
  </nav>
  
    
    
    <div id="top_nav_bottom_border"> </div>
    <div class="main_body">