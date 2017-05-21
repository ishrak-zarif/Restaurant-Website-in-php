<!-- left -->
<div id="left" class="grid_6"> 
  <!-- menu -->
  <ul id="menu">
  	<li>
      <h6><a href="#pageManage"><span>Page Management</span><span class="icon-minus"></span></a></h6>
      <ul id="menu_pageManage">
        <li class="last"><a href="<?php echo ADMIN_BASE_URL;?>page-edit.php?pid=1" class="<?php echo ($this->current_file_info['basename'] == 'page-edit.php' ? 'selected' : '');?>">Welcome Text</a></li>
        <?php /*<li class="last"><a href="<?php echo ADMIN_BASE_URL;?>page-edit.php?pid=2" class="<?php echo ($this->current_file_info['basename'] == 'page-edit.php' ? 'selected' : '');?>">Contact Information</a></li>*/?>
        <?php /*?><li class="last"><a href="<?php echo ADMIN_BASE_URL;?>page-edit.php?pid=3" class="<?php echo ($this->current_file_info['basename'] == 'page-edit.php' ? 'selected' : '');?>">Registration Content</a></li><?php */?>
      </ul>
    </li>
    <li>
      <h6><a href="#menuManage"><span>Menu Managemet</span><span class="icon-minus"></span></a></h6>
      <ul id="menu_menuManage">
        <li><a href="<?php echo ADMIN_BASE_URL;?>menu-add.php" class="<?php echo ($this->current_file_info['basename'] == 'menu-add.php' ? 'selected' : '');?>">New Menu</a></li>
        <li class="last"><a href="<?php echo ADMIN_BASE_URL;?>menu-index.php" class="<?php echo ($this->current_file_info['basename'] == 'menu-index.php' || $this->current_file_info['basename'] == 'menu-edit.php' ? 'selected' : '');?>">Browse Menus</a></li>
      </ul>
    </li>
    <li>
      <h6><a href="#foodManage"><span>Food Management</span><span class="icon-minus"></span></a></h6>
      <ul id="menu_foodManage">
        <li><a href="<?php echo ADMIN_BASE_URL;?>category-add.php" class="<?php echo ($this->current_file_info['basename'] == 'category-add.php' ? 'selected' : '');?>">New Category</a></li>
        <li><a href="<?php echo ADMIN_BASE_URL;?>category-index.php" class="<?php echo ($this->current_file_info['basename'] == 'category-index.php' || $this->current_file_info['basename'] == 'category-edit.php' ? 'selected' : '');?>">Browse Categories</a></li>
        <li><a href="<?php echo ADMIN_BASE_URL;?>food-add.php" class="<?php echo ($this->current_file_info['basename'] == 'food-add.php' ? 'selected' : '');?>">New Food</a></li>
        <li class="last"><a href="<?php echo ADMIN_BASE_URL;?>food-index.php" class="<?php echo ($this->current_file_info['basename'] == 'food-index.php' || $this->current_file_info['basename'] == 'food-edit.php' ? 'selected' : '');?>">Browse Foods</a></li>
      </ul>
    </li>
    <li>
      <h6><a href="#reservationManage"><span>Reservation Management</span><span class="icon-minus"></span></a></h6>
      <ul id="menu_reservationManage">
        <li><a href="<?php echo ADMIN_BASE_URL;?>reservation-index.php" class="<?php echo ($this->current_file_info['basename'] == 'reservation-index.php' || $this->current_file_info['basename'] == 'reservation-view.php' ? 'selected' : '');?>">Browse Reservations</a></li>        
      </ul>
    </li>
    <li>
      <h6><a href="#users"><span>Users</span><span class="icon-minus"></span></a></h6>
      <ul id="menu_users">
        <li><a href="<?php echo ADMIN_BASE_URL;?>user-add.php" class="<?php echo ($this->current_file_info['basename'] == 'user-add.php' ? 'selected' : '');?>">New User</a></li>
        <li class="last"><a href="<?php echo ADMIN_BASE_URL;?>user-index.php" class="<?php echo ($this->current_file_info['basename'] == 'user-index.php' || $this->current_file_info['basename'] == 'user-edit.php' ? 'selected' : '');?>">Browse Users</a></li>
      </ul>
    </li>
  </ul>
  <!-- end menu --> 
</div>
<!-- end left -->