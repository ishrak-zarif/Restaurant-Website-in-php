<?php 
//$current_page_name = 'contact-us';
$reservation_form = true;
require_once dirname(__FILE__) . '/header.inc.php';?>


<div class="main_body_content">
    <div class="welcome_text_area food-menu-wrapper">
        <table width="93%" border="0" cellpadding="0" cellspacing="0">
            <tr>
            <td class="welcome_title" style="width:192px;"><?php echo $this->current_page_body_title;?> </td>
            
            </tr>
        </table>
    
    
        	<div class="werlcome_text" id="items_3">
            <?php echo (!empty($this->reserve_info) && !empty($this->reserve_info['content']) ? html_entity_decode($this->reserve_info['content']) : '');?>
            <div id="registrationForm">
                <?php if (!empty($this->err)) {?>
                  <p class="errMsg"><?php echo $this->err;?></p>
                <?php } else if (!empty($this->msg)) {?>
                  <p class="successMsg"><?php echo $this->msg;?></p>
                <?php } ?>
                <form action="<?php echo $this->action;?>" method="post" id="custReservationForm">
                    <div class="row">
                        <p><label>Name<span class="star">*</span></label><input type="text" class="text_field" id="reservation_name" name="reservation_name" value="" /><span class="errReservationName errFieldMsg"></span></p>
                        <p><label>Date<span class="star">*</span></label><input type="text" class="text_field" id="reservation_date" name="reservation_date" value="" readonly /><span class="errReservationDate errFieldMsg"></span></p>
                        <p><label>No. Of Tables<span class="star">*</span></label>
                        <select name="no_of_tables" id="no_of_tables" class="text_field select_field">
                          <option value="">-- Select --</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                          <option value="9">9</option>
                          <option value="10">10</option>
                        </select>
                        <span class="errReservationTables errFieldMsg"></span></p>
                        <p><label>Message</label><textarea name="message" id="message" rows="10" cols="38" class="text_field textarea_field"></textarea><span class="errReservationMsg"></span></p>
                    </div>
                    <input type="submit" class="button" name="submit" value="Submit" />
                    <input type="reset" class="button" name="reset" value="Reset" />
                </form>
            </div>
        </div>
    </div>
</div>


<?php require_once dirname(__FILE__) . '/footer.inc.php';?>
		