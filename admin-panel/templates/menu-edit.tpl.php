<?php require_once dirname(__FILE__) . '/header.inc.php';?>
<!-- content -->
<div id="content" class="grid_24">
  <div id="content-inner">
    <?php require_once dirname(__FILE__) . '/left-nav.inc.php';?>
    <!-- right -->
    <div id="right"  class="grid_18"> 
      <!-- content boxes -->
      <div class="title">
      <h2>Edit Menu</h2>
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
                            <label><span class="star">*</span>Title:</label>
                        </div>
                        <div class="input">
                            <input type="text" class="inputText" name="title" value="<?php echo (!empty($this->err) ? $this->title : (isset($this->menu_info['title']) ? $this->menu_info['title'] : ''));?>" />
                            <span class="star">*</span>
                        </div>
                    </div>
                    <div class="field">
                        <div class="label">
                            <label>Sequence:</label>
                        </div>
                        <div class="input">
                            <input type="text" class="inputText" name="sequence" value="<?php echo (!empty($this->err) ? $this->sequence : (isset($this->menu_info['sequence']) ? $this->menu_info['sequence'] : ''));?>" />
                        </div>
                    </div>
                    <div class="buttons">
                        <input type="hidden" name="mid" value="<?php echo $this->mid;?>" />
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