<?php $t=time();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title><?php echo ADMIN_PANEL_PAGE_TITLE;?></title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		<!-- base stylesheets -->
		<link rel="stylesheet" type="text/css" href="<?php echo ADMIN_BASE_URL;?>resources/css/960/reset.css?t=<?php echo $t++;?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo ADMIN_BASE_URL;?>resources/css/960/grid.css?t=<?php echo $t++;?>" />
		<!-- theme stylesheets -->
		<link rel="stylesheet" type="text/css" href="<?php echo ADMIN_BASE_URL;?>resources/css/text.css?t=<?php echo $t++;?>" />
		<?php if (isset($login_tpl) && $login_tpl === true) {?>
        <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_BASE_URL;?>resources/css/login.css?t=<?php echo $t++;?>" media="screen, projection" />
		<?php } else {?>
        <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_BASE_URL;?>resources/css/default.css?t=<?php echo $t++;?>" media="screen, projection" />
        <?php }?>
		<!-- scripts (jquery) -->
		<script src="<?php echo ADMIN_BASE_URL;?>resources/scripts/jquery.min.js" type="text/javascript"></script>
		<script src="<?php echo ADMIN_BASE_URL;?>resources/scripts/jquery-ui-1.8.custom.min.js" type="text/javascript"></script>
		<script src="<?php echo ADMIN_BASE_URL;?>resources/scripts/jquery.ui.selectmenu.js" type="text/javascript"></script>
		<!-- scripts (custom) -->
        
        <?php if (isset($use_richarea) && $use_richarea === true) {
		?><script type="text/javascript">
		var rich_area_width = '<?php echo isset($width) ? $width : 420;?>';
        var rich_area_height = '<?php echo isset($height) ? $height : 200;?>';
        </script>
		<script src="<?php echo BASE_URL;?>include/lib/ckeditor/ckeditor.js" type="text/javascript"></script>
        <script src="<?php echo BASE_URL;?>include/lib/ckeditor/adapters/jquery.js" type="text/javascript"></script>
		<script src="<?php echo ADMIN_BASE_URL;?>resources/scripts/ckeditor.utility.js" type="text/javascript"></script><?php
		}?>
        
		<script src="<?php echo ADMIN_BASE_PATH;?>resources/scripts/restaurant.js?t=<?php echo $t++;?>" type="text/javascript"></script>
		<script type="text/javascript">
			$(document).ready(function () {
				$("#published").datepicker({
					showOn: 'button',
					buttonImage: '<?php echo ADMIN_BASE_PATH;?>resources/images/calendar.png',
					buttonImageOnly: true
				});

				$("select").selectmenu({
					style: 'dropdown',
					width: 200,
					menuWidth: 200, 
					icons: [
						{ find: '.locked', icon: 'ui-icon-locked' },
						{ find: '.unlocked', icon: 'ui-icon-unlocked' },
						{ find: '.folder-open', icon: 'ui-icon-folder-open' }
					]
				});

				$("input[type=file]").file({
					image: "<?php echo ADMIN_BASE_PATH;?>resources/images/browse.gif",
					image_height: 24,
					image_width: 71,
					width: 250,
					text: 'Browse'
				});

				$("#box_tabs_example").tabs();
				$("input:submit, input:reset").button();
			});
		</script>
	</head>
	<body>
		<!-- container -->
		<div class="container_24">
			<?php if ( !isset($login_tpl) || (isset($login_tpl) && $login_tpl === false)) {?>
            <!-- header -->
			<div id="header">
				<!-- logo -->
				<div id="logo" class="grid_12 logoText">
					<a href="<?php echo ADMIN_BASE_URL;?>index.php"><?php echo ADMIN_PANEL_NAME;?></a>
				</div>
				<!-- end logo -->
				<!-- dashboard -->
				<div id="dashboard" class="grid_12">
					<div class="menu">
						<ul>
							<li><span class="userName"><?php echo isset($_SESSION['login_name']) ? $_SESSION['login_name'] : '';?></span> |</li>
							<li><a href="<?php echo ADMIN_BASE_URL;?>user-edit.php">Edit Account</a> |</li>
							<li><a href="<?php echo ADMIN_BASE_URL;?>logout.php">Logout</a></li>
						</ul>
					</div>
				</div>
				<!-- end dashboard -->
			</div>
			<!-- end header -->
            <?php }?>