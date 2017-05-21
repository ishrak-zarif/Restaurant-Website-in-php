<?php 
$login_tpl = true;
require_once dirname(__FILE__) . '/header.inc.php';?>
<!-- content -->
  <form action="<?php echo $this->action;?>" method="post">
    <h4>Sign in to <?php echo ADMIN_PANEL_NAME . ' Admin Panel';?></h4>
    <!-- login -->
    <div id="login">
    	<?php if (!empty($this->err)) {?>
        <p class="errMsg loginMsg"><?php echo $this->err;?></p>
        <?php } else if (!empty($this->msg)) {?>
        <p class="successMsg  loginMsg"><?php echo $this->msg;?></p>
        <?php } ?>
      
        <div class="form">
            <!-- fields -->
            <div class="fields">
                <div class="field">
                    <div class="label">
                        <label for="username">Username:</label>
                    </div>
                    <div class="input">
                        <input type="text" id="username" name="username" size="40" value="<?php echo (!empty($this->err) ? $this->username : $this->resLoginUsername);?>" />
                    </div>
                </div>
                <div class="field">
                    <div class="label">
                        <label for="password">Password:</label>
                    </div>
                    <div class="input">
                        <input type="password" id="password" name="password" size="40" value="<?php echo (!empty($this->err) ? $this->password : $this->resLoginPassword);?>" />
                    </div>
                </div>
                <div class="field">
                    <!-- <div class="checkbox">
                        <input type="checkbox" id="remember" name="remember" <?php echo (!empty($this->err) && !empty($remember) && $remember == 'on' ? 'checked' : (!empty($this->resLoginRemember) && $this->resLoginRemember == 'on' ? 'checked' : ''));?> />
                        <label for="remember">Remember me</label>
                    </div> -->
                </div>
                <div class="buttons">
                    <input type="submit" name="submit" value="Sign In" />
                </div>
            </div>
            <!-- end fields -->
        </div>
    </div>
    <!-- end login -->
</form>
<!-- end content -->
<?php require_once dirname(__FILE__) . '/footer.inc.php';?>
