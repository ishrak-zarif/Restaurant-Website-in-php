<?php 
$use_richarea = true;
$width = 420;
$height = 500;
require_once dirname(__FILE__) . '/header.inc.php';?>
<!-- content -->
<div id="content" class="grid_24">
  <div id="content-inner">
    <?php require_once dirname(__FILE__) . '/left-nav.inc.php';?>
    <!-- right -->
    <div id="right"  class="grid_18"> 
      <!-- content boxes -->
      <div class="title">
      <h2>Edit Content</h2>
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
                        <div class="label label-textarea">
                            <label for="article">Page Content:</label>
                        </div>
                        <div class="textarea">
                            <textarea id="content" name="content" class="inputRichArea" cols="50" rows="15"><?php echo (!empty($this->err) ? $this->content : (isset($this->page_info['content']) ? $this->page_info['content'] : ''));?></textarea>
                        </div>
                    </div>
                    <div class="buttons">
                        <input type="hidden" name="pid" value="<?php echo $this->pid;?>" />
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