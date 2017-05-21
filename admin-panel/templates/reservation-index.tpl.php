<?php require_once dirname(__FILE__) . '/header.inc.php';?>
<!-- content -->
<div id="content" class="grid_24">
  <div id="content-inner">
    <?php require_once dirname(__FILE__) . '/left-nav.inc.php';?>
    <!-- right -->
    <div id="right"  class="grid_18"> 
      <!-- content boxes -->
      <div class="title">
      <h2>Category List</h2>
      <?php /*?><div class="button">
            <a href="<?php echo $this->add_action;?>">Create Category</a>
        </div><?php */?>
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
                        <th class="left">Reservation Name</th>
                        <th class="left">Date</th>
                        <th>No. of Tables</th>
                        <th colspan="2" align="center">Action</th>
                    </tr>
                </thead>
                <tbody>
                	<?php $reservations_list_count = count($this->reservations_list);
					if (!empty($this->reservations_list) && is_array($this->reservations_list) && $reservations_list_count) {
						for($i=0; $i<$reservations_list_count; $i++) {
							?><tr class="<?php echo ($i%2 == 0 ? '' : 'alt');?>">
                            	<td align="center"><?php echo $this->reservations_list[$i]['rid'];?></td>
                            	<td><?php echo $this->reservations_list[$i]['reservation_name'];?></td>
                            	<td><?php echo $this->reservations_list[$i]['reservation_date'];?></td>
                                <td align="center"><?php echo $this->reservations_list[$i]['no_of_tables'];?></td>
                                <td class="edit"><a href="<?php echo $this->view_action;?>?rid=<?php echo $this->reservations_list[$i]['rid'];?>">View</a></td>
                                <td class="edit"><a href="<?php echo $this->action;?>?del=y&amp;rid=<?php echo $this->reservations_list[$i]['rid'];?>" onclick="if (!confirm_delete()) return false;">Delete</a></td>
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