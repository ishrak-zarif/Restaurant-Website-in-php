<?php require_once dirname(__FILE__) . '/header.inc.php';?>
<!-- content -->
<div id="content" class="grid_24">
  <div id="content-inner">
    <?php require_once dirname(__FILE__) . '/left-nav.inc.php';?>
    <!-- right -->
    <div id="right"  class="grid_18"> 
      <!-- content boxes -->
      <div class="title">
      <h2>Edit User</h2>
      </div>
      <?php if (!empty($this->err)) {?>
      	<p class="errMsg"><?php echo $this->err;?></p>
      <?php } else if (!empty($this->msg)) {?>
      	<p class="successMsg"><?php echo $this->msg;?></p>
      <?php } ?>
      <div id="forms">
        <form action="<?php echo $this->action;?>" method="post">
            <div class="form">
                <div class="fields">
                    <div class="field">
                        <div class="label">
                            <label><span class="star">*</span>First Name:</label>
                        </div>
                        <div class="input">
                            <input type="text" class="inputText" name="first_name" value="<?php echo (!empty($this->err) ? $this->first_name :
							(isset($this->user_info['first_name']) ? $this->user_info['first_name'] : ''));?>" />
                            <span class="star">*</span>
                        </div>
                    </div>
                    <div class="field">
                        <div class="label">
                            <label>Last Name:</label>
                        </div>
                        <div class="input">
                            <input type="text" class="inputText" name="last_name" value="<?php echo (!empty($this->err) ? $this->last_name :
							(isset($this->user_info['last_name']) ? $this->user_info['last_name'] : ''));?>" />
                        </div>
                    </div>
                    <div class="field">
                        <div class="label">
                            <label><span class="star">*</span>User Name:</label>
                        </div>
                        <div class="input">
                            <input type="text" class="inputText" name="username" value="<?php echo (!empty($this->err) ? $this->username :
							(isset($this->user_info['username']) ? $this->user_info['username'] : ''));?>" />
                            <span class="star">*</span>
                        </div>
                    </div>
                    <div class="field">
                        <div class="label">
                            <label>Old Password:</label>
                        </div>
                        <div class="input">
                            <input type="password" class="inputText" name="old_password" value="" />
                        </div>
                    </div>
                    <div class="field">
                        <div class="label">
                            <label>New Password:</label>
                        </div>
                        <div class="input">
                            <input type="password" class="inputText" name="new_password" value="" />
                        </div>
                    </div>
                    <div class="field">
                        <div class="label">
                            <label>Confirm Password:</label>
                        </div>
                        <div class="input">
                            <input type="password" class="inputText" name="confirm_password" value="" />
                        </div>
                    </div>
                    <div class="field">
                        <div class="label">
                            <label><span class="star">*</span>Email:</label>
                        </div>
                        <div class="input">
                            <input type="text" class="inputText" name="email" value="<?php echo (!empty($this->err) ? $this->email :
							(isset($this->user_info['email']) ? $this->user_info['email'] : ''));?>" />
                            <span class="star">*</span>
                        </div>
                    </div>                   
                    <div class="buttons">
                        <input type="submit" name="submit" value="Submit" />
                        <input type="reset" name="reset" value="Reset" />
                    </div>
                </div>
            </div>
        </form>
    </div>
      <!-- end content boxes --> 
    </div>
    <!-- end right --> 
  </div>
</div>
<!-- end content -->
<?php require_once dirname(__FILE__) . '/footer.inc.php';?>