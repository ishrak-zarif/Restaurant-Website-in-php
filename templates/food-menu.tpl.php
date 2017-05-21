<?php 
$tooltip = true;
$current_menu_id = !empty($this->category_info) && !empty($this->category_info['mid']) ? $this->category_info['mid'] : 0;
require_once dirname(__FILE__) . '/header.inc.php';?>

<div class="main_body_content">
    <div class="welcome_text_area food-menu-wrapper">
        <table width="93%" border="0" cellpadding="0" cellspacing="0">
            <tr>
            <td class="welcome_title" style="width:192px;"><?php echo $this->category_info['ctitle'];?> </td>
            
            </tr>
        </table>
    
    
        <div class="werlcome_text" id="items_3">
        	<div class="menus">
				<?php if (!empty($this->foods_info) && is_array($this->foods_info) && count($this->foods_info)) {?>
                <ul>
                    <?php 
                    $food_info_count = count($this->foods_info);
                    $i=0;
                    foreach($this->foods_info as $finfo) { ?>
                    <li class="<?php echo ++$i == $food_info_count ? 'last' : '';?>">
                        <a href="javascript:void(0);" rel="<?php echo $this->food_hover_img_dir . $finfo['image_file'];?>" class="toolTipItems"><img src="<?php echo $this->food_img_dir . $finfo['image_file'];?>" alt="" /></a>
                        <div class="description">
                            <b><?php echo $finfo['title'];?></b>	
                            <?php echo html_entity_decode($finfo['short_description']);?>
                        </div>
                        <span class="cost"><?php echo 'Tk. ' . $finfo['price'];?></span>
                    </li>
                    <?php }//end foreach?>			
                </ul>
                <?php }//end if?>
            </div>
        </div>
    </div>
</div>


<?php require_once dirname(__FILE__) . '/footer.inc.php';?>
		