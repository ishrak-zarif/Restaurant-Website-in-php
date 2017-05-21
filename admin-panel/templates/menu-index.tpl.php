<?php require_once dirname(__FILE__) . '/header.inc.php';?>
<!-- content -->
<div id="content" class="grid_24">
  <div id="content-inner">
    <?php require_once dirname(__FILE__) . '/left-nav.inc.php';?>
    <!-- right -->
    <div id="right"  class="grid_18"> 
      <!-- content boxes -->
      <div class="title">
      <h2>Menu List</h2>
      <div class="button">
            <a href="<?php echo $this->add_action;?>">Create Menu</a>
        </div>
        </div>
      <div class="table">
      <?php if (!empty($this->err)) {?>
      	<p class="errMsg"><?php echo $this->err;?></p>
      <?php } else if (!empty($this->msg)) {?>
      	<p class="successMsg"><?php echo $this->msg;?></p>
      <?php } ?>
            <table cellspacing="0">
                <thead>
                    <tr>
                    	<th>Id</th>
                        <th class="left">Title</th>
                        <th>Sequence</th>
                        <th colspan="2" align="center">Action</th>
                    </tr>
                </thead>
                <tbody>
                	<?php $menu_list_count = count($this->menu_list);
					if (!empty($this->menu_list) && is_array($this->menu_list) && $menu_list_count) {
						for($i=0; $i<$menu_list_count; $i++) {
							?><tr class="<?php echo ($i%2 == 0 ? '' : 'alt');?>">
                            	<td align="center"><?php echo $this->menu_list[$i]['id'];?></td>
                            	<td><?php echo $this->menu_list[$i]['title'];?></td>
                                <td align="center"><?php echo $this->menu_list[$i]['sequence'];?></td>
                                <td class="edit"><a href="<?php echo $this->edit_action;?>?mid=<?php echo $this->menu_list[$i]['id'];?>">Edit</a></td>
                                <td class="edit"><a href="<?php echo $this->action;?>?del=y&amp;mid=<?php echo $this->menu_list[$i]['id'];?>" onclick="if (!confirm_delete()) return false;">Delete</a></td>
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