<?php 
//$current_page_name = 'contact-us';
require_once dirname(__FILE__) . '/header.inc.php';?>

<div class="main_body_content">
    <div class="welcome_text_area food-menu-wrapper">
        <table width="93%" border="0" cellpadding="0" cellspacing="0">
            <tr>
            <td class="welcome_title" style="width:192px;"><?php echo $this->current_page_body_title;?> </td>
            
            </tr>
        </table>
    
    
        <div class="werlcome_text" id="items_3">
			<div id="registrationForm">
                <div class="custregFormMsg"></div>
                <form action="" method="post" id="custRegistrationForm">
                    <div class="row">
                        <p><label>Name<span class="star">*</span></label><input type="text" class="text_field" id="customer_name" name="customer_name" value="" /><span class="errCustomerName"></span></p>
                        <p><label>Phone<span class="star">*</span></label><input type="text" class="text_field" id="customer_phone" name="customer_phone" value="" /><span class="errCustomerPhone"></span></p>
                        <p><label>Email<span class="star">*</span></label><input type="text" class="text_field customerEmailField" name="customer_eamil" id="customer_eamil" value="" /><span class="errCustomerEmail"></span></p>
                        <p><label>Username<span class="star">*</span></label><input type="text" class="text_field customerUsernameField" name="customer_username" id="customer_username" value="" /><input type="button" class="checkUsername" value="Check" /><span class="errCustomerUsername"></span><span class="possibleUsernames"></span></p>
                        <p><label>Password<span class="star">*</span></label><input type="password" class="text_field" name="customer_password" id="customer_password" value="" /><span class="errCustomerPass"></span></p>
                    </div>
                    <input type="submit" class="button" value="Submit" />
                    <input type="reset" class="button" value="Reset" />
                </form>
            </div>
        </div>
    </div>
</div>


<?php require_once dirname(__FILE__) . '/footer.inc.php';?>
		