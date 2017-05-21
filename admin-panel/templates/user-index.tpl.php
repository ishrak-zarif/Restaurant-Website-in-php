<?php require_once dirname(__FILE__) . '/header.inc.php';?>
<!-- content -->
<div id="content" class="grid_24">
  <div id="content-inner">
    <?php require_once dirname(__FILE__) . '/left-nav.inc.php';?>
    <!-- right -->
    <div id="right"  class="grid_18"> 
      <!-- content boxes -->
      <div class="title">
      <h2>User List</h2>
      <div class="button">
            <a href="<?php echo ADMIN_BASE_URL;?>user-add.php">Create User</a>
        </div>
        </div>
      <div class="table">
            <table cellspacing="0">
                <thead>
                    <tr>
                    	<th>Id</th>
                        <th class="left">Name</th>
                        <th>Username</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                	<?php $user_info_list_count = count($this->user_info_list);
					if (!empty($this->user_info_list) && is_array($this->user_info_list) && $user_info_list_count) {
						for($i=0; $i<$user_info_list_count; $i++) {
							?><tr class="<?php echo ($i%2 == 0 ? '' : 'alt');?>">
                            	<td align="center"><?php echo $this->user_info_list[$i]['id'];?></td>
                            	<td><?php echo $this->user_info_list[$i]['first_name'] . (!empty($this->user_info_list[$i]['last_name']) ? ' ' . $this->user_info_list[$i]['last_name'] : '');?></td>
                                <td align="center"><?php echo $this->user_info_list[$i]['username'];?></td>
                                <td align="center"><?php echo $this->user_info_list[$i]['email'];?></td>
                               </tr><?php
						}//end for
					}//end if?>                
                </tbody>
            </table>
    </div>
      <!-- end content boxes --> 
    </div>
    <!-- end right --> 
  </div>
</div>
<!-- end content -->
<?php require_once dirname(__FILE__) . '/footer.inc.php';?>